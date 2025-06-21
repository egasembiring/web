<?php
require '../../mainconfig.php';

if (isset($_POST['produk'])) {
    
    $produk = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, $_POST['produk']))));
    
    // echo $produk; die;
    
    if (!empty($produk)) {
        if (is_numeric($produk)) {
            
            if (isset($_POST['smm'])) {
                $query_produk = mysqli_query($db, "SELECT * FROM guest_produk_smm WHERE id = '$produk'");
            } else {
                $query_produk = mysqli_query($db, "SELECT * FROM layanan_pulsa WHERE id = '$produk'");
            }
            
            if (mysqli_num_rows($query_produk) !== 0) {
                $fetch_produk = mysqli_fetch_assoc($query_produk);
                
                $harga = [];
                
                $query_metode = mysqli_query($db, "SELECT * FROM metode_guest");
                while($fetch_metode = mysqli_fetch_assoc($query_metode)) {
                    
                    $tipe = isset($_POST['smm']) ? 'SMM' : 'Games';
                    
                    $query_harga = mysqli_query($db, "SELECT * FROM harga_guest WHERE layanan_id = '$produk' AND metode_id = '".$fetch_metode['id']."' AND tipe = '$tipe'");
                    
                    if (mysqli_num_rows($query_harga) == 1) {
                        $fetch_harga = mysqli_fetch_assoc($query_harga);
                        
                        $real_harga = $fetch_harga['harga'];
                    } else {
                        $real_harga = $fetch_produk['harga'];
                    }
                    
                    $harga[] = [
                        'id' => $fetch_metode['id'],
                        'harga' => 'Rp '. number_format($real_harga,0,',','.'),
                    ];
                }
                
                echo json_encode($harga);
            }
        }
    }
}