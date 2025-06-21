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
        $query_pembelian = mysqli_query($db, "SELECT * FROM pembelian_guest WHERE id = '$id'");
        
        if (mysqli_num_rows($query_pembelian) === 1) {
            $fetch_pembelian = mysqli_fetch_assoc($query_pembelian);
        } else {
            header('location:/admin/guest/transaksi');
        }
    } else {
        header('location:/admin/guest/transaksi');
    }
} else {
    header('location:/admin/guest/transaksi');
}

if (isset($_POST['tombol'])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $order_id = $_POST['order_id'];
    $metode = $_POST['metode'];
    $rek = $_POST['rek'];
    $games = $_POST['games'];
    $layanan = $_POST['layanan'];
    $harga = $_POST['harga'];
    $sn = $_POST['sn'];
    $status = $_POST['status'];
    
    mysqli_query($db, "UPDATE pembelian_guest SET username = '$username', email = '$email', order_id = '$order_id', metode = '$metode', rek = '$rek', games = '$games', layanan = '$layanan', harga = '$harga', sn = '$sn', status = '$status' WHERE id = '$id'");
    
    $_SESSION['alert'] = ['success', 'Success!', 'Data berhasil di simpan.'];
    exit(header("Location: ".base_url('/admin/guest/transaksi.php')));
}

include_once '../../../layouts/header_admin.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Transaksi</h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" autocomplete="off" name="username" value="<?= $fetch_pembelian['username']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" autocomplete="off" name="email" value="<?= $fetch_pembelian['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Order ID</label>
                        <input type="text" class="form-control" autocomplete="off" name="order_id" value="<?= $fetch_pembelian['order_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Metode</label>
                        <input type="text" class="form-control" autocomplete="off" name="metode" value="<?= $fetch_pembelian['metode']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Rekening</label>
                        <input type="text" class="form-control" autocomplete="off" name="rek" value="<?= $fetch_pembelian['rek']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Games</label>
                        <input type="text" class="form-control" autocomplete="off" name="games" value="<?= $fetch_pembelian['games']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Produk</label>
                        <input type="text" class="form-control" autocomplete="off" name="layanan" value="<?= $fetch_pembelian['layanan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Target</label>
                        <input type="text" class="form-control" autocomplete="off" name="target" value="<?= $fetch_pembelian['target']; ?>"disabled>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" autocomplete="off" name="harga" value="<?= $fetch_pembelian['harga']; ?>">
                    </div>
                    <div class="form-group">
                        <label>SN</label>
                        <input type="text" class="form-control" autocomplete="off" name="sn" value="<?= $fetch_pembelian['sn']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="Pending" <?= $fetch_pembelian['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="Processing" <?= $fetch_pembelian['status'] == 'Processing' ? 'selected' : ''; ?>>Processing</option>
                            <option value="Success" <?= $fetch_pembelian['status'] == 'Success' ? 'selected' : ''; ?>>Success</option>
                            <option value="Canceled" <?= $fetch_pembelian['status'] == 'Canceled' ? 'selected' : ''; ?>>Canceled</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" autocomplete="off" name="date_create" value="<?= $fetch_pembelian['date_create']; ?>" disabled>
                    </div>
                    <a href="/admin/guest/transaksi.php" class="btn btn-warning float-left">Kembali</a>
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