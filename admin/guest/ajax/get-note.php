<?php
require '../../../mainconfig.php';

if (isset($_POST['layanan'])) {
    $layanan = $_POST['layanan'];
    
    $q_l = mysqli_query($db, "SELECT * FROM layanan_sosmed WHERE id = '$layanan'");
    
    if (mysqli_num_rows($q_l) === 1) {
        
        $f_l = mysqli_fetch_assoc($q_l);
        
        echo '
        <div class="alert alert-info p-1">
            <b>Harga : Rp </b> '.number_format($f_l['harga'],0,',','.').'<br>
            <b>Min : </b> '.$f_l['min'].'<br>
            <b>Max : </b> '.$f_l['max'].'<br>
            <b>Note : </b> '.$f_l['catatan'].'<br>
        </div>';
    } else {
        echo '<div class="alert alert-warning p-1">Layanan tidak ditemukan</div>';
    }
}