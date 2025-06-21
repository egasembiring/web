<?php
require '../../../mainconfig.php';

if (isset($_POST['status']) AND isset($_POST['id']) AND isset($_POST['table'])) {
    $id = addslashes(trim(htmlspecialchars($_POST['id'])));
    $status = addslashes(trim(htmlspecialchars($_POST['status'])));
    
    $table = addslashes(trim(htmlspecialchars($_POST['table'])));
    
    if (!empty($id) AND !empty($status) AND !empty($table)) {
        if (is_numeric($id) AND in_array($status, ['On', 'Off'])) {
            mysqli_query($db, "UPDATE $table SET status = '$status' WHERE id = '$id'");
        }
    }
}