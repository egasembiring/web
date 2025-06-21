<?php
session_start();
require_once '../../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}

if (isset($_POST['tombol'])) {
    if (isset($_POST['games_style'])) {
        opt_update('Z2FtZXNfc3R5bGVfZ3Vlc3Q=', $_POST['games_style']);
        
        $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di simpan.'];
        exit(header("Location: ".base_url('/admin/guest/games/atur.php')));
    }
}

include_once '../../../layouts/header_admin.php'; ?>
<style>
    .games-style {
        cursor: pointer;
        border-radius: 15px;
        border: 2px solid #fff;
    }
    .style-active {
        border-color:  #7367F0;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Konfigurasi</h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="mb-1">Style Games</label>
                        <input type="hidden" name="games_style" id="input-games-style">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="games-style <?= opt_get('Z2FtZXNfc3R5bGVfZ3Vlc3Q=') == 1 ? 'style-active' : ''; ?>" id="games-style-1" onclick="selec_style('1');">
                                    <img src="https://i.postimg.cc/zGZnSkgW/Opera-Snapshot-2022-03-07-232556-duitly-my-id.png" style="border-radius: 15px;" width="100%">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="games-style <?= opt_get('Z2FtZXNfc3R5bGVfZ3Vlc3Q=') == 2 ? 'style-active' : ''; ?>" id="games-style-2" onclick="selec_style('2');">
                                    <img src="https://i.postimg.cc/pVSQyvVs/Opera-Snapshot-2022-03-07-232535-duitly-my-id.png" style="border-radius: 15px;" width="100%">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="games-style <?= opt_get('Z2FtZXNfc3R5bGVfZ3Vlc3Q=') == 3 ? 'style-active' : ''; ?>" id="games-style-3" onclick="selec_style('3');">
                                    <img src="https://i.postimg.cc/hjpLd5xC/8682831221.jpg" style="border-radius: 15px;" width="100%">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="games-style <?= opt_get('Z2FtZXNfc3R5bGVfZ3Vlc3Q=') == 4 ? 'style-active' : ''; ?>" id="games-style-4" onclick="selec_style('4');">
                                    <img src="https://i.postimg.cc/sxq8tFh7/image.png" style="border-radius: 15px;" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/guest/games" class="btn btn-warning float-left">Kembali</a>
                    <div class="text-right">
                        <button type="reset" class="btn btn-default">Batal</button>
                        <button type="submit" class="btn btn-primary" name="tombol">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../../../layouts/footer.php'; ?>
<script>
    function selec_style(id) {
        $("#input-games-style").val(id);
        
        $(".games-style").removeClass('style-active');
        $("#games-style-" + id).addClass('style-active');
    }
</script>