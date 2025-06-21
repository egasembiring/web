<?php
require_once '../../../mainconfig.php';

$id = $_GET['id'];
if(!isset($id))
    die('No direct script access allowed!');
$query = mysqli_query($db, "SELECT * FROM pembelian_pulsa WHERE id = '$id'");
$q = mysqli_fetch_assoc($query); 
?>

<form method="POST">
<div class="form-group">
        <label>ID</label>
        <input type="number" class="form-control" name="oid" value="<?= $q['oid']; ?>" readonly>
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <textarea class="form-control" name="nb"><?= $q['keterangan']; ?></textarea>
    </div>
    <?php if ($q['status'] == 'Error') { ?>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="Error" <?= $q['status'] == 'Error' ? 'selected' : '' ?>>Error</option>
        </select>
    </div>
    <?php } ?>
    
    <?php if ($q['status'] == 'Success') { ?>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="Success" <?= $q['status'] == 'Success' ? 'selected' : '' ?>>Success</option>
        </select>
    </div>
    <?php } ?>
    
    <?php if ($q['status'] == 'Pending') { ?>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="Pending" <?= $q['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
            <option value="Error" <?= $q['status'] == 'Error' ? 'selected' : '' ?>>Error</option>
            <option value="Success" <?= $q['status'] == 'Success' ? 'selected' : '' ?>>Success</option>
        </select>
    </div>
    <?php } ?>
    <hr>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <button type="button" data-dismiss="modal" class="btn btn-block text-white bg-danger fw-bold">BACK</button>
            </div>
            <div class="col-6">
                <button type="submit" name="edit_trx" class="btn btn-block text-white bg-primary fw-bold">CHANGE</button>
            </div>
        </div>
    </div>
</form>
