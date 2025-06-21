<?php
// RGSann.
set_time_limit(240);
header('Content-Type: application/json');
require '../../mainconfig.php';

function connect($end_point,$post_data) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $end_point);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $chresult = curl_exec($ch);
    return json_decode($chresult, true);
}

$tanggal = date('Y-m-d H:i:s');
$stdate = date('Y-m-d', strtotime('-2 Months', strtotime($tanggal)));
$search = $db->query("SELECT * FROM pembelian_pulsa WHERE status IN ('','Pending') AND provider = 'DF' AND DATE(tanggal) BETWEEN '$stdate' AND '$tanggal' ORDER BY rand() LIMIT 20");
if($search->num_rows == 0) {
    exit(json_encode(['result' => false,'message' => 'Order Pending not found','Total' => 0,'data' => []], JSON_PRETTY_PRINT));
} else {
    $x = 0;
    while($row = $search->fetch_assoc()) {
        $tid    = $row['provider_oid'];
        $code   = $row['id_service'];
        $cust   = $row['user'];
        $target = $row['target'];
        $server = $row['provider'];
        $price  = $row['harga'];
        $profit = $row['profit'];
        
        // @mhmdlanna_
        $qProf = $harga - $profit;
    
        $buyer = $db->query("SELECT * FROM users WHERE username = '$cust'")->fetch_assoc();
        $reff = $buyer['uplink'];
        $prov = $db->query("SELECT * FROM provider WHERE code = '$server'")->fetch_assoc();
        
        if($server == 'DF') {
            $try = connect($prov['link'].'/transaction', json_encode([
                'username' => $prov['api_key'],
                'buyer_sku_code' => $code,
                'customer_no' => $target,
                'ref_id' => $tid,
                'sign' => md5($prov['api_key'].$prov['api_id'].$tid),
            ]))['data'];
            
            $data = [
                'success' => isset($try['ref_id']) ? true : false,
                'status' => $try['status'],
                'note' => $try['sn'] !== '' ? $try['sn'] : $try['message'],
                'errors' => !isset($try['ref_id']) ? 'Connection Failed!' : $try['message'],
            ];
        } else {
            $data = [
                'success' => false,
                'status' => 'error',
                'note' => '',
                'errors' => 'Provider not supported / still in the making stage.',
            ];
        }
        
        if($data['success'] == true) {
            $status = 'Pending';
            if($data['status'] == 'Sukses') $status = 'Success';
            if($data['status'] == 'Gagal') $status = 'Error';
            $note = $data['note'];
            if($db->query("UPDATE pembelian_guest SET status = '$status', keterangan = '$note', tanggal_at = '$tanggal', profit = '$qProf' WHERE provider_oid = '$tid' AND provider = '$server'") == true) {
            
            // @mhmdlanna_
            $email = $buyer['email'];
            require '../system/helpers/ord.php';
            
            $out[$x] = ['id' => $row['id'],'tid' => $tid,'date' => $row['tanggal'],'user' => $cust,'note' => $note,'status' => $status];               
                                
                if($status == 'Success') {
                    if($db->query("SELECT * FROM users WHERE username = '$reff'")->num_rows == 1) {
                        $db->query("UPDATE users SET poin = poin+$dataProfit WHERE username = '$reff'");                                                            
                    }
                } else if($status == 'Error') {
                    $db->query("UPDATE pembelian_pulsa SET profit = '0' WHERE username = '$cust' AND provider_oid = '$tid'");
                }
            } else {
                $out[$x] = ['id' => $row['id'],'tid' => $tid,'date' => $row['tanggal'],'user' => $cust,'error' => 'Update Failed!'];
            }
        } else {
            $out[$x] = ['id' => $row['id'],'tid' => $tid,'date' => $row['tanggal'],'user' => $cust,'error' => $data['errors']];
        }
        $x++;
    }
}

print json_encode($out, JSON_PRETTY_PRINT);