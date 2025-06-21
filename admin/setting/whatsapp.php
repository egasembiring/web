<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}
$nwa = $db->query("SELECT * FROM options WHERE opt_name")->fetch_assoc();
if (isset($_POST['tombol'])) {
	$nomor = $_POST['nomor'];
	$links = $_POST['link'];
	$key = $_POST['key'];
	$db->query("UPDATE opt_value FROM options W tp-link='$link', tp-phone='$nomor', tp-key='$key'");
	$_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di edit.'];
	exit(header("Location: ".base_url('/admin/setting/whatsapp')));
}

include_once '../../layouts/header_admin.php'; ?>

<style>
    .input-group-text {
        background: #e5e5e5;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Konfigurasi WA GATEWAY</h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" placeholder="MyPulsaa" autocomplete="off" value="<?= $wa['opt_value']['tp-link']; ?>" name="link">
                    </div>
                    <div class="form-group">
                        <label>Nomor WhatsApp</label>
                        <input type="number" class="form-control" placeholder="MyPulsaa" autocomplete="off" value="<?= $wa['opt_value']['tp-phone']; ?>" name="nomor">
                    </div>
                    <div class="form-group">
                        <label>API KEY</label>
                        <input type="text" class="form-control" placeholder="MyPulsaa" autocomplete="off" value="<?= $wa['tp-key']; ?>" name="key">
                    </div>
                    <div class="text-right">
                        <button class="btn btn-relief-primary" type="submit" name="tombol">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once '../../layouts/footer.php'; ?>