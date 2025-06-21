<?php

function connect($end_point,$cmd,$provider) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $end_point);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'cmd' => $cmd,
        'username' => $provider['api_key'],
        'sign' => md5($provider['api_key'].$provider['api_id'].'pricelist')
    ]));
    $chresult = curl_exec($ch);
    return json_decode($chresult, true);
}

$provider = $db->query("SELECT * FROM provider WHERE code = 'DIGI'")->fetch_assoc();
$prepa              = connect($provider['link'].'/price-list', 'prepaid', $provider);
$postpa             = connect($provider['link'].'/price-list', 'pasca', $provider);
$data['prepaid']    = $prepa['data'];
$data['postpaid']   = $postpa['data'];

if(isset($data['prepaid']['message'])) {
    $output = [
        'result' => false,
        'data' => null,
        'message' => $data['prepaid']['message']
    ];
} else if($data['prepaid'] == null) {
    $output = [
        'result' => false,
        'data' => null,
        'message' => 'Failed to get service data.'
    ];
} else {
    for($i = 0; $i <= count($data['prepaid'])-1; $i++) {
        $status = $data['prepaid'][$i]['buyer_product_status'] == true ? 'Normal' : 'Gangguan';
        $res[] = [
            'name' => ucwords($data['prepaid'][$i]['product_name']),
            'note' => $data['prepaid'][$i]['desc'],
            'code' => $data['prepaid'][$i]['buyer_sku_code'],
            'brand' => strtoupper($data['prepaid'][$i]['brand']),
            'price' => $data['prepaid'][$i]['price'],
            'multi' => $data['prepaid'][$i]['multi'],
            'status' => $data['prepaid'][$i]['seller_product_status'] == true ? $status : 'Gangguan',
            'category' => strtoupper($data['prepaid'][$i]['category']),
        ];
    }
    
    for($i = 0; $i <= count($data['postpaid'])-1; $i++) {
        $status = ($data['postpaid'][$i]['buyer_product_status'] == true) ? 'Normal' : 'Gangguan';
        $price = ($data['postpaid'][$i]['admin'] < 1) ? '0' : $data['postpaid'][$i]['admin']-$data['postpaid'][$i]['commission'];
        $res[] = [
            'name' => ucwords($data['postpaid'][$i]['product_name']),
            'note' => '',
            'code' => $data['postpaid'][$i]['buyer_sku_code'],
            'brand' => strtoupper($data['postpaid'][$i]['brand']),
            'price' => ($data['postpaid'][$i]['admin'] < 1) ? '0' : $data['postpaid'][$i]['admin']-$data['postpaid'][$i]['commission'],
            'multi' => false,
            'status' => $data['postpaid'][$i]['seller_product_status'] == true ? $status : 'Gangguan',
            'category' => strtoupper($data['postpaid'][$i]['category']),
        ];
    }
}