<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}

if (isset($_GET['hapus'])) {
    $hapus = $_GET['hapus'];
    
    mysqli_query($db, "DELETE FROM metode_guest WHERE id = '$hapus'");
    
    $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di hapus.'];
    exit(header("Location: ".base_url('/admin/guest/metode.php')));
}

if (isset($_POST['tombol'])) {
    if (isset($_POST['tipe']) AND isset($_POST['metode']) AND isset($_POST['sistem'])) {
        
        $tipe = $_POST['tipe'];
        $metode = $_POST['metode'];
        $sistem = $_POST['sistem'];
        $rek = $_POST['rek'];
        $ket = $_POST['ket'];
        $sub_ket = $_POST['sub_ket'];
        
        if (empty($tipe) OR empty($metode) OR empty($sistem)) {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada data yang kosong.'];
        } else {
            
            if (isset($_FILES['img'])) {
                if ($_FILES['img']['error'] == 4) {
                    $_SESSION['alert'] = ['danger', 'Failed!', 'Gambar metode tidak boleh kosong.'];
                    exit(header("Location: ".base_url('/admin/guest/metode.php')));
                } else {
                    $format_file = end(explode('.', strtolower($_FILES['img']['name'])));
                    
                    if (in_array($format_file, ['jpg', 'jpeg', 'png'])) {
                        $nama_file = uniqid() . '.' . $format_file;
                        
                        move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/metode/' . $nama_file);
                    } else {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'Format gambar tidak sesuai.'];
                        exit(header("Location: ".base_url('/admin/guest/metode.php')));
                    }
                    
                    if ($sistem !== "Manual") {
                        if (isset($_POST['kode'])) {
                            
                            $kode = $_POST['kode'];
                            
                            if (empty($kode)) {
                                $_SESSION['alert'] = ['danger', 'Failed!', 'Kode metode tidak boleh kosong.'];
                                exit(header("Location: ".base_url('/admin/guest/metode.php')));
                            }
                        } else {
                            $_SESSION['alert'] = ['danger', 'Failed!', 'Kode metode tidak boleh kosong.'];
                            exit(header("Location: ".base_url('/admin/guest/metode.php')));
                        }
                    } else {
                        $kode = '';
                    }
                    
                    mysqli_query($db, "INSERT INTO metode_guest VALUES ('','$tipe','$metode','$sistem','$kode','$nama_file','$rek','$ket','$sub_ket')");
                    
                    $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di tambahkan.'];
                	exit(header("Location: ".base_url('/admin/guest/metode.php')));
                }
            } else {
                $_SESSION['alert'] = ['danger', 'Failed!', 'Gambar metode tidak boleh kosong.'];
                exit(header("Location: ".base_url('/admin/guest/metode.php')));
            }
        }
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada data yang kosong.'];
    }
}

if (isset($_POST['edit'])) {
    if (isset($_POST['tipe']) AND isset($_POST['metode']) AND isset($_POST['sistem'])) {
        
        $id = $_POST['id'];
        $tipe = $_POST['tipe'];
        $metode = $_POST['metode'];
        $sistem = $_POST['sistem'];
        $rek = $_POST['rek'];
        $ket = $_POST['ket'];
        $sub_ket = $_POST['sub_ket'];
        
        if (empty($tipe) OR empty($metode) OR empty($sistem)) {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada data yang kosong.'];
        } else {
            
            if ($sistem !== "Manual") {
                if (isset($_POST['kode'])) {
                    
                    $kode = $_POST['kode'];
                    
                    if (empty($kode)) {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'Kode metode tidak boleh kosong.'];
                        exit(header("Location: ".base_url('/admin/guest/metode.php')));
                    }
                } else {
                    $_SESSION['alert'] = ['danger', 'Failed!', 'Kode metode tidak boleh kosong.'];
                    exit(header("Location: ".base_url('/admin/guest/metode.php')));
                }
            } else {
                $kode = '';
            }
            
            mysqli_query($db, "UPDATE metode_guest SET tipe = '$tipe', metode = '$metode', kode = '$kode', sistem = '$sistem', rek = '$rek', ket = '$ket', sub_ket = '$sub_ket' WHERE id = '$id'");
            
            if (isset($_FILES['img'])) {
                
                if ($_FILES['img']['error'] !== 4) {
                    
                    $format_file = end(explode('.', strtolower($_FILES['img']['name'])));
                    
                    if (in_array($format_file, ['jpg', 'jpeg', 'png'])) {
                        
                        $nama_file = uniqid() . '.' . $format_file;
                        
                        move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/metode/' . $nama_file);
                        
                        mysqli_query($db, "UPDATE metode_guest SET img = '$nama_file' WHERE id = '$id'");
                    }
                }
            }
            
            $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di simpan.'];
            exit(header("Location: ".base_url('/admin/guest/metode.php')));
        }
    }
}

include_once '../../layouts/header_admin.php'; ?>
<div class="row justify-content-center">
    <div class="col-md-8 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Metode Pembayaran</h4>
            </div>
            <div class="card-body card-dashboard">
                <div class="mb-2">
                    <button class="btn btn-outline-primary" type="button" onclick="modal_tambah();">Tambah Metode</button>
                </div>
                <div class="table-responsive">
                    <table class="table border">
                        <tr>
                            <th>Gambar</th>
                            <th>Metode</th>
                            <th>Create By</th>
                            <th>Tipe</th>
                            <th>Sistem</th>
                            <th width="10">Action</th>
                        </tr>
                        <?php
                        $query_metode_guest = mysqli_query($db, "SELECT * FROM metode_guest ORDER BY id DESC");
                        while($fetch_metode_guest = mysqli_fetch_assoc($query_metode_guest)) :
                        ?>
                        <tr>
                            <td><img src="/assets/metode/<?= $fetch_metode_guest['img']; ?>" width="50"></td>
                            <td><?= $fetch_metode_guest['metode']; ?></td>
                            <td><code>MyPulsaa</code></td>
                            <td><?= $fetch_metode_guest['tipe']; ?></td>
                            <td><b><?= $fetch_metode_guest['sistem']; ?></b></td>
                            <td width="10" style="white-space: nowrap;">
                                <button onclick="edit_metode('<?= $fetch_metode_guest['id']; ?>');" class="btn btn-relief-primary btn-sm">Edit</button>
                                <a href="/admin/guest/metode.php?hapus=<?= $fetch_metode_guest['id']; ?>" class="btn btn-relief-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if(mysqli_num_rows($query_metode_guest) == 0): ?>
                        <tr>
                            <td colspan="5" align="center">Tidak ada data</td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Metode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tipe</label>
                        <select class="form-control" name="tipe">
                            <option value="">Pilih salah satu</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="Virtual Account">Virtual Account</option>
                            <option value="Convenience Store">Convenience Store</option>
                            <option value="E-Wallet">E-Wallet</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Metode</label>
                        <input type="text" class="form-control" autocomplete="off" name="metode">
                    </div>
                    <div class="form-group">
                        <label>Gambar</label><br>
                        <div class="custom-file">
                            <input type="file" accept=".jpg, .jpeg, .png" class="custom-file-input" id="customFile" name="img">
                            <label class="custom-file-label" for="customFile"><?= $fetch_games['img']; ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sistem</label>
                        <select class="form-control" name="sistem" onchange="select_sistem(this.value);">
                            <option value="Manual">Manual</option>
                            <option value="Mutasi">Mutasi</option>
                            <option value="Tripay">Tripay</option>
                        </select>
                        <input type="text" class="form-control mt-1 d-none" id="input-kode" name="kode" placeholder="Kode Metode" autocomplete="off">
                        <input type="text" class="form-control mt-1" id="input-rek" name="rek" placeholder="Rekening Tujuan & Atas Nama" autocomplete="off">
                        <small>Jika menggunakan provider <a href="https://tripay.co.id/developer?tab=channels" target="_blank">Tripay</a> pada kolom ini diisi kode metode</small>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" autocomplete="off" name="ket">
                    </div>
                    <div class="form-group">
                        <label>Sub Keterangan</label>
                        <input type="text" class="form-control" autocomplete="off" name="sub_ket">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-relief-primary" name="tombol">Tambah Metode</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Metode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body" id="result-edit-metode">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-relief-primary" name="edit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once '../../layouts/footer.php'; ?>
<script>

    function modal_tambah() {
        $("#modal-tambah").modal('show');
    }
    
    function select_sistem(sistem, edit = null) {
        
        if (edit) {
            if (sistem == 'Manual') {
                $("#input-kode-edit").addClass('d-none');
                $("#input-rek-edit").removeClass('d-none');
            } else {
                $("#input-kode-edit").removeClass('d-none');
                $("#input-rek-edit").addClass('d-none');
            }
        } else {
            if (sistem == 'Manual') {
                $("#input-kode").addClass('d-none');
                $("#input-rek").removeClass('d-none');
            } else {
                $("#input-kode").removeClass('d-none');
                $("#input-rek").addClass('d-none');
            }
        }
    }
    
    function edit_metode(id) {
        $.ajax({
            url: '<?= base_url(); ?>/admin/guest/ajax/edit-metode.php?edit=' + id,
            success: function(result) {
                $("#result-edit-metode").html(result);
                
                $("#modal-edit").modal('show');
            }
        });
    }
    
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>