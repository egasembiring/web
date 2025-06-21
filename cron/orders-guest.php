<?php
require '../mainconfig.php';

$query = mysqli_query($db, "SELECT * FROM pembelian_guest WHERE provider = 'DF' AND status IN ('Processing', 'Proses', 'Process', ' ', '') ORDER BY id DESC");

$g = date('Y-m-d H:i:s');

while($fetch = mysqli_fetch_assoc($query)) {
    $harga = $fetch['harga'];
    $DFs = $db->query("select * from provider where code='DF'");
    $DF = $DFs->fetch_assoc();
    $df_user = $DF['api_id'];
    $df_key = $DF['api_key'];
    
    $post_data = json_encode([
        'username' => $df_user,
        'buyer_sku_code' => $fetch['sku'],
        'customer_no' => $fetch['target'],
        'ref_id' => $fetch['order_id'],
        'sign' => md5($df_user.$df_key.$fetch['order_id']),
    ]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $result = curl_exec($ch);
    $result = json_decode($result, true);
    
    if (isset($result['data'])) {
        
        $status = $result['data']['status'];
        $note = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
        
        if ($status === 'Gagal') {
            $status = 'Canceled';
        } else if ($status === 'Sukses') {
            $status = 'Success';
        } else {
            $status = 'Pending';
        }
        
        if (in_array($status, ['Canceled', 'Success'])) {
            mysqli_query($db, "UPDATE pembelian_guest SET status = '$status', sn = '$note' WHERE id = '".$fetch['id']."'");
        }
    } else {
        $req_message = 'Gagal melakukan koneksi server.';
    }
}
$queryy = mysqli_query($db, "SELECT * FROM pembelian_guest WHERE provider = 'AG' AND status IN ('Processing', 'Proses', 'Process', ' ', '') ORDER BY id DESC");
$check_data = $db->query("SELECT * FROM provider WHERE code = 'AG'");
$AG = $check_data->fetch_assoc();
while($fetchh = mysqli_fetch_assoc($queryy)) {
    $harga = $fetch['harga'];
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://v1.apigames.id/transaksi/http-get-v1?merchant='.$AG['merchant_id'].'&secret='.$AG['api_key'].'&produk='.$fetchh['sku'].'&tujuan='.$fetchh['target'].'&ref=' .$fetchh['order_id'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => '',
        CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'),));
    $result = curl_exec($ch);
    $result = json_decode($result, true);
    
    if (isset($result['data'])) {
        
        $status = $result['data']['status'];
        $note = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
        
        if ($status === 'Gagal') {
            $status = 'Canceled';
        } else if ($status === 'Sukses') {
            $status = 'Success';
        } else {
            $status = 'Pending';
        }
        
        if (in_array($status, ['Canceled', 'Success'])) {
            mysqli_query($db, "UPDATE pembelian_guest SET status = '$status', sn = '$note' WHERE id = '".$fetchh['id']."'");
        }
    } else {
        $req_message = 'Gagal melakukan koneksi server.';
    }
}