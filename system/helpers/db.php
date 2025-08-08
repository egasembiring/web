<?php
// Initialize default values for demo mode
$session = '';
$data_user = [
    'username' => 'demo_user',
    'name' => 'Demo User',
    'level' => 'Member',
    'saldo' => 0
];

$data_reCapcha = [
    'keyworld' => 'topup, game, pulsa, diamond',
    'maintenance' => 'false',
    'reason_mt' => '',
    'secret' => '',
    'site' => ''
];

// Only run database queries if we have a real database connection
if (has_database()) {
    $check_user = $db->query("SELECT * FROM users WHERE username = '{$session}'");
    $data_user = $check_user->fetch_assoc();

    $check_reCapcha = $db->query("SELECT * FROM reCapcha WHERE id = '1'");
    $data_reCapcha = $check_reCapcha->fetch_assoc();

    // Count Pesanan
    $count_pesanan_pulsa = mysqli_num_rows($db->query("SELECT * FROM pembelian_pulsa"));

    // Penghasilan sebulan Pulsa PPOB
    $ThisProfitPulsa = $db->query("SELECT SUM(profit) AS total FROM pembelian_pulsa WHERE MONTH(pembelian_pulsa.tanggal) = '".date('m')."' AND YEAR(pembelian_pulsa.tanggal) = '".date('Y')."'");
    $ProfitPulsa = $ThisProfitPulsa->fetch_assoc();
    $ThisTotalPulsa = $db->query("SELECT SUM(harga) AS total FROM pembelian_pulsa WHERE MONTH(pembelian_pulsa.tanggal) = '".date('m')."' AND YEAR(pembelian_pulsa.tanggal) = '".date('Y')."'");
    $AllPulsa = $ThisTotalPulsa->fetch_assoc();
    $CountProfitPulsa = mysqli_num_rows($db->query("SELECT * FROM pembelian_pulsa WHERE MONTH(pembelian_pulsa.tanggal) = '".date('m')."' AND YEAR(pembelian_pulsa.tanggal) = '".date('Y')."'"));
} else {
    // Demo mode default values
    $count_pesanan_pulsa = 0;
    $ProfitPulsa = ['total' => 0];
    $AllPulsa = ['total' => 0];
    $CountProfitPulsa = 0;
}

// Device AGENT
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'unknown';
$device = isset($_SERVER['HTTP_USER_AGENT']) ? devices() : 'unknown';

?>