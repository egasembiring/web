<?php
require_once '../mainconfig.php';

function status($s) {
    if ($s === "Success") {
        return '<div class="badge badge-glow badge-success">Success</div>';
    } else if ($s === "Pending") {
        return '<div class="badge badge-glow badge-warning"><i class="mdi mdi-autorenew mdi-spin"></i> Pending</div>';
    } else if ($s === "Error") {
        return '<div class="badge badge-glow badge-danger">Error</div>';
    } else {
        return '<div class="badge badge-glow badge-info"><i class="mdi mdi-cube-send"></i> Processing</div>';
    }
}

function refund($s) {
    if ($s === "ya") {
        return '<i class="far fa-check-circle text-success"></i>';
    } else {
        return '<i class="far fa-times-circle text-danger"></i>';
    }
}

function place($s) {
    if ($s === "Website") {
        return '<i class="fas fa-globe"></i> Website';
    } else {
        return '<i class="fas fa-rss"></i> API';
    }
}

$id = $_GET['id'];
if(!isset($id))
    die('No direct script access allowed!');
$query = mysqli_query($db, "SELECT * FROM pembelian_pulsa WHERE id = '$id'");
$q = mysqli_fetch_assoc($query); 

$start  = date_create($q['tanggal']);
$update = date_create($q['tanggal_at']); // waktu sekarang
$diff  = date_diff($start, $update );
?>

<div class="row">
          <div class="col-md-12">     
          <div class="table-responsive">
          <table class="table table-bordered mb-0" style="border:1px solid #dee2e6;">
         
          <tr>
          <th class="table-detail">ID</th>
          <td class="table-detail"><div class=""><code>#<?php echo $q['oid']; ?></code></div></td>
          </tr>
          
          <tr>
          <th class="table-detail">Layanan</th>
          <td class="table-detail"><div class=""><?php echo $q['layanan']; ?></div></td>
          </tr>
          
          <tr>
          <th class="table-detail">Target</th>
          <td class="table-detail"><div class=""><?php echo $q['target']; ?></div></td>
          </tr>
          
          <tr>
          <th class="table-detail">Catatan</th>
          <td class="table-detail"><div class=""><?php echo $q['keterangan']; ?></div></td>
          </tr>
          
          <tr>
          <th class="table-detail">Harga</th>
          <td class="table-detail"><div class="">Rp <?php echo number_format($q['harga'],0,',','.'); ?></div></td>
          </tr>
          
          <tr>
          <th class="table-detail">Status</th>
          <td class="table-detail"><div class=""><?php echo status($q['status']); ?></div></td>
          </tr>
          
          <tr>
          <th class="table-detail">Place From</th>
          <td class="table-detail"><div class=""><?php echo place($q['place_from']); ?></div></td>
          </tr>
          
          <tr>
          <th class="table-detail">Tanggal</th>
          <td class="table-detail"><div class=""><?php echo format_date('id',$q['tanggal']); ?></div></td>
          </tr>
          
          <tr>
          <th class="table-detail">Proses</th>
          <td class="table-detail"><div class=""><?php if ($q['status'] == 'Success') { ?> <?php if ($diff->d == "0") { ?> <?php } else { ?> <?php echo $diff->d . ' Hari,'; ?> <?php } ?> <?php echo $diff->h . ' Jam, '; ?> <?php echo $diff->i . ' Menit, '; ?> <?php echo $diff->s . ' Detik.'; ?><?php } else { ?> - <?php } ?></div></td>
          </tr>
          
          <tr>
          <th class="table-detail">Refund</th>
          <td class="table-detail"><div class=""><?php echo refund($q['refund']); ?></div></td>
          </tr>
          
          </table>
          </div>                                                         
          </div>
          </div>       