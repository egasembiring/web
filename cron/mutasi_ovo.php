<?php
require '../mainconfig.php';
require '../lib/ovo/ovo.php';
$dt = $db->query("SELECT * FROM akun_emoney WHERE type='OVO'")->fetch_assoc();
$ovo = new Ovo($dt['token']);
$mut = json_decode($ovo->transactionHistory(), true)['data']['orders'][0];
for($indeks = 0; $indeks <= count($mut['complete'][0])-1; $indeks++) {
    $data        = $mut['complete'][$indeks];
    $merchant    = $data['merchant_name'].' / '.$data['merchant_invoice'];
    $date_time   = $data['transaction_date'].' '.$data['transaction_time'];
    $akun_saya   = $data['card_no'];
    $trx_amount  = $data['transaction_amount'];
    $trx_fee     = $data['transaction_fee'];
    $desc_1      = $data['desc1'];
    $desc_2      = $data['desc2'];
    $an = $data['desc3'];
    $type        = $data['category_name'];
    
    //$desc = htmlentities($desc_1, ENT_QUOTES);
    //echo $akun_saya;
    
     $data_ovo = $db->query("SELECT * FROM mutasi_ovo WHERE keterangan = '$merchant'");
     if($data_ovo->num_rows > 0) {
        echo "<br>Data Mutasi OVO Sudah Ada Di Database<br>";
     } else {
    
    $i = $db->query("INSERT INTO mutasi_ovo VALUES ('', '$akun_saya', '$type', '$merchant', '$desc_2', '$trx_amount', '$desc_1', '$an', '$date_time', 'Unread')");
    if($i == TRUE) {
        echo '<b><font color="green">SUKSES! -></font> DATA MUTASI OVO TELAH DITAMBAHKAN KE DATABASE</b><br>';
    } else {
        echo '<b><font color="red">GAGAL! -></font> GAGAL MENAMPILKAN DATA MUTASI OVO</b><br>';
        }
    }
    
}
?>
