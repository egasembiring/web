<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url('/id'));
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

if (isset($_POST['tombol_logo'])) {
    
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
	exit(header("Location: ".base_url('/admin/setting')));
}

if (isset($_POST['tombol'])) {
    $icon = validate_img($_FILES['icon']);
    
    if ($icon !== false) {
        opt_update('aWNvbi13ZWI=', base_url('/assets/upload/images/') . $icon);
    }
    
    opt_update('dGl0bGU=', $_POST['title']);
    opt_update('dGl0bGVfd2Vi', $_POST['title_web']);
    opt_update('YXV0aG9y', $_POST['author']);
    opt_update('ZGVzY3JpcHRpb24=', $_POST['description']);
    opt_update('a2V5d29yZHM=', $_POST['keywords']);
    
    opt_update('cmVfc2l0ZQ==', $_POST['re_site']);
    opt_update('cmVfc2VjcmV0', $_POST['re_secret']);
    
    $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di edit.'];
	exit(header("Location: ".base_url('/admin/setting')));
}
if (isset($_GET['hapus'])) {
    $hapus = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, $_GET['hapus']))));
    
    $query_slide = mysqli_query($db, "SELECT * FROM slider WHERE id = '$hapus'");
    
    if (mysqli_num_rows($query_slide) === 1) {
        $fetch_slide = mysqli_fetch_assoc($query_slide);
        
        unlink('../../assets/slide/' . $fetch_slide['img']);
        
        mysqli_query($db, "DELETE FROM slider WHERE id = '$hapus'");
        
        $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di hapus.'];
        exit(header("Location: ".base_url('/admin/setting')));
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Data slide tidak ditemukan.'];
    }
}

if (isset($_POST['tombol_slide'])) {
    
    if (isset($_FILES['gambar'])) {
        if ($_FILES['gambar']['error'] !== 4) {
            
            $format_file = end(explode('.', strtolower($_FILES['gambar']['name'])));
        
            if (in_array($format_file, ['jpg', 'jpeg', 'png'])) {
                
                $nama_file = uniqid() . '.' . $format_file;
                
                move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/slide/' . $nama_file);
                
                mysqli_query($db, "INSERT INTO slider VALUES ('','$nama_file','Guest')");
                
                $_SESSION['alert'] = ['success', 'Success!', 'Gambar slide berhasil ditambah.'];
                exit(header("Location: ".base_url('/admin/setting')));
            } else {
                $_SESSION['alert'] = ['danger', 'Failed!', 'Format gambar tidak sesuai.'];
            }
        } else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gambar tidak boleh kosong.'];
        }
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Gambar tidak boleh kosong.'];
    }
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
                <h4 class="card-title">Setting</h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Website</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="TPULSA" value="<?= opt_get('dGl0bGU='); ?>" name="title">
                    </div>
                    <div class="form-group">
                        <label>Nav Title</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="TPULSA" value="<?= opt_get('dGl0bGVfd2Vi'); ?>" name="title_web">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="TPULSA" value="<?= opt_get('YXV0aG9y'); ?>" name="author">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="TPULSA" value="<?= opt_get('ZGVzY3JpcHRpb24='); ?>" name="description">
                    </div>
                    <div class="form-group">
                        <label>Keywords</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="TPULSA" value="<?= opt_get('a2V5d29yZHM='); ?>" name="keywords">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Favicon Web</label> <br>
                        <img src="<?= opt_get('aWNvbi13ZWI='); ?>" width="50" class="mb-1">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="icon">
                            <label class="custom-file-label" for="customFile">Ganti gambar</label>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit" name="tombol">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="card">
            <div style="margin-bottom:-9px;" class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Gambar Logo</label><br>
                        <img src="<?= opt_get('bG9nb19ndWVzdA=='); ?>" width="120" class="mb-2">
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
                        <button type="submit" class="btn btn-relief-primary" name="tombol_logo">Simpan</button>
                    </div>
                    <br >
                    <br>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Slide</h4>
            </div>
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table table-hover table-striped border">
                        <tr>
                            <th>Gambar</th>
                            <th width="10">Action</th>
                        </tr>
                        <?php 
                        $no = 1;
                        $query_pembelian_guest = mysqli_query($db, "SELECT * FROM slider WHERE posisi = 'Guest' ORDER BY id DESC");
                        while($fetch_pembelian_guest = mysqli_fetch_assoc($query_pembelian_guest)): 
                        ?>
                        <tr>
                            <td>
                                <img src="../../assets/slide/<?= $fetch_pembelian_guest['img']; ?>" style="max-height: 100px">
                            </td>
                            <td style="white-space: nowrap;">
                                <a class="btn btn-relief-danger btn-sm" href="/admin/setting?hapus=<?= $fetch_pembelian_guest['id']; ?>">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if (mysqli_num_rows($query_pembelian_guest) == 0): ?>
                        <tr>
                            <td colspan="7" align="center">Tidak ada data</td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Slide</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="mb-1">Gambar Slide</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="gambar">
                            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-light" type="reset">Batal</button>
                        <button class="btn btn-relief-primary" type="submit" name="tombol_slide">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script>
    function selec_style(id) {
        $("#input-games-style").val(id);
        
        $(".games-style").removeClass('style-active');
        $("#games-style-" + id).addClass('style-active');
    }
</script>
<?php include_once '../../layouts/footer.php'; ?>