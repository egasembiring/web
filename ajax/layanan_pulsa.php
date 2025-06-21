<?php
session_start();
require_once '../mainconfig.php';
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	if (!isset($_POST['operator'])) {
		exit("Not Access!");
	}
if (isset($_POST['operator'])) {
	$post_operator = $db->real_escape_string(e(@$_POST['operator']));
	$cek_layanan = $db->query("SELECT * FROM layanan_pulsa WHERE operator = '$post_operator' AND status = 'Normal' ORDER BY harga ASC");
	if (!isset($_POST['kostum'])) {
	    echo '<option value="0">Pilih Salah Satu</option>';
	}
	while ($data_layanan = $cek_layanan->fetch_assoc()) {
	    if (isset($_POST['kostum'])) {
	        
	        if ($data_user['level'] === 'Member') {
                $price = $data_layanan['harga'];
            } else if ($data_user['level'] === 'Reseller') {
                $price = $data_layanan['harga_api'];
            } else if ($data_user['level'] === 'Premium') {
                $price = $data_layanan['harga_premium'];
            } else {
                $price = $data_layanan['harga_h2h'];
            }
	        
	        $onid = "'" .$data_layanan['provider_id']. "'";
	        $onprice = "'" .number_format($price,0,',','.'). "'";
	        echo '
	        <div class="col-md-3 col-6 list-produk">
                <div class="bg-gradient-primary rounded p-1 text-white mb-1">
                    <div class="form-check">
                        <center><input class="form-check-input" type="radio" onchange="note('.$onid.', '.$onprice.')" name="layanan" id="produk-'.$data_layanan['provider_id'].'" value="'.$data_layanan['provider_id'].'">
                        <label class="form-check-label text-white" for="produk-'.$data_layanan['provider_id'].'">
                            <b>'.$data_layanan['layanan'].'</b></center>
                        </div>
                    </div>
                </div>
            </div>
	        ';
	    } else {
	        echo '<option value="'.$data_layanan['provider_id'].'">'.$data_layanan['layanan'].'</option>';
	    }
	}
	
	if (mysqli_num_rows($cek_layanan) == 0) {
	    echo '<div class="alert alert-warning text-center">Produk belum tersedia</div>';
	}
} else {
    if (isset($_POST['kostum'])) {
        echo '<div class="alert alert-info">Tidak ada layanan</div>';
    } else {
        echo '<option value="0">Error.</option>';
    }
}
} else {
	exit("Not Access!");
}

















session_start();
require_once '../mainconfig.php';
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	if (!isset($_POST['operator'])) {
		exit("Not Access!");
	}
if (isset($_POST['operator'])) {
	$post_operator = $db->real_escape_string(e(@$_POST['operator']));
	$cek_layanan = $db->query("SELECT * FROM layanan_pulsa WHERE operator = '$post_operator' AND status = 'Normal' ORDER BY harga ASC");
	while ($data_layanan = $cek_layanan->fetch_assoc()) {
	?>
	
	<?php
	}
} else {
?>
<div class="alert alert-info">
    <b>Gagal</b> Error not undefined
</div>
<?php
}
} else {
	exit("Not Access!");
}