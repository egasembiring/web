<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url('/id'));
}

include_once '../../layouts/header_admin.php'; ?>
<section id="dashboard-analytics">
    <div class="row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Delete Layanan & Kategori</h4>
                <hr>
                <?php if ($data_user['level'] == 'Admin') { ?>
                <div class="form-group">
                     <div class="col-md-12">
                        <a href="<?= config('web','url') ?>/ajax/dynamshop/delete/delete_kategori" class="pull-right btn btn-block btn--md btn-relief-danger waves-effect w-md waves-light">Delete All Kategori </a>
                     </div>
                </div>
                <div class="form-group">
                     <div class="col-md-12">
                        <a href="<?= config('web','url') ?>/ajax/dynamshop/delete/delete_layanan_games" class="pull-right btn btn-block btn--md btn-relief-danger waves-effect w-md waves-light">Delete Layanan Games</a>
                     </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    

                    </section>
<?php include_once '../../layouts/footer.php'; ?>