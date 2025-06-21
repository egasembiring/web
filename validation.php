<?php
session_start();
require_once 'mainconfig.php';
load('middleware', 'user');

if (isset($_POST['cancel-7'])) {
                $cancel_bill = $db->query("UPDATE validation_bank SET status = 'Cancel' WHERE username = '{$_SESSION['user']['username']}'");
                if ($cancel_bill === true) {
                    $_SESSION['alert'] = ['success', 'Success!', 'Pembayaran berhasil dibatalkan.'];
                    exit(header("Location: ".base_url()));
                } else {
                    $_SESSION['alert'] = ['danger', 'Failed!', 'System is busy, please try again later.'];
                }
            }
        

if (isset($_POST['gas'])) {
		$cek_layanan = $db->query("SELECT * FROM validation_bank WHERE username = '{$_SESSION['user']['username']}' AND status = 'Waiting'");
		$data_layanan = mysqli_fetch_assoc($cek_layanan);
		
		$cek_profit = $db->query("SELECT * FROM keuntungan WHERE code = 'PULSA_LAINNYA'");
		$data_profitQ = mysqli_fetch_assoc($cek_profit);				
	        
	        $order_id = random_number(6);
		$tanggal = date('Y-m-d H:i:s');
		$total = $data_layanan['jumlah']+$data_profitQ['bankfee'];
		$user_mu = $_SESSION['user']['username'];
		
		$accno = $data_layanan['account_number'];
		$bankCode = $data_layanan['code'];
		$transfer = $data_layanan['jumlah'];
		
		$cek_provider = $db->query("SELECT * FROM provider WHERE code = 'FLZ-BANK'");
		$q = mysqli_fetch_assoc($cek_provider);
		
		if (mysqli_num_rows($cek_layanan) == 0) {
			$_SESSION['alert'] = ['danger', 'Failed!', 'Layanan sedang gangguan.'];
			
		} else if ($data_user['saldo'] < $total) {
		        $_SESSION['alert'] = ['danger', 'Failed!', 'Saldo tidak mencukupi [Rp '.number_format($total,0,',','.').'].'];
			
		} else {
	if ($provider = 'Manual') {				
	    $random = random_number(6);
	    $profitF = $data_profitQ['bankfee']-2500; 
		if ($db->query("INSERT INTO pembelian_pulsa VALUES ('','{$order_id}', '{$random}', '{$user_mu}', '{$data_layanan['code']}', '{$data_layanan['order_id']}', '{$total}', '{$profitF}', '{$data_layanan['account_number']}', '{$data_layanan['account_number']} a/n {$data_layanan['account_name']}', 'Success', '{$tanggal}', '{$tanggal}', 'Website', 'Manual', 'no')") == true) {
	    $db->query("UPDATE validation_bank SET status = 'Success' WHERE username = '{$_SESSION['user']['username']}'");
	    $db->query("UPDATE users SET saldo = saldo-$total WHERE username = '{$_SESSION['user']['username']}'");
	    $_SESSION['alert'] = ['success', 'Success!', 'Pesanan sedang kami proses.'];
    			exit(header("Location: ".base_url()));	
	                }
	    } 
	    
	    if ($provider = 'FLZ-BANK') { 
	    $postdata = "key={$q['api_key']}&action=transfer&accountNumber={$accno}&bankCode={$bankCode}&transfer_amount={$transfer}";
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"{$q['link']}");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $chresult = curl_exec($ch);
            //print_r($chresult);
            //echo $chresult;
            curl_close($ch);
            $json_result = json_decode($chresult, true);
			
	    if ($json_result['result'] == false) {
	    $_SESSION['alert'] = ['danger', 'Failed!', ''.$json_result['data'].'.'];
	    } else { 
	    $provider_oid = $json_result['data']['trxid'];
	    
	    if ($db->query("INSERT INTO pembelian_pulsa VALUES ('','{$order_id}', '{$provider_oid}', '{$user_mu}', '{$data_layanan['code']}', '{$data_layanan['order_id']}', '{$total}', '300', '{$data_layanan['account_number']}', '{$data_layanan['account_number']} a/n {$data_layanan['account_name']}', 'Success', '{$tanggal}', '{$tanggal}', 'Website', 'FLZ-BANK', 'no')") == true) {
	    $db->query("UPDATE validation_bank SET status = 'Success' WHERE username = '{$_SESSION['user']['username']}'");
	    $db->query("UPDATE users SET saldo = saldo-$total WHERE username = '{$_SESSION['user']['username']}'");
	    $_SESSION['alert'] = ['success', 'Success!', 'Pesanan sedang kami proses.'];
    			exit(header("Location: ".base_url()));	
			} else { 
				$_SESSION['alert'] = ['danger', 'Failed!', '404.'];
			}
		}
	}
}
}

if (!isset($_GET['order_id'])) {
    exit(header("Location: ".base_url()));
} else {
    $order_id = $db->real_escape_string(e($_GET['order_id']));
    $check_oid = $db->query("SELECT * FROM validation_bank WHERE order_id = '{$order_id}' AND username = '{$_SESSION['user']['username']}'");
    if (mysqli_num_rows($check_oid) == 0) {
        $_SESSION['alert'] = ['danger', 'Failed!', '404.'];
        
        exit(header("Location: ".base_url()));
    } else {
        $bill = $check_oid->fetch_assoc();
      
$cek_profitF = $db->query("SELECT * FROM keuntungan WHERE code = 'PULSA_LAINNYA'");
$data_profitQQ = mysqli_fetch_assoc($cek_profitF);

include_once 'layouts/header.php'; ?>
<div class="row">
            <div class="offset-lg-2 col-lg-8 text-secondary">
                <div class="card">
                    <div class="card-body">
                                <h4 class="m-t-0 text-uppercase text-center header-title"><i class=""></i>DETAIL TRANSFER</h4><hr>
                         <form class="form-horizontal" method="POST">
	                 							    
<div class="form-group">
     <div class="col-md-12">
          <label>Account Number</label>
          <br>
          <?= $bill['account_number']; ?>
                             </div>
          </div>
          
<div class="form-group">
     <div class="col-md-12">
          <label>Account Name</label>
          <br>
          <?php
$phone = $bill['account_name'];
$jumlah_sensor= 12;
$setelah_angka_ke= 3;
 
//ambil 4 angka di tengah yan akan disensor
$censored = mb_substr($phone, $setelah_angka_ke, $jumlah_sensor);
 
//pecah kelompok angka pertama dan terakhir
$phone2=explode($censored,$phone);
 
//gabung angka perama dan terakhir dengan angka tengah yang telah di sensor
$phone_new=$phone2[0]."************".$phone2[1];
  
?>
          <?= $phone_new; ?>
                             </div>
          </div>
          
<div class="form-group">
     <div class="col-md-12">
          <label>Jumlah Transfer</label>
          <br>
          Rp <?= number_format($bill['jumlah'],0,',','.'); ?>
                             </div>
          </div>
         
<div class="form-group">
     <div class="col-md-12">
          <label>Biaya Admin</label>
          <br>
          Rp <?= number_format($data_profitQQ['bankfee'],0,',','.'); ?>
                             </div>
          </div>

<div class="form-group">
     <div class="col-md-12">
          <label>Total Harga</label>
          <br>
          Rp <?= number_format($bill['jumlah']+$data_profitQQ['bankfee'],0,',','.'); ?>
                             </div>
          </div>
          
<div class="col-md-12">
              <button type="submit" class="pull-right btn btn-block btn--md btn-primary waves-effect w-md waves-light" name="gas">Transfer</button>
              <button type="submit" class="pull-right btn btn-block btn--md btn-danger waves-effect w-md waves-light" name="cancel-7">Cancel</a>
              </div>
	</div>
</form>
	</div>
	</div>
</div>		
<?php include_once 'layouts/footer.php';

    }
} ?>
