<?php
require '../../../mainconfig.php';

if (isset($_POST['urutan']) AND isset($_POST['id'])) {
    $id = addslashes(trim(htmlspecialchars($_POST['id'])));
    $urutan = addslashes(trim(htmlspecialchars($_POST['urutan'])));
    
    if (!empty($id) AND !empty($urutan)) {
        if (is_numeric($id) AND is_numeric($urutan)) {
            mysqli_query($db, "UPDATE games_kategori_guest SET urutan = '$urutan' WHERE id = '$id'");
        }
    }
}