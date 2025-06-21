<?php
require '../../../mainconfig.php';

if (isset($_POST['produk'])) {
    $produk = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, $_POST['produk']))));
    
    if (!empty($produk)) {
        $no = 1;
        $query_produk = mysqli_query($db, "SELECT * FROM layanan_pulsa WHERE operator = '$produk'");
        while($fetch_produk = mysqli_fetch_assoc($query_produk)) {
            
            $onKostum = "'" .$fetch_produk['id']. "'";
            
            echo '
            <tr>
                <td>'.$no++.'</td>
                <td>'.$fetch_produk['layanan'].'</td>
                <td style="white-space: nowrap;">Rp '.number_format($fetch_produk['harga'],0,',','.').'</td>
                <td>
                    <button onclick="kostum_harga('.$onKostum.');" class="btn btn-relief-primary btn-sm" type="button">Kostum</button>
                </td>
            </tr>
            ';
        }
    }
}