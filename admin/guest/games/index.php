<?php
session_start();

function slug($text, string $divider = '-') {
    
    $text = preg_replace('/[0-9]+/', '', $text);
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, $divider);
    $text = preg_replace('~-+~', $divider, $text);
    $text = strtolower($text);
    
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

require_once '../../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}

if (isset($_GET['action'])) {
    
    if ($_GET['action'] === 'hapus') {
        if (isset($_GET['id'])) {
            $id = addslashes(trim(htmlspecialchars($_GET['id'])));
            
            $query_games = mysqli_query($db, "SELECT * FROM games_guest WHERE id = '$id'");
            $fetch_games = mysqli_fetch_assoc($query_games);
            
            unlink('../../../assets/games/' . $fetch_games['img']);
            unlink('../../../guest/games/' . $fetch_games['slug'] . '.php');
            
            mysqli_query($db, "DELETE FROM games_guest WHERE id = '$id'");
            
            $_SESSION['alert'] = ['success', 'Success!', 'Data games di hapus.'];
            exit(header("Location: ".base_url('/admin/guest/games/')));
        }
    }
}

if (isset($_GET['hapusa'])) {
    $id = addslashes(trim(htmlspecialchars($_GET['hapusa'])));
    
    mysqli_query($db, "DELETE FROM games_kategori WHERE id = '$id'");
    
    $_SESSION['alert'] = ['success', 'Success!', 'Data kategori di hapus.'];
    exit(header("Location: ".base_url('/admin/guest/games/')));
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
        
        if (empty($name) OR empty($product) OR empty($sistem_id) OR empty($validate_status) OR empty($keterangan)) {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada data yang kosong.'];
        } else {
            if (isset($_FILES['gambar'])) {
                if ($_FILES['gambar']['error'] == 4) {
                    $_SESSION['alert'] = ['danger', 'Failed!', 'Gambar games tidak boleh kosong.'];
                    exit(header("Location: ".base_url('/admin/guest/games')));
                } else {
                    $format_file = end(explode('.', strtolower($_FILES['gambar']['name'])));
                    
                    if (in_array($format_file, ['jpg', 'jpeg', 'png'])) {
                        $nama_file = uniqid() . '.' . $format_file;
                        
                        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../../assets/games/' . $nama_file);
                    } else {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'Format gambar tidak sesuai.'];
                        exit(header("Location: ".base_url('/admin/guest/games')));
                    }
                    
                    if (isset($_FILES['petunjuk'])) {
                        $format_petunjuk = end(explode('.', strtolower($_FILES['petunjuk']['name'])));
                        
                        if (in_array($format_petunjuk, ['jpg', 'jpeg', 'png'])) {
                            $name_petunjuk = uniqid() . '.' . $format_petunjuk;
                            
                            move_uploaded_file($_FILES['petunjuk']['tmp_name'], '../../../assets/images/' . $name_petunjuk);
                            
                            $petunjuk = base_url() . '/assets/images/' . $name_petunjuk;
                        } else {
                            $petunjuk = '';
                        }
                    } else {
                        $petunjuk = '';
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
                    
                    $slug = slug($name);
                    
                    if ($slug == 'sistem') {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal menambahkan game.'];
                        exit(header("Location: ".base_url('/admin/guest/games')));
                    } else {
                        mysqli_query($db, "INSERT INTO games_guest VALUES ('','$name','$sub_name','$category','$slug','$nama_file','$product','$sistem_id','$validate_id','$urutan','$keterangan','$petunjuk','On')");
                        
                        $write = '<?php
$slug = "'.$slug.'";
require "sistem.php";
';
$open = fopen('../../../id/games/'.$slug.'.php', 'w');
fwrite($open, $write);
                        
                        $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di tambahkan.'];
                    	exit(header("Location: ".base_url('/admin/guest/games')));
                    }
                }
            } else {
                $_SESSION['alert'] = ['danger', 'Failed!', 'Gambar games tidak boleh kosong.'];
                exit(header("Location: ".base_url('/admin/guest/games')));
            }
            
        }
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada data yang kosong.'];
    }
}

if (isset($_POST['btn_kategori'])) {
    if (isset($_POST['kategori'])) {
        $kategori = $_POST['kategori'];
        $urutan = $_POST['urutan'];
        
        if (!empty($kategori)) {
            $query_kategori = mysqli_query($db, "SELECT * FROM games_kategori WHERE kategori = '$kategori'");
            
            if (mysqli_num_rows($query_kategori) == 0) {
                mysqli_query($db, "INSERT INTO games_kategori VALUES ('','$kategori','$urutan')");
                
                $_SESSION['alert'] = ['success', 'Success!', 'Data kategori di tambahkan.'];
                exit(header("Location: ".base_url('/admin/guest/games')));
            } else {
                $_SESSION['alert'] = ['danger', 'Failed!', 'Kategori sudah digunakan.'];
            }
        } else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Kategori tidak boleh kosong.'];
        }
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Kategori tidak boleh kosong.'];
    }
}

include_once '../../../layouts/header_admin.php'; ?>
<div class="row justify-content-center">
    <div class="col-md-8 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kelola Games</h4>
            </div>
            <div class="card-body card-dashboard">
                <button class="btn btn-outline-primary mb-2" onclick="modal_tambah();">Tambah Games</button>
                <button class="btn btn-outline-info mb-2" onclick="modal_kategori();">Kategori</button>
                <a  class="btn btn-outline-success mb-2" href="/admin/trxgames/layanan">Produk</a>
                <div class="table-responsive">
                    <table class="table border">
                        <tr>
                            <th>No</th>
                            <th style="white-space: nowrap;">Nama Game</th>
                            <th>Kategori</th>
                            <th>Produk</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $no = 1;
                        $query_games = mysqli_query($db, "SELECT * FROM games_guest");
                        while($fetch_games = mysqli_fetch_assoc($query_games)):
                        ?>
                        <tr>
                            <td width="10"><?= $no++; ?></td>
                            <td style="white-space: nowrap;"><?= $fetch_games['name']; ?></td>
                            <td><?= $fetch_games['category']; ?></td>
                            <td><?= $fetch_games['product']; ?></td>
                            <td>
                                <select class="form-control" onchange="ganti_status('<?= $fetch_games['id'] ?>', this.value);">
                                    <option value="On" <?= $fetch_games['status'] == 'On' ? 'selected' : ''; ?>>On</option>
                                    <option value="Off" <?= $fetch_games['status'] == 'Off' ? 'selected' : ''; ?>>Off</option>
                                </select>
                            </td>
                            <td width="10" style="white-space: nowrap;">
                                <a href="/admin/guest/games/edit.php?id=<?= $fetch_games['id']; ?>" class="btn btn-relief-primary btn-sm">Edit</a>
                                <a href="/admin/guest/games/?action=hapus&id=<?= $fetch_games['id']; ?>" class="btn btn-relief-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if (mysqli_num_rows($query_games) == 0): ?>
                        <tr>
                            <td colspan="4" align="center">Tidak ada games</td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Games</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Game</label>
                                <input type="text" class="form-control" autocomplete="off" name="name">
                            </div>
                            <div class="form-group">
                                <label>Sub Name</label>
                                <input type="text" class="form-control" autocomplete="off" name="sub_name">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="category">
                                    <option value="">Pilih salah satu</option>
                                    <?php
                                    $query_games_category = mysqli_query($db, "SELECT * FROM games_kategori ORDER BY kategori ASC");
                                    while($fetch_games_category = mysqli_fetch_assoc($query_games_category)): ?>
                                    <option value="<?= $fetch_games_category['kategori']; ?>"><?= $fetch_games_category['kategori']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <div class="custom-file">
                                    <input type="file" accept=".jpg, .jpeg, .png" class="custom-file-input" id="customFile" name="gambar">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Produk</label>
                                <select class="form-control" name="product">
                                    <option value="">Pilih salah satu</option>
                                    <?php
                                    $query_product_games = mysqli_query($db, "SELECT DISTINCT operator FROM layanan_pulsa WHERE tipe = 'VGAME' ORDER BY tipe ASC");
                                    while($fetch_product_games = mysqli_fetch_assoc($query_product_games)): ?>
                                    <option value="<?= $fetch_product_games['operator']; ?>"><?= $fetch_product_games['operator']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sistem ID</label>
                                <select class="form-control" name="sistem_id">
                                    <option value="">Pilih salah satu</option>
                                    <option value="A">1 Target</option>
                                    <option value="AA">2 Target (User ID / Zone ID)</option>
                                    <option value="AAA">2 Target (User ID / Server)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Validate ID</label>
                                <select class="form-control" name="validate_status" onchange="select_validate(this.value);">
                                    <option value="Y">Ya</option>
                                    <option value="N" selected>Tidak</option>
                                </select>
                                <div id="input-virdipay" class="d-none">
                                    <input type="text" name="validate_code" class="form-control mt-1" placeholder="Kode Games" autocomplete="off">
                                    <small>Cek kode games <a href="https://documenter.getpostman.com/view/21960688/VUjLJRm3" target="_blank">disini</a></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Urutan</label>
                                <input type="number" class="form-control" name="urutan" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Foto Petunjuk</label>
                                <div class="custom-file">
                                    <input type="file" accept=".jpg, .jpeg, .png" class="custom-file-input" id="customFile" name="petunjuk">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-relief-primary" name="tombol">Tambah Games</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategori Games</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Kategori</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tambah</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table-responsive">
                            <table class="table border">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th style="min-width: 100px;">Urutan</th>
                                    <th>Action</th>
                                </tr>
                                <?php 
                                $no = 1;
                                $query_games_kategori = mysqli_query($db, "SELECT * FROM games_kategori");
                                while($fetch_games_kategori = mysqli_fetch_assoc($query_games_kategori)):
                                ?>
                                <tr>
                                    <td width="10"><?= $no++; ?></td>
                                    <td><?= $fetch_games_kategori['kategori']; ?></td>
                                    <td>
                                        <div class="input-group">
                                            <input type="number" id="urutan-kategori-<?= $fetch_games_kategori['id']; ?>" class="form-control" value="<?= $fetch_games_kategori['urutan']; ?>">
                                            <button class="btn btn-relief-primary" onclick="save_urutan('<?= $fetch_games_kategori['id']; ?>');">Ok</button>
                                        </div>
                                    </td>
                                    <td width="10">
                                        <a href="/admin/guest/games/?hapusa=<?= $fetch_games_kategori['id']; ?>" class="btn btn-relief-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                                <?php if (mysqli_num_rows($query_games_kategori) === 0): ?>
                                <tr>
                                    <td align="center" colspan="4">Tidak ada kategori</td>
                                </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Kategori Baru</label>
                                <input type="text" class="form-control" autocomplete="off" name="kategori">
                            </div>
                            <div class="form-group">
                                <label>Urutan</label>
                                <input type="number" class="form-control" name="urutan" autocomplete="off">
                            </div>
                            <div class="text-right">
                                <button class="btn btn-light" type="reset">Batal</button>
                                <button class="btn btn-relief-primary" type="submit" name="btn_kategori">Tambah Kategori</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    function modal_kategori() {
        $("#modal-kategori").modal('show');
    }
    function select_validate(status) {
        if (status == 'N') {
            $("#input-virdipay").addClass('d-none');
        } else {
            $("#input-virdipay").removeClass('d-none');
        }
    }
    function save_urutan(id) {
        
        var urutan = $("#urutan-kategori-" + id).val();
        
        $.ajax({
            url: '<?= base_url(); ?>admin/guest/ajax/save-urutan.php',
            data: 'urutan=' + urutan + '&id=' + id,
            type: 'POST',
            dataType: 'html'
        });
    }
    function ganti_status(id, status) {
        
        $.ajax({
            url: '<?= base_url(); ?>admin/guest/ajax/update-status.php',
            type: 'POST',
            data: 'id=' + id + '&status=' + status + '&table=games_guest',
        });
    }
</script>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>