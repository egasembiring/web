<?php

session_start();
require_once '../mainconfig.php';
load('middleware', 'user'); 
include_once '../layouts/header.php'; 

$pembelian_pulsa = $db->query("SELECT SUM(pembelian_pulsa.harga) AS total_pembelian, count(pembelian_pulsa.id) AS tcount, pembelian_pulsa.user, users.name FROM pembelian_pulsa INNER JOIN users ON pembelian_pulsa.user = users.username WHERE MONTH(pembelian_pulsa.tanggal) = '".date('m')."' AND pembelian_pulsa.status = 'Success' GROUP BY pembelian_pulsa.user ORDER BY total_pembelian DESC LIMIT 5");

$pembelian_sosmed = $db->query("SELECT SUM(pembelian_sosmed.harga) AS total_pembelian, count(pembelian_sosmed.id) AS tcount, pembelian_sosmed.user, users.name FROM pembelian_sosmed INNER JOIN users ON pembelian_sosmed.user = users.username WHERE MONTH(pembelian_sosmed.tanggal) = '".date('m')."' AND pembelian_sosmed.status = 'Success' GROUP BY pembelian_sosmed.user ORDER BY total_pembelian DESC LIMIT 5");
?>

<!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
  <div class="row match-height">
       <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="<?= asset('/logo-baru/decore-left.png') ?>" class="congratulations-img-left" alt="card-img-left">
                        <img src="<?= asset('/logo-baru/decore-right.png') ?>" class="congratulations-img-right" alt="card-img-right">
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">Hallo <?= $data_user['username'] ?>,</h1>
                            <p class="card-text m-auto w-75">
                                Dibawah ini merupakan top pengguna pemesanan tertinggi bulan ini. Terima kasih telah menjadi pelanggan setia kami!
                            </p>
                        </div>
                    </div>
                </div>
            </div>    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="m-t-0 text-uppercase text-center header-title">TOP 5 SOCIAL MEDIA</h5><hr>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered nowrap m-0">
                                    <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
$no = 1;
while($data = mysqli_fetch_array($pembelian_sosmed)){
$total_pembelian = number_format($data['total_pembelian'],0,',','.');
$tcount = number_format($data['tcount'],0,',','.');
?>
                            <tr>
                                        <td><span class="badge badge-primary"><?php echo $no++; ?></span></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td>Rp <?php echo $total_pembelian; ?></td>
                                    </tr>
							<?php } ?>
						</tbody>
                                </table>
                            </div>
                                        </ul>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="m-t-0 text-uppercase text-center header-title">TOP 5 PULSA & PPOB</h5><hr>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered nowrap m-0">
                                     <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
$no = 1;
while($data = mysqli_fetch_array($pembelian_pulsa)){
$total_pembelian = number_format($data['total_pembelian'],0,',','.');
$tcount = number_format($data['tcount'],0,',','.');
?>
                            <tr>
                                        <td><span class="badge badge-primary"><?php echo $no++; ?></span></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td>Rp <?php echo $total_pembelian; ?></td>
                                    </tr>
							<?php } ?>
						</tbody>
                                </table>
                            </div>
                          </ul>
                       </div>
                    </div>
                </div>
          </div>
                   </section>
                <!-- Dashboard Ecommerce ends -->

<?php include_once '../layouts/footer.php'; ?>