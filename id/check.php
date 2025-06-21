<?php
session_start();

$guest = true;
$invoice = false;

require_once '../mainconfig.php';

if (opt_get('Z3Vlc3Rfc3RhdHVz') == 'Off') {
    require '../404.html';
    die;
}

$order_id = '';

if (isset($_GET['invoice'])) {
    $order_id = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, $_GET['invoice']))));
    
    $query_pembelian_guest = mysqli_query($db, "SELECT * FROM pembelian_guest WHERE order_id = '$order_id'");
    
    if (mysqli_num_rows($query_pembelian_guest) === 1) {
        
        $fetch_pembelian_guest = mysqli_fetch_assoc($query_pembelian_guest);
        
        $invoice = true;
    } else {
        
        $query_pembelian_guest = mysqli_query($db, "SELECT * FROM pembelian_guest_smm WHERE order_id = '$order_id'");
        
        if (mysqli_num_rows($query_pembelian_guest) === 1) {
        
            $fetch_pembelian_guest = mysqli_fetch_assoc($query_pembelian_guest);
            
            $invoice = true;
        } else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Nomor Invoice tidak ditemukan.'];
        }
    }
}
require_once 'fo.php';
require_once '../layouts/header.php';
?>
<style>
	.app-content {
	    margin-left: 0 !important;
	}
	.card-header {
	    border-bottom: 1px solid #edecec !important;
	    margin-bottom: 20px;
	}
</style>
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Check Invoice</h4>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="form-group">
                        <label>Invoice Number :</label>
                        <div class="row">
                            <div class="col-7">
                                <input class="form-control" text="text" placeholder="XSxxxxxx" name="invoice" value="<?= $order_id; ?>" autocomplete="off">
                            </div>
                            <div class="col-5">
                                <button class="btn btn-block btn-relief-primary" type="submit">Check</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if ($invoice === true): ?>
                <div class="card-body border" style="border-radius: 8px;overflow: auto;">
                    <div class="row">
                        <div class="col-7">
                            <input type="text" class="d-none" id="hi-invoice" value="<?= $fetch_pembelian_guest['order_id']; ?>">
                            <h4 class="mb-2 text-primary" onclick="salin_invoice();">
                                #<?= $fetch_pembelian_guest['order_id']; ?>
                                <i class="fa fa-copy"></i>
                            </h4>
                        </div>
                        <div class="col-5 text-right">
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
                            <span class="badge badge-glow badge-pill mb-1 bg-<?= $badge_bg; ?>" style="font-size: 10px;padding: 10px;"><?= $fetch_pembelian_guest['status']; ?></span>
                        </div>
                    </div>
                    <?php if ($fetch_pembelian_guest['status'] == 'Pending'): ?>
                    
                    <?php endif;?>
                    <b>Detail Order : </b><br>
                    <table class="table border mb-2 table-striped mt-1">
                        <tr>
                            <td>Tanggal</td>
                            <td align="right"><?= str_replace(' ', '<br>', $fetch_pembelian_guest['date_create']); ?></td>
                        </tr>
                        <tr>
                            <td>Layanan</td>
                            <td align="right"><?= $fetch_pembelian_guest['layanan']; ?></td>
                        </tr>
                        <tr>
                            <td>User ID</td>
                            <td align="right"><?= $fetch_pembelian_guest['target']; ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td align="right" style="font-weight: 600;color: green;">Rp <?= number_format($fetch_pembelian_guest['harga'],0,',','.'); ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td align="right"><?= $fetch_pembelian_guest['sn']; ?></td>
                        </tr>                    
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td align="right"><b><?= $fetch_pembelian_guest['metode']; ?><b></td>
                        </tr>
                            <?php if (filter_var($fetch_pembelian_guest['rek'], FILTER_VALIDATE_URL)): ?>
                        </table>
                            <p>Tekan Qris Untuk Memperbesar</p>
                                <center><a href="<?= $fetch_pembelian_guest['rek']; ?>"><img style="" src="<?= $fetch_pembelian_guest['rek']; ?>" width="200"></a></center><br>
                        <?php else:?>
					   <tr>
					           <td>Tujuan Pembayaran</td>
					           <td align="right"><?= $fetch_pembelian_guest['rek']; ?>
                            </td>
                        </tr>
                    </table>
                    <?php endif;?>
                    <a href="/id" class="btn btn-relief-primary btn-lg btn-block">Top Up Lagi</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
	</div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function salin_invoice() {
        
        var copyText = document.getElementById("hi-invoice");
        
        copyText.select();
        copyText.setSelectionRange(0, 999999);
        navigator.clipboard.writeText(copyText.value);
        
        Swal.fire('Berhasil', 'Order ID berhasil disalin', 'success');
    }
</script>
<?php require_once '../layouts/javascript.php'; ?>
<?php include_once '../layouts/footer.php'; ?>