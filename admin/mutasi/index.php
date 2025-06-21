<?php 
require '../../mainconfig.php';
session_start();
function rdate($f,$x = '-0 days') { return date($f, strtotime($x, strtotime(date('Y-m-d H:i:s')))); }

load('middleware', 'user');
if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}else{
    

include '../../layouts/header_admin.php';
}
?>
<div class="row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">MUTASI GOPAY</h4>
            </div>
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table table-hover table-striped border">
                        <tr>
                            <th width="10">No</th>
                            <th>Username</th>
                            <th>Saldo</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $qqmutasi = mysqli_query($db, "SELECT * FROM mutasi_gopay ORDER BY id DESC");
                        while($ffmutasi = mysqli_fetch_assoc($qqmutasi)): 
                        ?>
                        <tr>
                            <td><?= $ffmutasi['id']; ?></td>
                            <td><?= $ffmutasi['username'];?></td>
                            <td>Rp. <?= number_format($ffmutasi['saldo'],0,',','.'); ?></td>
                            <td>Rp. <?= $ffmutasi['date']; ?></td>
                            <td><?= $ffmutasi['keterangan'];?></td>
                            <td>
                                <?php
                                if ($ffmutasi['status'] == 'Unread') {
                                    $badge_bg = 'warning';
                                } else if ($ffmutasi['status'] == 'Read') {
                                    $badge_bg = 'success';
                                } else {
                                    $badge_bg = 'secondary';
                                }
                                ?>
                                <span class="badge badge-pill bg-<?= $badge_bg; ?>" style="font-size: 11px;padding: 5px;"><?= $ffmutasi['status']; ?></span>
                        <?php endwhile; ?>
                        <?php if (mysqli_num_rows($qqmutasi) == 0): ?>
                        <tr>
                            <td colspan="7" align="center">Tidak ada data</td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">MUTASI OVO</h4>
            </div>
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table table-hover table-striped border">
                        <tr>
                            <th width="10">No</th>
                            <th>Username</th>
                            <th>Saldo</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $qmutasi = mysqli_query($db, "SELECT * FROM mutasi_ovo ORDER BY id DESC");
                        while($fmutasi = mysqli_fetch_assoc($qmutasi)): 
                        ?>
                        <tr>
                            <td><?= $fmutasi['id']; ?></td>
                            <td><?= $fmutasi['username'];?></td>
                            <td>Rp. <?= number_format($fmutasi['saldo'],0,',','.'); ?></td>
                            <td>Rp. <?= $fmutasi['date']; ?></td>
                            <td><?= $fmutasi['keterangan'];?></td>
                            <td>
                                <?php
                                if ($fmutasi['status'] == 'Unread') {
                                    $badge_bg = 'warning';
                                } else if ($fmutasi['status'] == 'Read') {
                                    $badge_bg = 'success';
                                } else {
                                    $badge_bg = 'secondary';
                                }
                                ?>
                                <span class="badge badge-pill bg-<?= $badge_bg; ?>" style="font-size: 11px;padding: 5px;"><?= $fmutasi['status']; ?></span>
                        <?php endwhile; ?>
                        <?php if (mysqli_num_rows($qmutasi) == 0): ?>
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
<?php include '../../layouts/footer.php'; ?>