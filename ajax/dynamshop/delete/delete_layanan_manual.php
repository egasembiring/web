<?php
require_once '../../../dynamshop.php';
$dServiceS = mysqli_query($db, "DELETE FROM layanan_sosmed WHERE provider != 'Manual'");
if($dServiceS == TRUE ) {
    print ''.LannGreen('Delete Service SMM successfully').'';
} else {
    print ''.LannRed('404').'';
}
?>