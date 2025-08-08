<?php
// Enhanced transaction processing with loyalty points and voucher support

require_once 'voucher_helper.php';

function processEnhancedTransaction($order_data) {
    global $db;
    
    $user = $order_data['user'] ?? 'guest';
    $product_type = $order_data['product_type']; // 'games', 'pulsa', 'sosmed'
    $product_id = $order_data['product_id'];
    $amount = $order_data['amount'];
    $voucher_code = $order_data['voucher_code'] ?? null;
    $order_id = $order_data['order_id'];
    
    $original_amount = $amount;
    $discount_amount = 0;
    $voucher_id = null;
    
    // Apply voucher if provided
    if ($voucher_code && $user !== 'guest') {
        $voucher_result = validateVoucher($voucher_code, $user, $amount);
        
        if ($voucher_result['valid']) {
            $discount_amount = $voucher_result['discount'];
            $voucher_id = $voucher_result['voucher']['id'];
            $amount = $original_amount - $discount_amount;
            
            // Apply voucher
            applyVoucher($voucher_id, $user, $order_id, $discount_amount);
        }
    }
    
    // Apply flash sale if active
    $flash_sales = getFlashSales();
    $flash_discount = 0;
    
    if (!empty($flash_sales)) {
        // Apply best flash sale discount
        $best_discount = 0;
        foreach ($flash_sales as $sale) {
            if ($sale['discount_percentage'] > $best_discount) {
                $best_discount = $sale['discount_percentage'];
            }
        }
        
        if ($best_discount > 0) {
            $flash_discount = ($amount * $best_discount) / 100;
            $amount = $amount - $flash_discount;
        }
    }
    
    // Calculate loyalty points for this transaction
    $points_earned = 0;
    if ($user !== 'guest') {
        switch ($product_type) {
            case 'games':
                $points_earned = floor($original_amount / 1000); // 1 point per 1000 Rupiah
                break;
            case 'pulsa':
                $points_earned = floor($original_amount / 2000); // 1 point per 2000 Rupiah
                break;
            case 'sosmed':
                $points_earned = floor($original_amount / 1500); // 1 point per 1500 Rupiah
                break;
        }
        
        // Minimum 1 point for any transaction
        if ($points_earned < 1 && $original_amount >= 500) {
            $points_earned = 1;
        }
    }
    
    // Return transaction summary
    return [
        'original_amount' => $original_amount,
        'discount_amount' => $discount_amount,
        'flash_discount' => $flash_discount,
        'final_amount' => $amount,
        'points_earned' => $points_earned,
        'voucher_applied' => $voucher_code ? true : false,
        'flash_sale_applied' => $flash_discount > 0,
        'total_savings' => $discount_amount + $flash_discount
    ];
}

function completeTransaction($order_id, $transaction_summary, $user = 'guest') {
    global $db;
    
    if ($user === 'guest') {
        return true;
    }
    
    // Add loyalty points
    if ($transaction_summary['points_earned'] > 0) {
        addLoyaltyPoints(
            $user, 
            $transaction_summary['points_earned'], 
            "Transaksi {$order_id}", 
            $order_id
        );
    }
    
    // Record transaction benefits
    $benefits_log = [
        'order_id' => $order_id,
        'user' => $user,
        'original_amount' => $transaction_summary['original_amount'],
        'final_amount' => $transaction_summary['final_amount'],
        'voucher_discount' => $transaction_summary['discount_amount'],
        'flash_discount' => $transaction_summary['flash_discount'],
        'points_earned' => $transaction_summary['points_earned'],
        'created_at' => date('Y-m-d H:i:s')
    ];
    
    // Insert transaction benefits log
    $query = "INSERT INTO transaction_benefits 
              (order_id, username, original_amount, final_amount, voucher_discount, flash_discount, points_earned, created_at) 
              VALUES 
              ('{$benefits_log['order_id']}', '{$benefits_log['user']}', {$benefits_log['original_amount']}, 
               {$benefits_log['final_amount']}, {$benefits_log['voucher_discount']}, {$benefits_log['flash_discount']}, 
               {$benefits_log['points_earned']}, '{$benefits_log['created_at']}')";
    
    $db->query($query);
    
    return true;
}

function getTransactionSummaryHTML($transaction_summary) {
    $html = '<div class="transaction-summary card">';
    $html .= '<div class="card-header"><h5><i class="fas fa-receipt"></i> Ringkasan Transaksi</h5></div>';
    $html .= '<div class="card-body">';
    
    $html .= '<div class="row">';
    $html .= '<div class="col-6 text-left">Subtotal:</div>';
    $html .= '<div class="col-6 text-right">Rp ' . number_format($transaction_summary['original_amount'], 0, ',', '.') . '</div>';
    $html .= '</div>';
    
    if ($transaction_summary['discount_amount'] > 0) {
        $html .= '<div class="row text-success">';
        $html .= '<div class="col-6 text-left">Diskon Voucher:</div>';
        $html .= '<div class="col-6 text-right">-Rp ' . number_format($transaction_summary['discount_amount'], 0, ',', '.') . '</div>';
        $html .= '</div>';
    }
    
    if ($transaction_summary['flash_discount'] > 0) {
        $html .= '<div class="row text-danger">';
        $html .= '<div class="col-6 text-left">Flash Sale:</div>';
        $html .= '<div class="col-6 text-right">-Rp ' . number_format($transaction_summary['flash_discount'], 0, ',', '.') . '</div>';
        $html .= '</div>';
    }
    
    $html .= '<hr>';
    $html .= '<div class="row font-weight-bold">';
    $html .= '<div class="col-6 text-left">Total Bayar:</div>';
    $html .= '<div class="col-6 text-right text-primary">Rp ' . number_format($transaction_summary['final_amount'], 0, ',', '.') . '</div>';
    $html .= '</div>';
    
    if ($transaction_summary['points_earned'] > 0) {
        $html .= '<div class="row mt-2">';
        $html .= '<div class="col-12 text-center">';
        $html .= '<span class="badge badge-success"><i class="fas fa-star"></i> +' . $transaction_summary['points_earned'] . ' Poin Loyalty</span>';
        $html .= '</div>';
        $html .= '</div>';
    }
    
    if ($transaction_summary['total_savings'] > 0) {
        $html .= '<div class="row mt-2">';
        $html .= '<div class="col-12 text-center">';
        $html .= '<span class="badge badge-info"><i class="fas fa-piggy-bank"></i> Hemat Rp ' . number_format($transaction_summary['total_savings'], 0, ',', '.') . '</span>';
        $html .= '</div>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    $html .= '</div>';
    
    return $html;
}

// Add voucher input form component
function getVoucherInputHTML() {
    return '<div class="voucher-section mb-3">
        <div class="form-group">
            <label for="voucher_code">
                <i class="fas fa-ticket-alt"></i> Kode Voucher (Opsional)
            </label>
            <div class="input-group">
                <input type="text" class="form-control" id="voucher_code" name="voucher_code" placeholder="Masukkan kode voucher">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" id="check_voucher">
                        <i class="fas fa-check"></i> Cek
                    </button>
                </div>
            </div>
            <div id="voucher_result" class="mt-2"></div>
        </div>
    </div>
    
    <script>
    $(document).ready(function() {
        $("#check_voucher").click(function() {
            var code = $("#voucher_code").val();
            var amount = calculateTransactionAmount(); // This should be defined in the page
            
            if (!code) {
                $("#voucher_result").html("");
                return;
            }
            
            $.post("' . base_url('/ajax/check_voucher.php') . '", {
                code: code,
                amount: amount
            }, function(data) {
                if (data.valid) {
                    var discount_text = "";
                    if (data.voucher_type === "percentage") {
                        discount_text = "Diskon: Rp " + new Intl.NumberFormat("id-ID").format(data.discount);
                    } else if (data.voucher_type === "fixed") {
                        discount_text = "Diskon: Rp " + new Intl.NumberFormat("id-ID").format(data.discount);
                    } else {
                        discount_text = "Bonus Saldo: Rp " + new Intl.NumberFormat("id-ID").format(data.discount);
                    }
                    
                    $("#voucher_result").html(
                        "<div class=\"alert alert-success\"><i class=\"fas fa-check-circle\"></i> " + 
                        data.voucher_name + " - " + discount_text + "</div>"
                    );
                    
                    updateTransactionAmount(data.discount);
                } else {
                    $("#voucher_result").html(
                        "<div class=\"alert alert-danger\"><i class=\"fas fa-times-circle\"></i> " + 
                        data.message + "</div>"
                    );
                }
            }, "json");
        });
    });
    </script>';
}
?>