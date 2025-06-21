<?php
// RGSann.
set_time_limit(240);
header('Content-Type: application/json');
require '../../mainconfig.php';
require 'docs.php';

$getProfit = $db->query("SELECT * FROM keuntungan WHERE code = 'PULSA_LAINNYA'")->fetch_assoc();
$cat_insert = 0;   $srv_insert = 0;   $srv_update = 0;
for($i = 0; $i <= count($res)-1; $i++) {
    $code       = $res[$i]['code'];
    $name       = $res[$i]['name'];
    $note       = $res[$i]['note'];
    $type       = $res[$i]['category'];
    $brand      = $res[$i]['brand'];
    $price      = $res[$i]['price'];
    $status     = $res[$i]['status'];
    $harga_web  = $price + $getProfit['web'];
    $harga_api  = $price + $getProfit['api'];
    $profit     = $getProfit['web'];
    
    if(in_array($type,['CHINA TOPUP','MALAYSIA TOPUP','PHILIPPINES TOPUP','SINGAPORE TOPUP','THAILAND TOPUP','VIETNAM TOPUP'])) $type = 'pulsa-internasional';        
    $type = strtr($type, array(
		'PULSA' => 'PULSA',
		'DATA' => 'PKIN',
		'PAKET SMS & TELPON' => 'PKSMS',
		'E-MONEY' => 'SALGO',
		'GAMES' => 'VGAME',
		'pulsa-internasional' => 'LAINYA',
		'PLN' => 'TOKENPLN',
		'VOUCHER' => 'VOUCHER',
		'STREAMING' => 'VOUCHER',
		'TV' => 'VOUCHER',
	));
	
    if($db->query("SELECT * FROM layanan_pulsa WHERE provider_id = '$code' AND provider = '".$provider['code']."'")->num_rows == false) {
        if($db->query("INSERT INTO layanan_pulsa VALUES ('','$code','$code','$brand','$name','$harga_web','$harga_api','$profit','$status','".$provider['code']."','$type','$note')") == true) $srv_insert += 1;
    } else {
        if($db->query("UPDATE layanan_pulsa SET note = '$note', harga = '$harga_web', harga_api = '$harga_api', profit = '$profit', status = '$status' WHERE provider_id = '$code' AND provider = '".$provider['code']."'") == true) $srv_update += 1;
    }
    
    if($db->query("SELECT * FROM kategori_layanan WHERE kode = '$brand' AND tipe = '$type'")->num_rows == 0)
        if($db->query("INSERT INTO kategori_layanan VALUES ('','$brand','$brand','$type')") == true) $cat_insert += 1;
}

$output = [
    'result' => true,
    'data' => [
        'category' => ['insert' => $cat_insert,'update' => 0],
        'service' => ['insert' => $srv_insert,'update' => $srv_update],
    ],
    'message' => 'Success!'
];

print json_encode($output, JSON_PRETTY_PRINT);