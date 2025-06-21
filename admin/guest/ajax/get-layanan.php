<?php
require '../../../mainconfig.php';

if (isset($_POST['kategori'])) {
    $kategori = $_POST['kategori'];
    
    $q_l = mysqli_query($db, "SELECT * FROM layanan_sosmed WHERE kategori = '$kategori' ORDER BY harga ASC");
    
    if (mysqli_num_rows($q_l) !== 0) {
        echo '<option value="">Pilih salah satu</option>';
        
        while($f_l = mysqli_fetch_assoc($q_l)) {
            echo '<option value="'.$f_l['id'].'">'.$f_l['layanan'].'</option>';
        }
    } else {
        echo '<option value="">Layanan tidak ditemukan</option>';
    }
}