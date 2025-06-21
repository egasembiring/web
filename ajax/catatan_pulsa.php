<?php
session_start();
require_once '../mainconfig.php';
if (!isset($_SESSION['user'])) {
   die("Anda Tidak Memiliki Akses!");
}
if (isset($_POST['layanan'])) {
	$post_layanan = $db->real_escape_string(e(@$_POST['layanan']));
	$cek_layanan = $db->query("SELECT * FROM layanan_pulsa WHERE provider_id = '$post_layanan'");
	if (mysqli_num_rows($cek_layanan) == 1) {
		$data_layanan = mysqli_fetch_assoc($cek_layanan);
		
		echo $hasil;
	} else {
		die("");
	}
        
        ?>
        <br>
        <h6>Deskripsi Layanan</h6>
          <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card shadow-none bg-gradient-danger border">
                                <div class="card-body">
         <p class="list-p">Status : <?= $data_layanan['status'] ?></p>
          <p class="list-p"><?= $data_layanan['note'] ?></p><hr>
          <center><small class="text">*Selalu berhati - hati saat melakukan transaksi.</small></center>
                            </div>
                       </div>
	         </div>
	   </div>
 </div>												
	<?php
} else {
	die("");
}
