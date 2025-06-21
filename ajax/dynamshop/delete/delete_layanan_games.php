<?php
require_once '../../../dynamshop.php';
$dService = mysqli_query($db, "DELETE FROM layanan_pulsa WHERE provider != 'Manual'");
if($dService == TRUE ) {
    print ''.LannGreen('Hapus Layanan Game Berhasil | create by dynamshop').'';
} else {
    print ''.LannRed('404').'';
}
?>