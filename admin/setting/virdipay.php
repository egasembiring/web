<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url('/id'));
}

if (isset($_POST['tombol'])) {
    opt_update('dnBfa2V5', $_POST['vp_key']);
    opt_update('dnBfc2VjcmV0', $_POST['vp_secret']);
    
    $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di edit.'];
	exit(header("Location: ".base_url('/admin/setting/virdipay')));
}

include_once '../../layouts/header_admin.php'; ?>

<style>
    .input-group-text {
        background: #e5e5e5;
    }
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script> 
swal(
  'Hai, <?= config('web', 'author') ?>',
  'Harap perpanjang apikey checkname anda jika ingin digunakan harap segera melakukan perpanjang, info lebih lanjut hubungi whatsapp admin.',
  'info'
)
</script>
<div class="alert p-1 alert-danger">
    <b>Note:</b> untuk apikey checkname ini akan exp setiap 1 bulan.
                    </div>
<div class="row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Api CheckName</h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Api Key</label>
                        <input type="text" class="form-control" autocomplete="off" value="<?= opt_get('dnBfa2V5'); ?>" name="vp_key">
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit" name="tombol">Simpan</button>
                        <br><br>
                        <small>Hubungi Developer di <a href="https://wa.me/6283824934243">WhatsApp</a> untuk perpanjang api nickname</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once '../../layouts/footer.php'; ?>