<?php
session_start();
require_once '../../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}

if (isset($_GET['order_id'])) {
    $kode_deposit = $_GET['order_id'];
    
    $query_pesanan = mysqli_query($db, "SELECT * FROM pembelian_guest WHERE order_id = '$kode_deposit' AND status = 'Pending'");
                
    if (mysqli_num_rows($query_pesanan) === 1) {
        
        $fetch_pesanan = mysqli_fetch_assoc($query_pesanan);
        
        $query_layanan = mysqli_query($db, "SELECT * FROM layanan_pulsa WHERE id = '".$fetch_pesanan['layanan_id']."'");
        
        if (mysqli_num_rows($query_layanan) === 1) {
            
            $fetch_layanan = mysqli_fetch_assoc($query_layanan);
            
            if ($fetch_layanan['provider'] == 'DF') {
                
                $reff = $fetch_pesanan['order_id'];
                $y = $db->query("SELECT * FROM provider WHERE code='DF'");
                $DF = $y->fetch_assoc();
                $df_user = $DF['api_id'];
                $df_key = $DF['api_key'];
                
                $data = [
                    'username' => $df_user,
                    'buyer_sku_code' => $fetch_pesanan['sku'],
                    'customer_no' => $fetch_pesanan['target'],
                    'ref_id' => $reff,
                    'sign' => md5($df_user.$df_key.$reff),
                ];
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                	'Content-Type: application/json'
                ]);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                $result = curl_exec($ch);
                $result = json_decode($result, true);
                
                if (isset($result['data'])) {
                    
                    if ($result['data']['status'] == 'Gagal') {
                        $_SESSION['alert'] = ['danger', 'Terjadi kesalahan!', 'Pesanan gagal direorder. Result Digiflazz : ' . $result['data']['message']];
                        exit(header("Location: ".base_url('/admin/guest/transaksi/detail.php?id=' . $fetch_pesanan['id'])));
                    } else {
                        
                        $sn = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
                        
                        mysqli_query($db, "UPDATE pembelian_guest SET status = 'Success', sn = '$sn' WHERE id = '".$fetch_pesanan['id']."'");
                        
                        $_SESSION['alert'] = ['success', 'Berhasil!', 'Pesanan berhasil di reorder.'];
                        exit(header("Location: ".base_url('/admin/guest/transaksi/detail.php?id=' . $fetch_pesanan['id'])));
                    }
                } else {
                    $_SESSION['alert'] = ['danger', 'Terjadi kesalahan!', 'Digiflazz tidak merespon.'];
                    exit(header("Location: ".base_url('/admin/guest/transaksi/detail.php?id=' . $fetch_pesanan['id'])));
                }
            }else if($fetch_layanan['provider'] == 'AG'){
                $C = $db->query("SELECT * FROM provider WHERE code='AG'");
                $AG = $C->fetch_assoc();
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://v1.apigames.id/transaksi/http-get-v1?merchant='.$AG['merchant_id'].'&secret='.$AG['api_key'].'&produk='.$fetch_pesanan['sku'].'&tujuan='.$fetch_pesanan['target'].'&ref=' .$reff,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_POSTFIELDS => '',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded'),
                ));
                $result = curl_exec($curl);
                $result = json_decode($result, true);
                if (isset($result['data'])) {
                    if ($result['data']['status'] == 'Gagal') {
                        $_SESSION['alert'] = ['danger', 'Terjadi kesalahan!', 'Pesanan gagal direorder. Result ApiGames : ' . $result['data']['message']];
                        exit(header("Location: ".base_url('/admin/guest/transaksi/detail.php?id=' . $fetch_pesanan['id'])));
                    } else {
                        $sn = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
                        mysqli_query($db, "UPDATE pembelian_guest SET status = 'Success', sn = '$sn' WHERE id = '".$fetch_pesanan['id']."'");
                        $_SESSION['alert'] = ['success', 'Berhasil!', 'Pesanan berhasil di reorder.'];
                        exit(header("Location: ".base_url('/admin/guest/transaksi/detail.php?id=' . $fetch_pesanan['id'])));
                    }
                } else {
                    $_SESSION['alert'] = ['danger', 'Terjadi kesalahan!', 'ApiGames tidak merespon.'];
                    exit(header("Location: ".base_url('/admin/guest/transaksi/detail.php?id=' . $fetch_pesanan['id'])));
                }
            }
        }else {
                $_SESSION['alert'] = ['danger', 'Terjadi kesalahan!', 'Sistem provider tidak terkonfigurasi.'];
                exit(header("Location: ".base_url('/admin/guest/transaksi/detail.php?id=' . $fetch_pesanan['id'])));
        } 
        } else {
            $_SESSION['alert'] = ['danger', 'Terjadi kesalahan!', 'Layanan tidak ditemukan.'];
            exit(header("Location: ".base_url('/admin/guest/transaksi/detail.php?id=' . $fetch_pesanan['id'])));
        }
} else {
    header('location:' . base_url());
}