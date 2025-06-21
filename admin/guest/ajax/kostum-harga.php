<?php
require '../../../mainconfig.php';

if (isset($_POST['produk'])) {
    $produk = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, $_POST['produk']))));
    
    if (!empty($produk)) {
        $query_produk = mysqli_query($db, "SELECT * FROM layanan_pulsa WHERE id = '$produk'");
        
        if (mysqli_num_rows($query_produk) === 1) {
            $fetch_produk = mysqli_fetch_assoc($query_produk);
            
            echo '
            <input type="hidden" name="id" value="'.$produk.'">
                    
            <table class="table">
                <tr>
                    <th>Metode</th>
                    <th>Harga</th>
                </tr>
            ';
            
            $query_metode_guest = mysqli_query($db, "SELECT * FROM metode_guest");
            while($fetch_metode_guest = mysqli_fetch_assoc($query_metode_guest)) {
                
                $query_harga = mysqli_query($db, "SELECT * FROM harga_guest WHERE layanan_id = '$produk' AND metode_id = '".$fetch_metode_guest['id']."'");
                if (mysqli_num_rows($query_harga) === 1) {
                    
                    $fetch_harga = mysqli_fetch_assoc($query_harga);
                    
                    $harga_real = $fetch_harga['harga'];
                } else {
                    $harga_real = $fetch_produk['harga'];
                }
                
                echo '
                    <tr>
                        <th><img src="/assets/metode/'.$fetch_metode_guest['img'].'" width="60"></th>
                        <td><input type="number" name="harga['.$fetch_metode_guest['id'].']" class="form-control kostum-harga" value="'.$harga_real.'"></td>
                    </tr>
                ';
            }
            
            echo '</table>';
        }
    }
}