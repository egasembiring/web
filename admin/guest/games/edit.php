<?php
session_start();
require_once '../../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}

if (isset($_GET['id'])) {
    $id = addslashes(trim(htmlspecialchars($_GET['id'])));
    
    if (!empty($id)) {
        $query_games = mysqli_query($db, "SELECT * FROM games_guest WHERE id = '$id'");
        
        if (mysqli_num_rows($query_games) === 1) {
            $fetch_games = mysqli_fetch_assoc($query_games);
        } else {
            header('location:/admin/guest/games');
        }
    } else {
        header('location:/admin/guest/games');
    }
} else {
    header('location:/admin/guest/games');
}

if (isset($_POST['tombol'])) {
    
    if (isset($_POST['name']) AND isset($_POST['product']) AND isset($_POST['sistem_id']) AND isset($_POST['validate_status']) AND isset($_POST['keterangan'])) {
        $name = $_POST['name'];
        $sub_name = $_POST['sub_name'];
        $category = $_POST['category'];
        $product = $_POST['product'];
        $sistem_id = $_POST['sistem_id'];
        $validate_status = $_POST['validate_status'];
        $validate_code = $_POST['validate_code'];
        $urutan = $_POST['urutan'];
        $keterangan = $_POST['keterangan'];
        
        if (empty($name) OR empty($product) OR empty($sistem_id) OR empty($validate_status) OR empty($urutan) OR empty($keterangan)) {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada data yang kosong.'];
        } else {
            
            $nama_file = $fetch_games['img'];
            
            if (isset($_FILES['gambar'])) {
                if ($_FILES['gambar']['error'] !== 4) {
                    $format_file = end(explode('.', strtolower($_FILES['gambar']['name'])));
                
                    if (in_array($format_file, ['jpg', 'jpeg', 'png'])) {
                        
                        unlink('../../../assets/games/' . $nama_file);
                        
                        $nama_file = uniqid() . '.' . $format_file;
                        
                        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../../assets/games/' . $nama_file);
                    } else {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'Format gambar tidak sesuai.'];
                        exit(header("Location: ".base_url('/admin/guest/games')));
                    }
                }
            }
            
            $petunjuk = $fetch_games['petunjuk'];
            
            if (isset($_FILES['petunjuk'])) {
                if ($_FILES['petunjuk']['error'] !== 4) {
                    
                    $format_file = end(explode('.', strtolower($_FILES['petunjuk']['name'])));
                    
                    if (in_array($format_file, ['jpg', 'jpeg', 'png'])) {
                        
                        $petunjuk = uniqid() . '.' . $format_file;
                        
                        move_uploaded_file($_FILES['petunjuk']['tmp_name'], '../../../assets/images/' . $petunjuk);
                        
                        $petunjuk = base_url() . 'assets/images/' . $petunjuk;
                    } else {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'Format petunjuk tidak sesuai.'];
                        exit(header("Location: ".base_url('/admin/guest/games')));
                    }
                }
            }
            
            if ($validate_status == 'Y') {
                if (empty($validate_code)) {
                    $_SESSION['alert'] = ['danger', 'Failed!', 'Kode validasi ID games tidak boleh kosong.'];
                    exit(header("Location: ".base_url('/admin/guest/games')));
                } else {
                    $validate_id = $validate_code;
                }
            } else {
                $validate_id = 'Tydacks';
            }
            
            mysqli_query($db, "UPDATE games_guest SET name = '$name', sub_name = '$sub_name', category = '$category', product = '$product', sistem_id = '$sistem_id', validate_id = '$validate_id', img = '$nama_file', urutan = '$urutan', keterangan = '$keterangan', petunjuk = '$petunjuk' WHERE id = '$id'");
            
            $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di simpan.'];
        	exit(header("Location: ".base_url('/admin/guest/games')));
            
        }
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada data yang kosong.'];
    }
}

include_once '../../../layouts/header_admin.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Game</h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Game</label>
                        <input type="text" class="form-control" autocomplete="off" name="name" value="<?= $fetch_games['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Sub Name</label>
                        <input type="text" class="form-control" autocomplete="off" name="sub_name" value="<?= $fetch_games['sub_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="category">
                            <?php
                            $query_games_category = mysqli_query($db, "SELECT * FROM games_kategori ORDER BY kategori ASC");
                            while($fetch_games_category = mysqli_fetch_assoc($query_games_category)): ?>
                            <option value="<?= $fetch_games_category['kategori']; ?>" <?= $fetch_games_category['kategori'] == $fetch_games['category'] ? 'selected' : ''; ?>><?= $fetch_games_category['kategori']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label><br>
                        <div class="mb-1">
                            <img src="/assets/games/<?= $fetch_games['img']; ?>" width="100">
                        </div>
                        <div class="custom-file">
                            <input type="file" accept=".jpg, .jpeg, .png" class="custom-file-input" id="customFile" name="gambar">
                            <label class="custom-file-label" for="customFile"><?= $fetch_games['img']; ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Produk</label>
                        <select class="form-control" name="product">
                            <?php
                            $query_product_games = mysqli_query($db, "SELECT DISTINCT operator FROM layanan_pulsa WHERE tipe = 'VGAME' ORDER BY tipe ASC");
                            while($fetch_product_games = mysqli_fetch_assoc($query_product_games)): ?>
                            <option value="<?= $fetch_product_games['operator']; ?>" <?= $fetch_games['product'] == $fetch_product_games['operator'] ? 'selected' : ''; ?>><?= $fetch_product_games['operator']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sistem ID</label>
                        <select class="form-control" name="sistem_id">
                            <option value="">Pilih salah satu</option>
                            <option value="A" <?= $fetch_games['sistem_id'] == 'A' ? 'selected' : ''; ?>>1 Target</option>
                            <option value="AA" <?= $fetch_games['sistem_id'] == 'AA' ? 'selected' : ''; ?>>2 Target (User ID / Zone ID)</option>
                            <option value="AAA" <?= $fetch_games['sistem_id'] == 'AAA' ? 'selected' : ''; ?>>2 Target (User ID / Server)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Validate ID</label>
                        <select class="form-control" name="validate_status" onchange="select_validate(this.value);">
                            <option value="Y" <?= $fetch_games['validate_id'] !== 'Tydacks' ? 'selected' : ''; ?>>Ya</option>
                            <option value="N" <?= $fetch_games['validate_id'] == 'Tydacks' ? 'selected' : ''; ?>>Tidak</option>
                        </select>
                        <div id="input-virdipay" class="<?= $fetch_games['validate_id'] == 'Tydacks' ? 'd-none' : ''; ?>">
                            <input type="text" name="validate_code" class="form-control mt-1" placeholder="Kode Games" autocomplete="off" value="<?= $fetch_games['validate_id']; ?>">
                            <small>Cek kode games <a href="https://prnt.sc/7aMwdGi09FI4" target="_blank">disini</a></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Urutan</label>
                        <input type="number" class="form-control" name="urutan" autocomplete="off" value="<?= $fetch_games['urutan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan"><?= $fetch_games['keterangan']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Petunjuk</label>
                        <div class="mb-1">
                            <img src="<?= $fetch_games['petunjuk']; ?>" width="100">
                        </div>
                        <div class="custom-file">
                            <input type="file" accept=".jpg, .jpeg, .png" class="custom-file-input" id="customFile" name="petunjuk">
                            <label class="custom-file-label" for="customFile"><?= $fetch_games['petunjuk']; ?></label>
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
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('keterangan', {
        height: 400,
    });
</script>
<script>
    function modal_tambah() {
        $("#exampleModal").modal('show');
    }
    function select_validate(status) {
        if (status == 'N') {
            $("#input-virdipay").addClass('d-none');
        } else {
            $("#input-virdipay").removeClass('d-none');
        }
    }
</script>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>