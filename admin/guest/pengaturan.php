<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}

function validate_img($files) {
    if ($files['error'] == 0) {
        $format = strtolower(end(explode('.', $files['name'])));
        
        if (in_array($format, ['jpg', 'jpeg', 'png'])) {
            if ($files['size'] > 5000000) {
                return false;
            } else {
                $nama_baru = uniqid() . '.' . $format;
                
                move_uploaded_file($files['tmp_name'], '../../assets/images/' . $nama_baru);
                return $nama_baru;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if (isset($_POST['tombol'])) {
    
    opt_update('Z3Vlc3Rfc3RhdHVz', $_POST['guest_status']);
    opt_update('cG9wdXBfZ3Vlc3Rfc3RhdHVz', $_POST['popup_guest_status']);
    
    $popup_guest_link = validate_img($_FILES['popup_guest_link']);
    if ($popup_guest_link !== false) {
        opt_update('cG9wdXBfZ3Vlc3RfbGluaw==', '/assets/images/' . $popup_guest_link);
    }
    
    $logo_guest = validate_img($_FILES['logo_guest']);
    if ($logo_guest !== false) {
        opt_update('bG9nb19ndWVzdA==', '/assets/images/' . $logo_guest);
    }
    
    $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di simpan.'];
	exit(header("Location: ".base_url('/admin/guest/pengaturan.php')));
}

include_once '../../layouts/header_admin.php'; ?>
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
                <h4 class="card-title">Pengaturan</h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Gambar Logo</label><br>
                        <img src="<?= opt_get('bG9nb19ndWVzdA=='); ?>" width="120" class="mb-1">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="logo_guest">
                            <label class="custom-file-label" for="customFile">Ganti gambar</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status Popup</label>
                        <select class="form-control" name="popup_guest_status">
                            <option value="On" <?= opt_get('cG9wdXBfZ3Vlc3Rfc3RhdHVz') == 'On' ? 'selected' : ''; ?>>On (aktif)</option>
                            <option value="Off" <?= opt_get('cG9wdXBfZ3Vlc3Rfc3RhdHVz') == 'Off' ? 'selected' : ''; ?>>Off (nonaktif)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gambar Popup</label><br>
                        <img src="<?= opt_get('cG9wdXBfZ3Vlc3RfbGluaw=='); ?>" width="120" class="mb-1">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="popup_guest_link">
                            <label class="custom-file-label" for="customFile">Ganti gambar</label>
                        </div>
                    </div><br>
                    <div class="text-right">
                        <button type="reset" class="btn btn-light">Batal</button>
                        <button type="submit" class="btn btn-relief-primary" name="tombol">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once '../../layouts/footer.php'; ?>
<script>
    function selec_style(id) {
        $("#input-games-style").val(id);
        
        $(".games-style").removeClass('style-active');
        $("#games-style-" + id).addClass('style-active');
    }
</script>