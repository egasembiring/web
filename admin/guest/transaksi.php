<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}

if (isset($_GET['hapus'])) {
    $hapus = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, $_GET['hapus']))));
    
    mysqli_query($db, "DELETE FROM pembelian_guest WHERE id = '$hapus'");
    
    $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di hapus.'];
    exit(header("Location: ".base_url('/admin/guest/transaksi.php')));
}

if (isset($_POST['tombol'])) {
    
    if (isset($_POST['name']) AND isset($_POST['product']) AND isset($_POST['sistem_id']) AND isset($_POST['validate_status'])) {
        $name = $_POST['name'];
        $sub_name = $_POST['sub_name'];
        $category = $_POST['category'];
        $product = $_POST['product'];
        $sistem_id = $_POST['sistem_id'];
        $validate_status = $_POST['validate_status'];
        $validate_code = $_POST['validate_code'];
        $urutan = $_POST['urutan'];
        
        if (empty($name) OR empty($product) OR empty($sistem_id) OR empty($validate_status) OR empty($urutan)) {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada data yang kosong.'];
        } else {
            
            $nama_file = $fetch_games['img'];
            
            if (isset($_FILES['gambar'])) {
                if ($_FILES['gambar']['error'] !== 4) {
                    $format_file = end(explode('.', strtolower($_FILES['gambar']['name'])));
                
                    if (in_array($format_file, ['jpg', 'jpeg', 'png'])) {
                        
                        unlink('../../assets/games/' . $nama_file);
                        
                        $nama_file = uniqid() . '.' . $format_file;
                        
                        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../assets/games/' . $nama_file);
                    } else {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'Format gambar tidak sesuai.'];
                        exit(header("Location: ".base_url('/admin/games')));
                    }
                }
            }
            
            if ($validate_status == 'Y') {
                if (empty($validate_code)) {
                    $_SESSION['alert'] = ['danger', 'Failed!', 'Kode validasi ID games tidak boleh kosong.'];
                    exit(header("Location: ".base_url('/admin/games')));
                } else {
                    $validate_id = $validate_code;
                }
            } else {
                $validate_id = 'Tydacks';
            }
            
            mysqli_query($db, "UPDATE games SET name = '$name', sub_name = '$sub_name', category = '$category', product = '$product', sistem_id = '$sistem_id', validate_id = '$validate_id', img = '$nama_file', urutan = '$urutan' WHERE id = '$id'");
            
            $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di simpan.'];
        	exit(header("Location: ".base_url('/admin/games')));
            
        }
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada data yang kosong.'];
    }
}

include_once '../../layouts/header_admin.php'; ?>
<div class="row justify-content-center">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Transaksi Games</h4>
            </div>
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table table-hover table-striped border">
                        <tr>
                            <th width="10">No</th>
                            <th>Nomor HP</th>
                            <th>Order ID</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Target</th>
                            <th>Status</th>
                            <th width="10">Action</th>
                        </tr>
                        <?php 
                        $no = 1;
                        $query_pembelian_guest = mysqli_query($db, "SELECT * FROM pembelian_guest ORDER BY id DESC");
                        while($fetch_pembelian_guest = mysqli_fetch_assoc($query_pembelian_guest)): 
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $fetch_pembelian_guest['phone']; ?></td>
                            <td><code><?= $fetch_pembelian_guest['order_id']; ?></code></td>
                            <td><?= $fetch_pembelian_guest['layanan']; ?></td>
                            <td style="white-space: nowrap;">Rp <?= number_format($fetch_pembelian_guest['harga'],0,',','.'); ?></td>
                            <td><b><input type="text" class="form-control" name="target" value="<?= $fetch_pembelian_guest['target']; ?>" disabled></td>
                            <td>
                                <?php
                                if ($fetch_pembelian_guest['status'] == 'Pending') {
                                    $badge_bg = 'warning';
                                } else if ($fetch_pembelian_guest['status'] == 'Success') {
                                    $badge_bg = 'success';
                                } else if ($fetch_pembelian_guest['status'] == 'Processing') {
                                    $badge_bg = 'primary';
                                } else if ($fetch_pembelian_guest['status'] == 'Canceled') {
                                    $badge_bg = 'danger';
                                } else {
                                    $badge_bg = 'secondary';
                                }
                                ?>
                                <span class="badge badge-pill bg-<?= $badge_bg; ?>" style="font-size: 11px;padding: 5px;"><?= $fetch_pembelian_guest['status']; ?></span>
                            </td>
                            <td style="white-space: nowrap;">
                                <a class="btn btn-relief-info btn-sm" href="/admin/guest/transaksi/detail.php?id=<?= $fetch_pembelian_guest['id'] ?>">Detail</a>
                                <a class="btn btn-relief-primary btn-sm" href="/admin/guest/transaksi/edit.php?id=<?= $fetch_pembelian_guest['id'] ?>">Edit</a>
                                <a class="btn btn-relief-danger btn-sm" href="/admin/guest/transaksi.php?hapus=<?= $fetch_pembelian_guest['id']; ?>">Hapus</a>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function salin_all_email() {
        
        var copyText = document.getElementById("all-email");
        
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        
        Swal.fire('Berhasil', 'Email berhasil disalin', 'success');
    }
</script>
<?php include_once '../../layouts/footer.php'; ?>





























