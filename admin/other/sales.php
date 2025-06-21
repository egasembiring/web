<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url('/id'));
}

include_once '../../layouts/header_admin.php';
?>

<div class="row">
<div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Games</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Transaksi</th>
                            <th>Dirty</th>
                            <th>Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr> 
                    <td><span class="badge badge-pill badge-primary"><?php echo $CountProfitPulsa; ?>x</span></td>
                    <td><span class="badge badge-pill badge-success"> Rp <?php echo number_format($AllPulsa['total'],0,',','.') ?></span></td>  
                    <td><span class="badge badge-pill badge-warning"> Rp <?php echo number_format($ProfitPulsa['total'],0,',','.'); ?></span></td>                              
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once '../../layouts/footer.php'; ?>
          