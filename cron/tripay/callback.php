<?php
require_once '../../mainconfig.php';

$data = json_decode(file_get_contents('php://input'), true);
if ($data) {
    if ($data['status'] == 'PAID') {
        
        $kode_deposit = $data['merchant_ref'];
        
        $query_deposit = mysqli_query($db, "SELECT * FROM deposit WHERE kode_deposit = '$kode_deposit' AND status = 'Pending'");
        if (mysqli_num_rows($query_deposit) === 1) {
            $fetch_deposit = mysqli_fetch_assoc($query_deposit);
            
            $query_user = mysqli_query($db, "SELECT * FROM users WHERE username = '".$fetch_deposit['username']."'");
            
            if (mysqli_num_rows($query_user) === 1) {
                $fetch_user = mysqli_fetch_assoc($query_user);
                
                $get_saldo = $fetch_deposit['get_saldo'];
                $k_id = $fetch_deposit['kode_deposit'];
                $tanggal = date('Y-m-d G:i:s');
                
                mysqli_query($db, "UPDATE deposit SET status = 'Success' WHERE id = '".$fetch_deposit['id']."'");
                mysqli_query($db, "UPDATE users SET saldo = saldo+$get_saldo WHERE username = '".$fetch_deposit['username']."'");
                mysqli_query($db, "INSERT INTO history_saldo VALUES('', '".$fetch_deposit['username']."', '+', '{$get_saldo}', 'Deposit Saldo :: ({$k_id})', '{$tanggal}')");
                
            }
        } else {
            
            $query_pesanan = mysqli_query($db, "SELECT * FROM pembelian_guest WHERE order_id = '$kode_deposit' AND status = 'Pending'");
            
            if (mysqli_num_rows($query_pesanan) === 1) {
                
                $fetch_pesanan = mysqli_fetch_assoc($query_pesanan);
                
                $query_layanan = mysqli_query($db, "SELECT * FROM layanan_pulsa WHERE id = '".$fetch_pesanan['layanan_id']."'");
                
                if (mysqli_num_rows($query_layanan) === 1) {
                    
                    $fetch_layanan = mysqli_fetch_assoc($query_layanan);
                    
                    if ($fetch_layanan['provider'] == 'DF') {
                        $DFS = mysqli_query($db, "SELECT * FROM provider WHERE code = 'DF'");
                        $DF = mysqli_fetch_assoc($DFS);
                        $reff = $fetch_pesanan['order_id'];
                        
                        $df_user = $DF['api_id'];
                        $df_key = $DF['api_key'];
                        
                        $post_data = json_encode([
                            'username' => $df_user,
                            'buyer_sku_code' => $fetch_pesanan['sku'],
                            'customer_no' => $fetch_pesanan['target'],
                            'ref_id' => $reff,
                            'sign' => md5($df_user.$df_key.$reff),
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
                            
                            if ($result['data']['status'] == 'Gagal') {
                                mysqli_query($db, "UPDATE pembelian_guest SET error_msg = '".$result['data']['message']."', status = 'Canceled' WHERE id = '".$fetch_pesanan['id']."'");
                            } else {
                                
                                $sn = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
                                
                                mysqli_query($db, "UPDATE pembelian_guest SET status = 'Processing', sn = '$sn' WHERE id = '".$fetch_pesanan['id']."'");
                                
                                echo json_encode(['success' => true]);
                            }
                        } else {
                            mysqli_query($db, "UPDATE pembelian_guest SET error_msg = 'DigiFlazz tidak mereponse' WHERE id = '".$fetch_pesanan['id']."'");
                        }
                    } else if($fetch_layanan['provider'] == 'AG'){
                            $check_data = $db->query("SELECT * FROM provider WHERE code = 'AG'");
                            $AG = $check_data->fetch_assoc();
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
                            $resultS = curl_exec($ch);
                            $resultS = json_decode($resultS, true);
    
                            if (isset($resultS['data'])) {
                                
                                if ($status === 'Gagal') {
                                    mysqli_query($db, "UPDATE pembelian_guest SET error_msg = '".$resultS['data']['message']."', status = 'Canceled' WHERE id = '".$fetch_pesanan['id']."'");
                                } else if ($status === 'Sukses') {
                                    $sn = $resultS['data']['sn'] !== '' ? $resultS['data']['sn'] : $resultS['data']['message'];
                                
                                    mysqli_query($db, "UPDATE pembelian_guest SET status = 'Processing', sn = '$sn' WHERE id = '".$fetch_pesanan['id']."'");
                                
                                    echo json_encode(['success' => true]);
                                }
                            }else{
                                mysqli_query($db, "UPDATE pembelian_guest SET error_msg = 'ApiGames tidak mereponse' WHERE id = '".$fetch_pesanan['id']."'");
                            }
                    }else{
                        mysqli_query($db, "UPDATE pembelian_guest SET status = 'Processing', sn = 'Provider layanan : ".$fetch_layanan['provider']."' WHERE id = '".$fetch_pesanan['id']."'");
                    }
                } else {
                    mysqli_query($db, "UPDATE pembelian_guest SET error_msg = 'Layanan tidak ditemukan' WHERE id = '".$fetch_pesanan['id']."'");
                }
            } else {
                $query_pesanan = mysqli_query($db, "SELECT * FROM pembelian_guest WHERE order_id = '$merchantOrderId' AND status = 'Pending'");
            }
        }
    }
}