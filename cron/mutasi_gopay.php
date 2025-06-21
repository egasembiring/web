<?php
require("../mainconfig.php");
require("../lib/gopay/gopay.php");


$dt = $db->query("SELECT * FROM akun_emoney WHERE type = 'GOPAY'")->fetch_assoc();
$Gopay = new GojekPay($dt['token']);
$mut = json_decode($Gopay->getTransactionHistory(), true);

$cek_us = $db->query("SELECT * FROM pembelian_guest WHERE metode = 'GOPAY'");
$dat_us = $cek_us->fetch_assoc();

for($indeks = 0; $indeks <= count($mut['data']['success'])-1; $indeks++) {
    $data       = $mut['data']['success'][$indeks];
    $type       = $data['type'];
    $saldo      = $data['amount']['value'];
    $deskripsi  = $data['description'];
    $waktu      = $data['transacted_at'];
    $ref_trx    = $data['transaction_ref'];
    
     $dataGopay = $conn->query("SELECT * FROM mutasi_gopay WHERE ref_trx = '$ref_trx'");
     if($dataGopay->num_rows > 0) {
        echo "<br>Data Mutasi GOPAY Sudah Ada Di Database<br>";
     } else {
    
    $i = $conn->query("INSERT INTO mutasi_gopay VALUES ('', '$type', '$saldo','$deskripsi', '$waktu', '$ref_trx', 'Unread')");
    if($i == TRUE) {
        echo '<b><font color="green">SUKSES! -></font> DATA MUTASI GOPAY TELAH DITAMBAHKAN KE DATABASE</b><br>';
    } else {
        echo '<b><font color="red">GAGAL! -></font> GAGAL MENAMPILKAN DATA MUTASI GOPAY</b><br>';
        }
    }
}
?>