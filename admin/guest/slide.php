<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}

if (isset($_GET['hapus'])) {
    $hapus = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, $_GET['hapus']))));
    
    $query_slide = mysqli_query($db, "SELECT * FROM slider WHERE id = '$hapus'");
    
    if (mysqli_num_rows($query_slide) === 1) {
        $fetch_slide = mysqli_fetch_assoc($query_slide);
        
        unlink('../../assets/slide/' . $fetch_slide['img']);
        
        mysqli_query($db, "DELETE FROM slider WHERE id = '$hapus'");
        
        $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di hapus.'];
        exit(header("Location: ".base_url('/admin/guest/slide.php')));
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Data slide tidak ditemukan.'];
    }
}

if (isset($_POST['tombol'])) {
    
    if (isset($_FILES['gambar'])) {
        if ($_FILES['gambar']['error'] !== 4) {
            
            $format_file = end(explode('.', strtolower($_FILES['gambar']['name'])));
        
            if (in_array($format_file, ['jpg', 'jpeg', 'png'])) {
                
                $nama_file = uniqid() . '.' . $format_file;
                
                move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/slide/' . $nama_file);
                
                mysqli_query($db, "INSERT INTO slider VALUES ('','$nama_file','Guest')");
                
                $_SESSION['alert'] = ['success', 'Success!', 'Gambar slide berhasil ditambah.'];
                exit(header("Location: ".base_url('/admin/guest/slide.php')));
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
<div class="row justify-content-center">
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
                        <button class="btn btn-relief-primary" type="submit" name="tombol">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                                <a class="btn btn-relief-danger btn-sm" href="/admin/guest/slide.php?hapus=<?= $fetch_pembelian_guest['id']; ?>">Hapus</a>
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
        </div>
    </div>
</div>
<script>
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<?php include_once '../../layouts/footer.php'; ?>