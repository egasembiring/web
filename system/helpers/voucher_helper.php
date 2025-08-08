<?php
// Voucher management functions

function validateVoucher($code, $username, $transaction_amount) {
    global $db;
    
    $code = $db->real_escape_string($code);
    $username = $db->real_escape_string($username);
    
    // Get voucher details
    $query = $db->query("SELECT * FROM vouchers WHERE code = '{$code}' AND status = 'active'");
    
    if (mysqli_num_rows($query) == 0) {
        return ['valid' => false, 'message' => 'Kode voucher tidak valid atau tidak aktif'];
    }
    
    $voucher = mysqli_fetch_assoc($query);
    
    // Check validity period
    $now = date('Y-m-d H:i:s');
    if ($now < $voucher['valid_from'] || $now > $voucher['valid_until']) {
        return ['valid' => false, 'message' => 'Voucher sudah expired atau belum aktif'];
    }
    
    // Check minimum transaction
    if ($transaction_amount < $voucher['min_transaction']) {
        return ['valid' => false, 'message' => 'Minimum transaksi Rp ' . number_format($voucher['min_transaction'], 0, ',', '.')];
    }
    
    // Check usage limit
    if ($voucher['usage_limit'] && $voucher['used_count'] >= $voucher['usage_limit']) {
        return ['valid' => false, 'message' => 'Voucher sudah mencapai batas penggunaan'];
    }
    
    // Check if user already used this voucher (for single-use vouchers)
    $usage_check = $db->query("SELECT * FROM voucher_usage WHERE voucher_id = '{$voucher['id']}' AND username = '{$username}'");
    if (mysqli_num_rows($usage_check) > 0 && $voucher['usage_limit'] == 1) {
        return ['valid' => false, 'message' => 'Anda sudah menggunakan voucher ini'];
    }
    
    // Calculate discount
    $discount = 0;
    if ($voucher['type'] == 'percentage') {
        $discount = ($transaction_amount * $voucher['value']) / 100;
        if ($voucher['max_discount'] && $discount > $voucher['max_discount']) {
            $discount = $voucher['max_discount'];
        }
    } else if ($voucher['type'] == 'fixed') {
        $discount = $voucher['value'];
    } else if ($voucher['type'] == 'bonus_saldo') {
        $discount = 0; // Bonus saldo doesn't reduce transaction amount
    }
    
    return [
        'valid' => true,
        'voucher' => $voucher,
        'discount' => $discount,
        'message' => 'Voucher valid'
    ];
}

function applyVoucher($voucher_id, $username, $order_id, $discount_amount) {
    global $db;
    
    // Record voucher usage
    $used_at = date('Y-m-d H:i:s');
    $db->query("INSERT INTO voucher_usage (voucher_id, username, order_id, discount_amount, used_at) VALUES ('{$voucher_id}', '{$username}', '{$order_id}', '{$discount_amount}', '{$used_at}')");
    
    // Update usage count
    $db->query("UPDATE vouchers SET used_count = used_count + 1 WHERE id = '{$voucher_id}'");
    
    // If it's a bonus saldo voucher, add bonus to user account
    $voucher_query = $db->query("SELECT * FROM vouchers WHERE id = '{$voucher_id}'");
    $voucher = mysqli_fetch_assoc($voucher_query);
    
    if ($voucher['type'] == 'bonus_saldo') {
        $db->query("UPDATE users SET saldo = saldo + {$voucher['value']} WHERE username = '{$username}'");
        $db->query("INSERT INTO history_saldo VALUES('', '{$username}', '+', '{$voucher['value']}', 'Bonus Voucher {$voucher['code']}', '{$used_at}')");
    }
    
    return true;
}

function getActiveVouchers($limit = 10) {
    global $db;
    
    $now = date('Y-m-d H:i:s');
    $query = $db->query("SELECT * FROM vouchers WHERE status = 'active' AND valid_from <= '{$now}' AND valid_until >= '{$now}' ORDER BY created_at DESC LIMIT {$limit}");
    
    $vouchers = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $vouchers[] = $row;
    }
    
    return $vouchers;
}

function getFlashSales() {
    global $db;
    
    $now = date('Y-m-d H:i:s');
    
    // Update flash sale status
    $db->query("UPDATE flash_sales SET status = 'active' WHERE start_time <= '{$now}' AND end_time >= '{$now}' AND status = 'upcoming'");
    $db->query("UPDATE flash_sales SET status = 'ended' WHERE end_time < '{$now}' AND status = 'active'");
    
    $query = $db->query("SELECT * FROM flash_sales WHERE status = 'active' ORDER BY end_time ASC");
    
    $flash_sales = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $flash_sales[] = $row;
    }
    
    return $flash_sales;
}

function getLoyaltyPoints($username) {
    global $db;
    
    $username = $db->real_escape_string($username);
    $query = $db->query("SELECT * FROM loyalty_points WHERE username = '{$username}'");
    
    if (mysqli_num_rows($query) == 0) {
        // Create loyalty account if doesn't exist
        $db->query("INSERT INTO loyalty_points (username, points, tier) VALUES ('{$username}', 0, 'bronze')");
        return ['points' => 0, 'tier' => 'bronze'];
    }
    
    return mysqli_fetch_assoc($query);
}

function addLoyaltyPoints($username, $points, $description, $order_id = null) {
    global $db;
    
    $username = $db->real_escape_string($username);
    $points = intval($points);
    $description = $db->real_escape_string($description);
    $order_id = $order_id ? $db->real_escape_string($order_id) : null;
    
    // Add points to user account
    $db->query("INSERT INTO loyalty_points (username, points) VALUES ('{$username}', {$points}) ON DUPLICATE KEY UPDATE points = points + {$points}");
    
    // Record points history
    $created_at = date('Y-m-d H:i:s');
    $db->query("INSERT INTO points_history (username, action, points, description, order_id, created_at) VALUES ('{$username}', 'earned', {$points}, '{$description}', " . ($order_id ? "'{$order_id}'" : 'NULL') . ", '{$created_at}')");
    
    // Update tier based on total points
    updateLoyaltyTier($username);
    
    return true;
}

function updateLoyaltyTier($username) {
    global $db;
    
    $loyalty = getLoyaltyPoints($username);
    $current_tier = $loyalty['tier'];
    $total_points = $loyalty['points'];
    
    // Tier requirements
    $new_tier = 'bronze';
    if ($total_points >= 10000) {
        $new_tier = 'platinum';
    } else if ($total_points >= 5000) {
        $new_tier = 'gold';
    } else if ($total_points >= 1000) {
        $new_tier = 'silver';
    }
    
    if ($new_tier != $current_tier) {
        $now = date('Y-m-d H:i:s');
        $db->query("UPDATE loyalty_points SET tier = '{$new_tier}', tier_updated_at = '{$now}' WHERE username = '{$username}'");
        
        // Give tier bonus
        $tier_bonus = 0;
        switch ($new_tier) {
            case 'silver': $tier_bonus = 2000; break;
            case 'gold': $tier_bonus = 5000; break;
            case 'platinum': $tier_bonus = 10000; break;
        }
        
        if ($tier_bonus > 0) {
            $db->query("UPDATE users SET saldo = saldo + {$tier_bonus} WHERE username = '{$username}'");
            $db->query("INSERT INTO history_saldo VALUES('', '{$username}', '+', '{$tier_bonus}', 'Bonus Tier {$new_tier}', '{$now}')");
        }
    }
    
    return $new_tier;
}

function getPromotionalBanners($position = 'home_top') {
    global $db;
    
    $position = $db->real_escape_string($position);
    $now = date('Y-m-d H:i:s');
    
    $query = $db->query("SELECT * FROM promotional_banners WHERE position = '{$position}' AND status = 'active' AND start_date <= '{$now}' AND end_date >= '{$now}' ORDER BY priority ASC");
    
    $banners = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $banners[] = $row;
    }
    
    return $banners;
}