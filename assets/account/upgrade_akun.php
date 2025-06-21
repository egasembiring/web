<?php

session_start();
require_once '../mainconfig.php';
load('middleware', 'user');

if (isset($_POST['up'])) {
		$post_level = $db->real_escape_string(e(@$_POST['level']));
		$post_pin = $db->real_escape_string(e(@$_POST['pin']));
		
		$cek_pin = $db->query("SELECT * FROM users WHERE pin = '{$post_pin}' AND username = '{$session}'");
		$data_pin = mysqli_fetch_assoc($cek_pin);

		if (!$post_level || !$post_pin) {
			$_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada form kosong.'];

		} else if (mysqli_num_rows($cek_pin) == 0) {
    		        $_SESSION['alert'] = ['danger', 'Failed!', 'Konfirmasi PIN anda salah.'];
			
		} else if ($data_user['saldo'] < 55000) {
			$_SESSION['alert'] = ['danger', 'Failed!', 'Saldo anda tidak mencukupi.'];
		
		} else if ($data_user['level'] !== "Member") {
			$_SESSION['alert'] = ['danger', 'Failed!', 'Mohon maaf kami hanya menawarkan untuk level member saja.'];	    
		} else {
		
		$order_id = random_number(6);
		$tanggal = date('Y-m-d H:i:s');
		
		if ($db->query("UPDATE users SET saldo = saldo-55000 WHERE username = '{$session}'") == true) { 
                $db->query("UPDATE users SET level = 'Reseller' WHERE username = '{$session}'");
                $db->query("INSERT INTO history_saldo VALUES('', '{$session}', '-', '55000', 'Upgrade akun menjadi reseller :: ({$order_id})', '{$tanggal}')");
                $_SESSION['alert'] = ['success', 'Success!', 'Upgrade akun berhasil silakan menikmati.'];
                exit(header("Location: ".base_url()));
                } else { 
                $_SESSION['alert'] = ['danger', 'Failed!', '404'];
		}
	}
}
	include_once '../layouts/header.php';
?>
	
	<div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                                <h4 class="m-t-0 text-uppercase text-center header-title"><i class=""></i> UPGRADE AKUN</h4><hr>
                         <form class="form-horizontal" method="POST">
	                 <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">   
	                 										    	 
        <div class="form-group">
        <label class="col-md-12 control-label">Target Level</label>
	     <div class="col-md-12">
		  <select class="select form-control" name="level">
		       <option value="Reseller">Reseller</option>
		   </select>
	     </div>
	</div>
	
	<div class="form-group">
	     <div class="col-md-12">
             <label class="form-label">Konfirmasi PIN</label>
                    <div class="input-group input-group-merge">
             <div class="input-group-prepend">
                  <span class="input-group-text"><i data-feather="key"></i></span>
                        </div>
             <input type="password" class="form-control" name="pin" onkeyup="this.value=this.value.replace(/[^\d]+/g,'')" placeholder="" minlength="6" maxlength="6" data-validation-required-message="This phone field is required" required>
                                </div>
                        </div>
	</div>
	
	<div class="form-group">
	     <div class="col-md-12">
             <label class="form-label">Total Harga</label>
                    <div class="input-group input-group-merge">
             <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                        </div>
             <input type="text" class="form-control" name="harga" value="55000" disabled>
                                </div>
                        </div>
	</div>
	
	<div class="col-md-12">
              <button type="submit" class="pull-right btn btn-block btn--md btn-primary waves-effect w-md waves-light" name="up">Upgrade</button>
        </div>
		</div>
		        </form>
				</div>
									
		   </div>
		   <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center">INFORMASI UPGRADE</h4>
                <hr>
                <font style="font-size: 0.95rem;">
             <ul>
                 <li>Masukan PIN kamu untuk mengkonfirmasi bahwa ini akun kamu.</li>
                 <li>Harap berhati-hati sistem ini otomatis jika kalian klik upgrade maka saldo anda langsung di potong oleh sistem sebesar <b>Rp 55.000</b>.</li>
             <li>Untuk fitur ini yang sudah menjadi reseller tidak dapat di upgrade kembali, sistem akan ditect akun kamu.</li>
                 <li>Klik upgrade untuk memulai akun reseller.</li>                
             </font>
            </div>
        </div>
    </div>	</div>	
<?php include_once '../layouts/footer.php'; ?>