<?php
require_once '../../../mainconfig.php';
$check_provider = $db->query("SELECT * FROM provider ORDER BY id DESC");

$id = $_GET['id'];
if(!isset($id))
    die('No direct script access allowed!');
$query = mysqli_query($db, "SELECT * FROM layanan_pulsa WHERE id = '$id'");
$q = mysqli_fetch_assoc($query); 
?>

<form method="POST">
<div class="form-group">
        <label>ID</label>
        <input type="text" class="form-control" name="pid" value="<?= $q['id']; ?>" readonly>
    </div>
<div class="form-group">
        <label>Layanan</label>
        <input type="text" class="form-control" name="layanan" value="<?= $q['layanan']; ?>">
    </div>
<div class="form-group">
        <label>Note</label>
        <input type="text" class="form-control" name="note" value="<?= $q['note']; ?>">
    </div>
    <div class="form-group">
        <label>Harga Basic</label>
        <input type="number" class="form-control" name="harga" value="<?= $q['harga']; ?>">
    </div>
    <div class="form-group">
        <label>Harga API/RESS</label>
        <input type="number" class="form-control" name="harga_api" value="<?= $q['harga_api']; ?>">
    </div>
    <div class="form-group">
        <label>Harga Premium/K</label>
        <input type="number" class="form-control" name="harga_premium" value="<?= $q['harga_premium']; ?>">
    </div>
    <div class="form-group">
        <label>Harga H2H/K</label>
        <input type="number" class="form-control" name="harga_h2h" value="<?= $q['harga_h2h']; ?>">
    </div>
    <div class="form-group">
        <label>Profit Basic</label>
        <input type="text" class="form-control" value="<?= $q['harga'] - $q['profit']; ?>" readonly>
        <small class="text-danger">*Ini hitung profit harga website.</small>
    </div>
    <div class="form-group">
        <label>Profit API/Ress</label>
        <input type="text" class="form-control" value="<?= $q['harga_api'] - $q['profit']; ?>" readonly>
        <small class="text-danger">*Ini hitung profit harga API.</small>
    </div>
    <div class="form-group">
        <label>Type</label>
        <select class="form-control" name="tipe">
				<option value="0">- Select One -</option>
				
					<option value="PULSA">Pulsa Reguler - PULSA</option>
					<option value="PKIN">Paket Internet - PKIN</option>
					<option value="PKSMS">Paket SMS & Telepon - PKSMS</option>
					<option value="TOKENPLN">Token PLN Prabayar - TOKENPLN</option>
					<option value="SALGO">Saldo E-Money - SALGO</option>
					<option value="VGAME">Voucher Game - VGAME</option>
					<option value="VOUCHER">Voucher Lainnya - paket-lainnya</option>
			</select>
			    <small class="text-danger">*Now: <?= $q['tipe']; ?></small>
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="Normal" <?= $q['status'] == 'Normal' ? 'selected' : '' ?>>Normal</option>
            <option value="Gangguan" <?= $q['status'] == 'Gangguan' ? 'selected' : '' ?>>Gangguan</option>
    </select>
    </div>
      <div class="form-group">
                <label>Provider</label>
                <select class="form-control" name="provider">
                    <option value="">- Select One -</option>
                    <?php while ($prv = $check_provider->fetch_assoc()) { ?>
                    <option value="<?= e($prv['code']) ?>"><?= e($prv['code']) ?></option>
                    <?php } ?>
                </select>
                <small class="text-danger">*Now: <?= $q['provider']; ?></small>
            </div>
    <hr>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <button type="button" data-dismiss="modal" class="btn btn-block text-white bg-danger fw-bold">BACK</button>
            </div>
            <div class="col-6">
                <button type="submit" name="edit_layanan" class="btn btn-block text-white bg-primary fw-bold">CHANGE</button>
            </div>
        </div>
    </div>
</form>
