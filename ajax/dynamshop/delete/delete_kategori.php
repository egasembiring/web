<?php
require_once '../../../dynamshop.php';
$dCategory = mysqli_query($db, "DELETE FROM kategori_layanan");
if($dCategory == TRUE ) {
    print ''.LannGreen('Hapus kategori berhasil | create by dynamshop').'';
} else {
    print ''.LannRed('404').'';
}
?>