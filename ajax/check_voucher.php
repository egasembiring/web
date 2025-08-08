<?php
session_start();
require_once '../../mainconfig.php';

if (!isset($_SESSION['user'])) {
    echo json_encode(['valid' => false, 'message' => 'Unauthorized']);
    exit;
}

require_once '../../system/helpers/voucher_helper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = isset($_POST['code']) ? trim($_POST['code']) : '';
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    
    if (empty($code)) {
        echo json_encode(['valid' => false, 'message' => 'Kode voucher tidak boleh kosong']);
        exit;
    }
    
    if ($amount <= 0) {
        echo json_encode(['valid' => false, 'message' => 'Jumlah transaksi tidak valid']);
        exit;
    }
    
    $result = validateVoucher($code, $_SESSION['user']['username'], $amount);
    
    if ($result['valid']) {
        echo json_encode([
            'valid' => true,
            'discount' => $result['discount'],
            'voucher_id' => $result['voucher']['id'],
            'voucher_name' => $result['voucher']['name'],
            'voucher_type' => $result['voucher']['type'],
            'message' => $result['message']
        ]);
    } else {
        echo json_encode(['valid' => false, 'message' => $result['message']]);
    }
} else {
    echo json_encode(['valid' => false, 'message' => 'Invalid request method']);
}