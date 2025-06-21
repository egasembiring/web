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

include_once '../../../layouts/header_admin.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Transaksi</h4>
            </div>
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table border table-striped mb-1">
                        <tr>
                            <th>Username</th>
                            <td align="right"><?= $fetch_pembelian['username']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td align="right"><?= $fetch_pembelian['phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Order ID</th>
                            <td align="right"><?= $fetch_pembelian['order_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Games</th>
                            <td align="right"><?= $fetch_pembelian['games']; ?></td>
                        </tr>
                        <tr>
                            <th>Produk</th>
                            <td align="right"><?= $fetch_pembelian['layanan']; ?></td>
                        </tr>
                        <tr>
                            <th>Metode</th>
                            <td align="right"><?= $fetch_pembelian['metode']; ?></td>
                        </tr>
                        <tr>
                            <th>Rekening</th>
                            <td align="right">
                                <?php if (filter_var($fetch_pembelian['rek'], FILTER_VALIDATE_URL)): ?>
                                <a href="<?= $fetch_pembelian['rek']; ?>" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">Invoice</a>
                                <?php else : ?>
                                <?= $fetch_pembelian['rek']; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Target</th>
                            <td align="right"><b><?= $fetch_pembelian['target']; ?></b></td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td align="right">Rp <?= number_format($fetch_pembelian['harga'],0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td align="right"><?= $fetch_pembelian['status']; ?></td>
                        </tr>
                        <tr>
                            <th>SN</th>
                            <td align="right"><?= $fetch_pembelian['sn']; ?></td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td align="right"><?= $fetch_pembelian['error_msg']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td align="right"><?= $fetch_pembelian['date_create']; ?></td>
                        </tr>
                        <tr>
                            <th>Update</th>
                            <td align="right"><?= $fetch_pembelian['date_update']; ?></td>
                        </tr>
                    </table>
                </div>
                <a href="/admin/guest/transaksi.php" class="btn btn-warning float-left">Kembali</a>
                <?php if ($fetch_pembelian['status'] == 'Pending'): ?>
                <div class="float-right">
                    <a href="/admin/guest/transaksi/proses.php?order_id=<?= $fetch_pembelian['order_id']; ?>" class="btn btn-primary float-left">Proses Pesanan</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php include_once '../../../layouts/footer.php'; ?>