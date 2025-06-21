<?php
require_once '../../../dynamshop.php';
$check_data = $db->query("SELECT * FROM provider ORDER BY id DESC");
$check_category = $db->query("SELECT * FROM kategori_layanan ORDER BY id DESC");
if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { ?>
<form method="POST">
<div class="form-group">
        <label>Provider</label>
        <select class="form-control" name="provider">
				<option value="0">- Select One -</option>
				
	<?php while ($data_provider = $check_data->fetch_assoc()) { ?>
	<option value="<?= $data_provider['code']; ?>"><?= $data_provider['code']; ?></option>
	<?php } ?>
			</select>
    </div>
    <div class="form-group">
        <label>Category</label>
        <input class="form-control" name="kategori">
    </div>
<div class="form-group">
        <label>Code</label>
        <input type="text" class="form-control" placeholder="FF250DM" name="code">
    </div>
<div class="form-group">
        <label>Layanan</label>
        <input type="text" class="form-control" name="layanan">
    </div>
    <div class="form-group">
        <label>Note</label>
        <textarea class="form-control" name="note" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label>Harga Web</label>
        <input type="number" class="form-control" name="harga_web">
    </div>
    <div class="form-group">
        <label>Profit</label>
        <input type="number" class="form-control" placeholder="contoh: 10115" name="profit">
        <small class="text-danger">Harga asli layanannya, biar sistem yang ngitung profit.</small>
    </div>
    <div class="form-group">
        <label>Type</label>
        <select class="form-control" name="tipe">
				<option value="0">- Select One -</option>
				
					<option value="VGAME">Voucher Game</option>
			</select>
    </div>
    <hr>
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <button type="button" data-dismiss="modal" class="btn btn-block text-white bg-danger fw-bold">BACK</button>
            </div>
            <div class="col-6">
                <button type="submit" name="addlayanan" class="btn btn-block text-white bg-primary fw-bold">ADD</button>
            </div>
        </div>
    </div>
</form>
<?php } ?>