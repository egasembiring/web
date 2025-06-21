<?php
session_start();
require_once '../../maincofig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url('/id'));
}

if (isset($_POST['tombol'])) {
    
    opt_update('c210cF9ob3N0', $_POST['host']);
    opt_update('c210cF9wb3J0', $_POST['port']);
    opt_update('c210cF9uYW1l', $_POST['name']);
    opt_update('c210cF91c2VybmFtZQ==', $_POST['username']);
    opt_update('c210cF9wYXNzd29yZA==', $_POST['password']);
    
    $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di edit.'];
	exit(header("Location: ".base_url('/admin/setting/smtp')));
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
                <h4 class="card-title">Konfigurasi SMTP</h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Host</label>
                        <input type="text" class="form-control" placeholder="Dynam Shop" autocomplete="off" value="<?= opt_get('c210cF9ob3N0'); ?>" name="host">
                    </div>
                    <div class="form-group">
                        <label>Port</label>
                        <input type="number" class="form-control" placeholder="Dynam Shop" autocomplete="off" value="<?= opt_get('c210cF9wb3J0'); ?>" name="port">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Dynam Shop" autocomplete="off" value="<?= opt_get('c210cF9uYW1l'); ?>" name="name">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="email" class="form-control" placeholder="Dynam Shop" autocomplete="off" value="<?= opt_get('c210cF91c2VybmFtZQ=='); ?>" name="username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" placeholder="Dynam Shop" autocomplete="off" value="<?= opt_get('c210cF9wYXNzd29yZA=='); ?>" name="password">
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