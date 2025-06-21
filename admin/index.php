<?php
session_start();
require_once '../mainconfig.php';
function currency($value) { return number_format($value, 0, ".", "."); }
function rdate($f,$x = '-0 days') { return date($f, strtotime($x, strtotime(date('Y-m-d H:i:s')))); }

load('middleware', 'user');
if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url('/id'));
    
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
            
}

$_SESSION['alert'] = ['success', 'Response: Berhasil!', 'Message: Selamat Datang, '.e($data_user['username']).'.'];

$total_data_us = mysqli_num_rows($db->query("SELECT * FROM users"));
$total_data_trx = mysqli_num_rows($db->query("SELECT * FROM pembelian_pulsa WHERE status = 'Success'"));

$check_data = mysqli_query($db, "SELECT SUM(Saldo) AS total FROM users WHERE level != 'Admin'");
$total_saldo_us = mysqli_fetch_assoc($check_data);

$check_data_trx = mysqli_query($db, "SELECT SUM(harga) AS total FROM pembelian_pulsa WHERE status = 'Success'");
$total_trx_shop = mysqli_fetch_assoc($check_data_trx);
        
// MENAMPILKAN DOUGNUT
$qD = "SELECT device FROM agent";
$sD = $db->query($qD)->num_rows;

$qD2 = "SELECT browser FROM agent";
$sD2 = $db->query($qD)->num_rows;

$data_mobile = mysqli_num_rows($db->query("SELECT * FROM agent WHERE device = 'Mobile'"));
$data_desktop = mysqli_num_rows($db->query("SELECT * FROM agent WHERE device = 'Desktop'"));
$data_tablet = mysqli_num_rows($db->query("SELECT * FROM agent WHERE device = 'Tablet'"));
$data_unknown = mysqli_num_rows($db->query("SELECT * FROM agent WHERE device NOT IN ('Mobile','Desktop','Tablet')"));
// END TO DATA

// MENAMPILKAN PROGRESSBAR
$data_chrome = mysqli_num_rows($db->query("SELECT * FROM agent WHERE browser = 'Chrome'"));
$data_unknown_prog = mysqli_num_rows($db->query("SELECT * FROM agent WHERE browser NOT IN ('Chrome')"));
// END TO DATA

$revenue_this_month = $db->query("SELECT SUM(profit) AS x FROM pembelian_pulsa WHERE status = 'Success' AND MONTH(tanggal) = '".date('m')."' AND YEAR(tanggal) = '".date('Y')."'")->fetch_assoc()['x']
                 
                    + $db->query("SELECT SUM(profit) AS x FROM pembelian_sosmed WHERE status = 'Success' AND MONTH(tanggal) = '".date('m')."' AND YEAR(tanggal) = '".date('Y')."'")->fetch_assoc()['x'];
                    
$revenue_last_month = $db->query("SELECT SUM(profit) AS x FROM pembelian_pulsa WHERE status = 'Success' AND MONTH(tanggal) = '".rdate('m','-1 month')."' AND YEAR(tanggal) = '".rdate('Y','-1 month')."'")->fetch_assoc()['x']
                    + $db->query("SELECT SUM(profit) AS x FROM pembelian_sosmed WHERE status IN ('Success') AND MONTH(tanggal) = '".rdate('m','-1 month')."' AND YEAR(tanggal) = '".rdate('Y','-1 month')."'")->fetch_assoc()['x'];
                    
$total_price_ppob = $db->query("SELECT SUM(harga) AS x FROM pembelian_pulsa WHERE status = 'Success'")->fetch_assoc()['x'];
$total_price_socmed = $db->query("SELECT SUM(harga) AS x FROM pembelian_sosmed WHERE status = 'Success'")->fetch_assoc()['x'];

include_once '../layouts/header_admin.php'; ?>
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

        
            <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Browser Statistics</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                                        <div class="d-flex justify-content-between mb-25">
                        <div class="browser-info">
                            <p class="mb-25">Chrome</p>
                        </div>
                        <div class="stastics-info text-right">
                            <span><?= round(($data_chrome/$sD2)*100,2); ?>%</span>
                        </div>
                    </div>
                    <div class="progress progress-bar-primary mb-2">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?= round(($data_chrome/$sD2)*100,2); ?>" aria-valuemin="<?= round(($data_chrome/$sD2)*100,2); ?>" aria-valuemax="100" style="width:<?= round(($data_chrome/$sD2)*100,2); ?>%"></div>
                    </div>
                                        <div class="d-flex justify-content-between mb-25">
                        <div class="browser-info">
                            <p class="mb-25">Unknown</p>
                        </div>
                        <div class="stastics-info text-right">
                            <span><?= round(($data_unknown_prog/$sD)*100, 2); ?>%</span>
                        </div>
                    </div>
                    <div class="progress progress-bar-primary mb-2">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?= round(($data_unknown_prog/$sD)*100, 2); ?>" aria-valuemin="<?= round(($data_unknown_prog/$sD)*100, 2); ?>" aria-valuemax="100" style="width:<?= round(($data_unknown_prog/$sD)*100, 2); ?>%"></div>
                                           </div>
                                      </div>
                                 </div>
                            </div>
                       </div>
                  </div>
</div>

<?php include_once '../layouts/footer.php'; ?>
<script type="text/javascript">
$(window).on("load", function () {
    new ApexCharts(document.querySelector("#session-by-device"), {
        chart: { type: "donut", height: 315, toolbar: { show: !1 } },
        dataLabels: { enabled: !1 },
        series: [
            <?= round(($data_desktop/$sD)*100, 2); ?>,
            <?= round(($data_mobile/$sD)*100, 2); ?>,
            <?= round(($data_tablet/$sD)*100, 2); ?>,
            <?= round(($data_unknown_prog/$sD)*100, 2); ?>       
             ],
        legend: { show: !1 },
        comparedResult: [2, -3, 8],
        labels: ["Desktop", "Mobile", "Tablet", "Unknown"],
        stroke: { width: 0 },
        colors: ["#7367F0", "#FF9F43", "#EA5455", "#28313B"],
        fill: { type: "gradient", gradient: { gradientToColors: ["#9c8cfc", "#FFC085", "#f29292", "#485461"] } },
    }).render();
   
    new ApexCharts(document.querySelector("#users-chart"), {
        chart: { height: 100, type: "area", toolbar: { show: !1 }, sparkline: { enabled: !0 }, grid: { show: !1, padding: { left: 0, right: 0 } } },
        colors: ["#28C76F"],
        dataLabels: { enabled: !1 },
        stroke: { curve: "smooth", width: 2.5 },
        fill: { type: "gradient", gradient: { shadeIntensity: 0.9, opacityFrom: 0.7, opacityTo: 0.5, stops: [0, 80, 100] } },
        series: [{ name: "Active Users", data: [
            <?php
            for($i = 6; $i >= 0; $i--) {
                $source_date = rdate('Y-m-d',"-$i days");
                print $db->query("SELECT id FROM users WHERE status = 'active' AND register_at LIKE '$source_date%'")->num_rows.',';
            }
            ?>
        ] }],
        xaxis: { labels: { show: !1 }, axisBorder: { show: !1 } },
        yaxis: [{ y: 0, offsetX: 0, offsetY: 0, padding: { left: 0, right: 0 } }],
        tooltip: { x: { show: !1 } },
    }).render();
    
    new ApexCharts(document.querySelector("#balance-chart"), {
        chart: { height: 100, type: "area", toolbar: { show: !1 }, sparkline: { enabled: !0 }, grid: { show: !1, padding: { left: 0, right: 0 } } },
        colors: ["#7367F0"],
        dataLabels: { enabled: !1 },
        stroke: { curve: "smooth", width: 2.5 },
        fill: { type: "gradient", gradient: { shadeIntensity: 0.9, opacityFrom: 0.7, opacityTo: 0.5, stops: [0, 80, 100] } },
        series: [{ name: "Total Balance", data: [
            0,0,0,0,0,0,0,        ] }],
        xaxis: { labels: { show: !1 }, axisBorder: { show: !1 } },
        yaxis: [{ y: 0, offsetX: 0, offsetY: 0, padding: { left: 0, right: 0 } }],
        tooltip: { x: { show: !1 } },
    }).render();
    
    new ApexCharts(document.querySelector("#transaction-chart"), {
        chart: { height: 100, type: "area", toolbar: { show: !1 }, sparkline: { enabled: !0 }, grid: { show: !1, padding: { left: 0, right: 0 } } },
        colors: ["#EA5455"],
        dataLabels: { enabled: !1 },
        stroke: { curve: "smooth", width: 2.5 },
        fill: { type: "gradient", gradient: { shadeIntensity: 0.9, opacityFrom: 0.7, opacityTo: 0.5, stops: [0, 80, 100] } },
        series: [{ name: "Transaction Success", data: [
            <?php
            for($i = 6; $i >= 0; $i--) {
                $source_date = rdate('Y-m-d',"-$i days");
                $count_ppob = $db->query("SELECT id FROM pembelian_pulsa WHERE status = 'Success' AND tanggal LIKE '$source_date%'")->num_rows;
                $count_socmed = $db->query("SELECT id FROM pembelian_sosmed WHERE status = 'Success' AND tanggal LIKE '$source_date%'")->num_rows;
                print ($count_ppob+$count_socmed).',';
            }
            ?>
        ] }],
        xaxis: { labels: { show: !1 }, axisBorder: { show: !1 } },
        yaxis: [{ y: 0, offsetX: 0, offsetY: 0, padding: { left: 0, right: 0 } }],
        tooltip: { x: { show: !1 } },
    }).render();
    
    new ApexCharts(document.querySelector("#shopping-chart"), {
        chart: { height: 100, type: "area", toolbar: { show: !1 }, sparkline: { enabled: !0 }, grid: { show: !1, padding: { left: 0, right: 0 } } },
        colors: ["#FF9F43"],
        dataLabels: { enabled: !1 },
        stroke: { curve: "smooth", width: 2.5 },
        fill: { type: "gradient", gradient: { shadeIntensity: 0.9, opacityFrom: 0.7, opacityTo: 0.5, stops: [0, 80, 100] } },
        series: [{ name: "Shopping Total", data: [
            <?php
            for($i = 6; $i >= 0; $i--) {
                $source_date = rdate('Y-m-d',"-$i days");
                $count_ppob = $db->query("SELECT SUM(harga) AS x FROM pembelian_pulsa WHERE status = 'Success' AND tanggal LIKE '$source_date%'")->fetch_assoc()['x'];
                $count_socmed = $db->query("SELECT SUM(harga) AS x FROM pembelian_sosmed WHERE status = 'Success' AND tanggal LIKE '$source_date%'")->fetch_assoc()['x'];
                print ($count_ppob+$count_socmed).',';
            }
            ?>
        ] }],
        xaxis: { labels: { show: !1 }, axisBorder: { show: !1 } },
        yaxis: [{ y: 0, offsetX: 0, offsetY: 0, padding: { left: 0, right: 0 } }],
        tooltip: { x: { show: !1 } },
    }).render();
    
    new ApexCharts(document.querySelector("#revenue-chart"), {
        chart: { height: 270, toolbar: { show: !1 }, type: "line" },
        stroke: { curve: "smooth", dashArray: [0, 8], width: [4, 2] },
        grid: { borderColor: "#e7e7e7" },
        legend: { show: !1 },
        colors: ["#f29292", "#b9c3cd"],
        fill: { type: "gradient", gradient: { shade: "dark", inverseColors: !1, gradientToColors: ["#7367F0", "#b9c3cd"], shadeIntensity: 1, type: "horizontal", opacityFrom: 1, opacityTo: 1, stops: [0, 100, 100, 100] } },
        markers: { size: 0, hover: { size: 5 } },
        xaxis: { labels: { style: { colors: "#b9c3cd" } }, axisTicks: { show: !1 }, categories: [<?php
            for($i = 7; $i >= 0; $i--) {
                $source_date = rdate('d/m',"-$i days");
                print "\"$source_date\",";
            }
        ?>], axisBorder: { show: !1 }, tickPlacement: "on" },
        yaxis: {
            tickAmount: 5,
            labels: {
                style: { color: "#b9c3cd" },
                formatter: function (e) {
                    return 999 < e ? (e / 1e3).toFixed(1) + "00" : e;
                },
            },
        },
        tooltip: { x: { show: !1 } },
        series: [
            { name: "Bulan Ini", data: [<?php
                for($i = 7; $i >= 0; $i--) {
                    $source_date = rdate('Y-m-d',"-$i days");
                    $this_month = $db->query("SELECT SUM(profit) AS x FROM pembelian_pulsa WHERE status = 'Success' AND tanggal LIKE '$source_date%'")->fetch_assoc()['x']
                                        + $db->query("SELECT SUM(profit) AS x FROM pembelian_sosmed WHERE status = 'Success' AND tanggal LIKE '$source_date%'")->fetch_assoc()['x'];
                    print "$this_month,";
                }
            ?>] },
            { name: "Bulan Lalu", data: [<?php
                for($i = 7; $i >= 0; $i--) {
                    $source_date = rdate('Y-m-d',"-$i days, -1 month");
                    $last_month = $db->query("SELECT SUM(profit) AS x FROM pembelian_pulsa WHERE status = 'Success' AND tanggal LIKE '$source_date%'")->fetch_assoc()['x']
                                        + $db->query("SELECT SUM(profit) AS x FROM pembelian_sosmed WHERE status = 'Success' AND tanggal LIKE '$source_date%'")->fetch_assoc()['x'];
                    print "$last_month,";
                }
            ?>] },
        ],
    }).render();
});
</script>