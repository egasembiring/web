<?php
require '../mainconfig.php';
    $CEK = $db->query("SELECT * FROM provider WHERE code='DF'");
    $DFs = $CEK->fetch_assoc();
    $hmem = $db->query("SELECT * FROM options WHERE opt_name='df_harga_member'");
    $hmems = $hmem->fetch_assoc();
    $hres = $db->query("SELECT * FROM options WHERE opt_name='df_harga_reseller'");
    $hress = $hres->fetch_assoc();
    $hpre = $db->query("SELECT * FROM options WHERE opt_name='df_harga_premium'");
    $hprem = $hpre->fetch_assoc();
    $h2h = $db->query("SELECT * FROM options WHERE opt_name='df_harga_h2hspecial'");
    $h2hh = $h2h->fetch_assoc();
    $df_user = $DFs['api_id'];
    $df_key = $DFs['api_key'];
    $sign = md5($df_user.$df_key."pricelist");
    $data = json_encode([
        "cmd" => 'prepaid',
        "username" => $df_user,
        "sign" => $sign
    ]);
    $header = array(
        'Content-Type: application/json',
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/price-list');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    $results = json_decode($result, true);

    if (isset($results['data'])) {
        $db->query("DELETE FROM layanan_pulsa WHERE provider = 'DF'");
        foreach($results['data'] as $loop) {
            
            $product = $loop['product_name'];
            $tipe = $loop['category'];
            $category = $loop['brand'];
            $type = $loop['type'];
            $buyer_sku_code = $loop['buyer_sku_code'];
            $desc = $loop['desc'];
            $status = $loop['seller_product_status'];
            
            $price_member = $loop['price'] + $hmems['opt_value'];
            $price_reseller = $loop['price'] + $hress['opt_value'];
            $price_premium = $loop['price'] + $hprem['opt_value'];
            $price_h2hspecial = $loop['price'] + $h2hh['opt_value'];
            $no = 1;
            $statuss = $status == true ? 'Normal' : 'Gangguan';
            
            if ($tipe == 'Data') {
                $tipee = 'VGAME';
            } else if ($tipe == 'Pulsa') {
                $tipee = 'VGAME';
            } else if ($tipe == 'E-Money') {
                $tipee = 'VGAME';
            } else if ($tipe == 'Games') {
                $tipee = 'VGAME';
            } else if ($tipe == 'PLN') {
                $tipee = 'VGAME';
            } else if ($tipe == 'Voucher') {
                $tipee = 'VGAME';
            } else if ($tipe == 'Paket SMS & Telpon') {
                $tipee = 'VGAME';
            } else {
                $tipee = 'VGAME';
            }
            
            if ($tipee !== false) {
                $db->query("INSERT INTO `layanan_pulsa` (`id`, `service_id`, `provider_id`, `operator`, `layanan`, `harga`, `harga_api`, `harga_premium`, `harga_h2h`, `profit`, `status`, `provider`, `tipe`, `note`) VALUES ('', '$buyer_sku_code', '$buyer_sku_code', '$category', '$product', '$price_member', '$price_reseller', '$price_premium', '$price_h2hspecial', '0', '$statuss', 'DF', '$tipee', '$desc')");
                echo "berhasil";
            }
        }
        
    } else {
        echo $results['data']['message'];
    }
if (isset($_GET['redirect'])) {
    header('location:/admin/provider/provider');
}