<?php
$check_user = $db->query("SELECT * FROM users WHERE username = '{$session}'");
$data_user = $check_user->fetch_assoc();

$check_reCapcha = $db->query("SELECT * FROM reCapcha WHERE id = '1'");
$data_reCapcha = $check_reCapcha->fetch_assoc();

// Count Pesanan
$count_pesanan_pulsa = mysqli_num_rows($db->query("SELECT * FROM pembelian_pulsa"));

// Device AGENT
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'unknown';
$device = isset($_SERVER['HTTP_USER_AGENT']) ? devices() : 'unknown';

// Penghasilan sebulan Pulsa PPOB
$ThisProfitPulsa = $db->query("SELECT SUM(profit) AS total FROM pembelian_pulsa WHERE MONTH(pembelian_pulsa.tanggal) = '".date('m')."' AND YEAR(pembelian_pulsa.tanggal) = '".date('Y')."'");
$ProfitPulsa = $ThisProfitPulsa->fetch_assoc();
$ThisTotalPulsa = $db->query("SELECT SUM(harga) AS total FROM pembelian_pulsa WHERE MONTH(pembelian_pulsa.tanggal) = '".date('m')."' AND YEAR(pembelian_pulsa.tanggal) = '".date('Y')."'");
$AllPulsa = $ThisTotalPulsa->fetch_assoc();
$CountProfitPulsa = mysqli_num_rows($db->query("SELECT * FROM pembelian_pulsa WHERE MONTH(pembelian_pulsa.tanggal) = '".date('m')."' AND YEAR(pembelian_pulsa.tanggal) = '".date('Y')."'"));

?>