<?php
session_start();
require_once '../mainconfig.php';

if (!isset($_SESSION['user'])) {
   die("Anda Tidak Memiliki Akses!");
}
if (isset($_POST['layanan'])) {
	$post_layanan = $db->real_escape_string(e(@$_POST['layanan']));
	$cek_layanan = $db->query("SELECT * FROM layanan_sosmed WHERE service_id = '{$post_layanan}' AND status = 'Aktif'");
	if (mysqli_num_rows($cek_layanan) == 1) {
		$data_layanan = mysqli_fetch_assoc($cek_layanan);
		if ($data_user['level'] === "Reseller") {
		    $harga = $data_layanan['harga_api'];
		    } else if ($data_user['level'] === "Admin") {
		    $harga = $data_layanan['harga_api'];
		} else {
		    $harga = $data_layanan['harga'];
		}
	?>
			
			<div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label>Harga/K</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><div class="input-group-text">Rp. </div></div>
                                <input type="text" class="form-control" id="price" value="<?= number_format($data_layanan['harga'],0,',','.') ?>" readonly="">
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>Min.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="min" value="<?= number_format($data_layanan['min'],0,',','.') ?>" readonly="">
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>Maks.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="max" value="<?= number_format($data_layanan['max'],0,',','.') ?>" readonly="">
                            </div>
                        </div>
                    </div>
       <br>
       <h6>Deskripsi Layanan</h6>
          <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card shadow-none bg-transparent border-primary">
                                <div class="card-body">
          <p class="list-p"><?= $data_layanan['catatan'] ?></p><hr>
     <center><small class="text-danger">*Selalu berhati - hati saat melakukan transaksi.</small></center>
                            </div>
                       </div>
	         </div>
	   </div>
	<?php
	} else {
	?>
	<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	<i class="mdi mdi-block-helper"></i>
	<b>Gagal :</b> Service Tidak Ditemukan</div>
	<?php
	}
       } else {
?>
	<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
			</button>
	<i class="mdi mdi-block-helper"></i>
	<b>Gagal : </b> Terjadi Kesalahan.
	</div>
<?php
}

