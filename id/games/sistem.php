<?php
session_start();
$guest = true;
$date = date('Y-m-d H:i:s');

require_once '../fo.php';
require_once '../../mainconfig.php';

if (opt_get('Z3Vlc3Rfc3RhdHVz') == 'Off') {
    require '../../404.html';
    die;
}

$query_games = mysqli_query($db, "SELECT * FROM games_guest WHERE slug = '$slug'");

if (mysqli_num_rows($query_games) == 0) {
    header('location: ../../id');
    die;
}
$fetch_games = mysqli_fetch_assoc($query_games);

if (!empty($fetch_games['petunjuk'])) {
    if (filter_var($fetch_games['petunjuk'], FILTER_VALIDATE_URL)) {
        $petunjuk = $fetch_games['petunjuk'];
    } else {
        $petunjuk = false;
    }
} else {
    $petunjuk = false;
}

if (isset($_POST['target']) AND isset($_POST['produk']) AND isset($_POST['metode']) AND isset($_POST['wa'])) {
    
    $target = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, implode('', $_POST['target'])))));
    $produk = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, $_POST['produk']))));
    $metode = addslashes(trim(htmlspecialchars(mysqli_real_escape_string($db, $_POST['metode']))));
    $wa = $_POST['wa'];
    
    if (empty($target) OR empty($produk) OR empty($metode) OR empty($wa)) {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Pembelian gagal dilakukan.'];
        
        
    } else {
        $query_produk = mysqli_query($db, "SELECT * FROM layanan_pulsa WHERE id = '$produk'");
        if (mysqli_num_rows($query_produk) === 1) {
            $fetch_produk = mysqli_fetch_assoc($query_produk);
            
            if (filter_var($wa, FILTER_VALIDATE_INT)) {
                $query_metode = mysqli_query($db, "SELECT * FROM metode_guest WHERE id = '$metode'");
                if (mysqli_num_rows($query_metode) == 1) {
                    $fetch_metode = mysqli_fetch_assoc($query_metode);
                    
                    $next = false;
                    
                    $order_id = 'TP' . rand(0000000,9999999);
                    
                    if (isset($_SESSION['user'])) {
                        $user_guest = $_SESSION['user']['username'];
                    } else {
                        $user_guest = 'none';
                    }
                    
                    $query_harga = mysqli_query($db, "SELECT * FROM harga_guest WHERE layanan_id = '$produk' AND metode_id = '$metode'");
                    if (mysqli_num_rows($query_harga) == 1) {
                        $fetch_harga = mysqli_fetch_assoc($query_harga);
                        
                        $harga_real = $fetch_harga['harga'];
                    } else {
                        $harga_real = $fetch_produk['harga'];
                    }
                    
                    if ($fetch_metode['sistem'] == 'default') {
                        $TR = $db->query("SELECT * FROM provider WHERE code='Tripay'");
                        $TRR = $TR->fetch_assoc();
                        $merchantCode = $TRR['merchant_id'];
                        $merchantKeyy = $TRR['api_key'];

                        $itemDetails = [
                            [
                                'name' => 'Deposit Saldo',
                                'price' => $harga_real,
                                'quantity' => 1
                            ]
                        ];
                    
                        $params = array(
                            'merchantCode' => $merchantCode,
                            'paymentAmount' => $harga_real,
                            'paymentMethod' => $fetch_metode['tujuan'],
                            'merchantOrderId' => $order_id,
                            'productDetails' => 'Pesanan',
                            'merchantUserInfo' => $user_guest,
                            'customerVaName' => $user_guest,
                            'phone' => $wa,
                            'itemDetails' => $itemDetails,
                            'callbackUrl' => base_url() . 'default',
                            'returnUrl' => base_url(),
                            'signature' => md5($merchantCode . $order_id . $harga_real . $merchantKeyy),
                            'expiryPeriod' => 180
                        );
                    
                        $params_string = json_encode($params);
                        $url = 'default'; // Production
                        
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url); 
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                            'Content-Type: application/json',                                                                                
                            'Content-Length: ' . strlen($params_string))                                                                       
                        );   
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    
                        //execute post
                        $request = curl_exec($ch);
                        $result = json_decode($request, true);
                        
                        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    
                        if ($httpCode == 200) {
                            
                            $pay_url = $result['paymentUrl'];
                            
                            $next = true;
                        } else {
                            echo 'Response from default : ' . $result['Message'];
                            die;
                        }
                    }else if($fetch_metode['sistem'] == 'Mutasi'){
                        if($fetch_metode['metode'] == 'OVO'){
                        	$opo = rand(555,999);
                        	$harga_real = $fetch_produk['harga'] + $opo;
                        	$ocong = $db->query("SELECT * FROM akun_emoney WHERE type='OVO'")->fetch_assoc();
                       		$pay_url = $ocong['nomor'];
                        	$next = true;
                        }else if($fetch_metode['metode'] == 'GOPAY'){
                        	$opo = rand(555,999);
                        	$harga_real = $fetch_produk['harga'] + $opo;
                        	$gocong = $db->query("SELECT * FROM akun_emoney WHERE type='GOPAY'")->fetch_assoc();
                        	$pay_url = $gocong['nomor'];
                        	$next = true;
                        }else if($fetch_metode['metode'] == 'DANA'){
                        	$opo = rand(555,999);
                        	$harga_real = $fetch_produk['harga'] + $opo;
                        	$gocon = $db->query("SELECT * FROM akun_emoney WHERE type='DANA'")->fetch_assoc();
                        	$pay_url = $gocon['nomor'];
                        	$next = true;
                        }else if($fetch_metode['metode'] == 'SHOPEEPAY'){
                        	$opo = rand(555,999);
                        	$harga_real = $fetch_produk['harga'] + $opo;
                        	$goc = $db->query("SELECT * FROM akun_emoney WHERE type='DANA'")->fetch_assoc();
                        	$pay_url = $goc['nomor'];
                        	$next = true;
                        }else if($fetch_metode['metode'] == 'BCA'){
                        	$opo = rand(555,999);
                        	$harga_real = $fetch_produk['harga'] + $opo;
                        	$bcang = $db->query("SELECT * FROM bank WHERE provider='BCA'")->fetch_assoc();
                        	$pay_url = $bcang['nomor_rekening'];
                        	$next = true;
                        }
                    } else if ($fetch_metode['sistem'] == 'Tripay') {
                    	$tri = $db->query("SELECT * FROM provider WHERE code='Tripay'");
                    	$Trip = $tri->fetch_assoc();
                        $data = [
                            'method'         => $fetch_metode['kode'],
                            'merchant_ref'   => $order_id,
                            'amount'         => $harga_real,
                            'customer_name'  => $user_guest,
                            'customer_email' => 'cs@game.mypulsaa.com',
                            'customer_phone' => $wa,
                            'order_items'    => [
                                [
                                    'sku'         => 'XS',
                                    'name'        => $fetch_produk['layanan'],
                                    'price'       => $harga_real,
                                    'quantity'    => 1,
                                ]
                            ],
                            'return_url'   => base_url() . 'id/check.php?invoice=' . $order_id,
                            'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
                            'signature'    => hash_hmac('sha256', $Trip['merchant_id'].$order_id.$harga_real, $Trip['api_id'])
                        ];
                        
                        $curl = curl_init();
                        
                        curl_setopt_array($curl, [
                            CURLOPT_FRESH_CONNECT  => true,
                            CURLOPT_URL            => 'https://tripay.co.id/api/transaction/create',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_HEADER         => false,
                            CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$Trip['api_key']],
                            CURLOPT_FAILONERROR    => false,
                            CURLOPT_POST           => true,
                            CURLOPT_POSTFIELDS     => http_build_query($data)
                        ]);
                        
                        $result = curl_exec($curl);
                        $result = json_decode($result, true);
                        if ($result['success'] == true) {
                            if (array_key_exists('qr_url', $result['data'])) {
                                $pay_url = $result['data']['qr_url'];
                            } else {
                                $pay_url = $result['data']['pay_code'];
                            }
                            $next = true;
                        } else {
                            echo 'Response from tripay.co.id : ' . $result['message'];
                            die;
                        }
                    } else {
                        $next = true;
                    }
                    
                    if ($next === true) {
                        
                        if (isset($pay_url)) {
                            $rek = $pay_url;
                        } else {
                            $rek = !empty($fetch_metode['rek']) ? $fetch_metode['rek'] : '-';
                        }
                        
                        $db->query("INSERT INTO `pembelian_guest`(`id`, `username`, `phone`, `order_id`, `metode_id`, `metode`, `rek`, `games`, `layanan_id`, `layanan`, `sku`, `target`, `harga`, `status`, `sn`, `error_msg`, `date_create`, `date_process`, `date_update`) VALUES ('','$user_guest','$wa','$order_id','".$fetch_metode['id']."','".$fetch_metode['metode']."','$rek','".$fetch_produk['operator']."','".$fetch_produk['id']."','".$fetch_produk['layanan']."','".$fetch_produk['service_id']."','$target','$harga_real','Pending','-','none','$date','$date','$date')");
                        
                        
                        $WAA = $db->query("SELECT * FROM provider WHERE code='TPulsa'");
                        $MP = $WAA->fetch_assoc();
                        $urls = $rek;
                        $dirs = '../../assets/images'.$string.'.jpg';
                        file_put_contents($dirs,file_get_contents($urls));
                        
                        $data_wa = [
                            'api_key' => $MP['api_key'],
                            'sender'  => $MP['merchant_id'],
                            'number'  => $wa,
                            'message' => 'Rincian Pesanan
- ID User: '.$target.'
- Invoice: '.$order_id.'
- Method: '.$fetch_metode['metode'].'
- Total: Rp '.number_format($harga_real,0,',','.').'
- Status: Pending
Informasi Lebih Lengkapnya dibawah ini
https://xflazz.store/id/check?invoice='.$order_id.'

Terima Kasih!!'];
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                            CURLOPT_URL => $MP['link']."send-message",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => json_encode($data_wa)));
                        
                        $result_wa = curl_exec($curl);
                        if (isset($pay_url)) {
                            $_SESSION['alert'] = ['success', 'Success!', 'Pembelian Berhasil'];
                            header('location:/id/check.php?invoice=' . $order_id);
                        } else {
                            $_SESSION['alert'] = ['success', 'Success!', 'Berikut detail pesanan kamu.'];
                            header('location:/id/check.php?invoice=' . $order_id);
                        }
                    } else {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'Pembelian gagal dilakukan.'];
                    }
                } else {
                    $_SESSION['alert'] = ['danger', 'Failed!', 'Metode tidak ditemukan.'];
                }
            } else {
                $_SESSION['alert'] = ['danger', 'Failed!', 'Nomor WhatsApp tidak sesuai.'];
            }
        } else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Nominal tidak ditemukan.'];
        }
    }
}

include '../../layouts/header.php';
?>
<style>
    .app-content {
	    margin-left: 0 !important;
	}
	.card-header {
	    border-bottom: 1px solid #edecec !important;
	    margin-bottom: 20px;
	}
	.box-metode {
	    cursor: pointer;
	}
	.row-produk .col-6:nth-child(odd) {
	    padding-right: 7px;
	}
	.row-produk .col-6:nth-child(even) {
	    padding-left: 7px;
	}
	@media only screen and (max-width: 600px) {
	    .list-produk:nth-child(odd) {
	        padding-right: 5px;
	    }
	    .list-produk:nth-child(even) {
	        padding-left: 5px;
	    }
    }
</style>
	<form id="form-order" class="form-horizontal" method="POST">
    	<div class="row justify-content-center">
    	    <div class="col-md-9">
    	        <div class="row">
        	            <div class="col-md-4">
            	        <div class="card">
            	            <div class="card-body">
            	                <div class="text-center mb-2">
            	                    <img src="/assets/games/<?= $fetch_games['img']; ?>" style="max-width: 150px;border-radius: 8px;">
            	                </div>
            	                <h3><?= $fetch_games['name']; ?></h3>
            	                <span class="bg-primary d-block mb-1" style="width: 60px;height: 5px;border-radius: 10px;"></span>
            	                <?= $fetch_games['keterangan']; ?>
            	            </div>
            	        </div>
            	        </div>
            
            	        <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="mdi mdi-numeric-1-circle-outline text-primary"></i>
                                    Masukkan User ID
                                </h4>
                            </div>
                            <div class="card-body">
                                <?php if ($fetch_games['sistem_id'] == 'A'): ?>
                                <label style="margin-bottom: 8px;">User iD</label>
                                <input type="text" class="form-control" id="target" name="target[]" placeholder="Masukkan User iD" required="">
                                <?php endif; ?>
                                
                                <?php if ($fetch_games['sistem_id'] == 'AA'): ?>
                                <div class="row">
                                    <div class="col-6">
                                        <label style="margin-bottom: 8px;">User ID</label>
                                        <input type="text" class="form-control" id="target" name="target[]" placeholder="User ID" required="">
                                    </div>
                                    <div class="col-6">
                                        <label style="margin-bottom: 8px;">Zone ID</label>
                                        <input type="text" class="form-control" id="server" name="target[]" placeholder="Zone ID" required="">
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($fetch_games['sistem_id'] == 'AAA'): ?>
                                <div class="row">
                                    <div class="col-6">
                                        <label style="margin-bottom: 8px;">User ID</label>
                                        <input type="text" class="form-control" id="target" name="target[]" placeholder="User ID" required="">
                                    </div>
                                    <div class="col-6">
                                        <label style="margin-bottom: 8px;">Server</label>
                                        <select class="form-control" id="server" name="target[]">
                                            <option value="">Pilih Server</option>
                                            <option value="MiskaTown">MiskaTown</option>
                                            <option value="SandCastle">SandCastle</option>
                                            <option value="MouthSwamp">MouthSwamp</option>
                                            <option value="RedwoodTown">RedwoodTown</option>
                                            <option value="Obelisk">Obelisk</option>
                                            <option value="ChaosOutpost">ChaosOutpost</option>
                                            <option value="IronStride">IronStride</option>
                                            <option value="FallForest">FallForest</option>
                                            <option value="MountSnow">MountSnow</option>
                                            <option value="NancyCity">NancyCity</option>
                                            <option value="CharlesTown">CharlesTown</option>
                                            <option value="SnowHighlands">SnowHighlands</option>
                                            <option value="Santopany">Santopany</option>
                                            <option value="LevinCity">LevinCity</option>
                                            <option value="ChaosCity">ChaosCity</option>
                                            <option value="TwinIslands">TwinIslands</option>
                                            <option value="HopeWall">HopeWall</option>
                                            <option value="NewLand">NewLand</option>
                                            <option value="MileStone">MileStone</option>
                                        </select>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php if ($petunjuk !== false): ?>
                                <button class="btn btn-relief-primary btn-sm mt-2" style="background:#7367F0;color:#fff;" type="button" onclick="btn_petunjuk();">Petunjuk</button>
                                <?php endif; ?>
                                </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="mdi mdi-numeric-2-circle-outline text-primary"></i>
                                    Pilih Nominal
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row row-produk">
                                    
                                    <?php
                                    $query_product = mysqli_query($db, "SELECT * FROM layanan_pulsa WHERE operator = '".$fetch_games['product']."' ORDER BY harga ASC");
                                    while($fetch_product = mysqli_fetch_assoc($query_product)) :
                                    ?>
                                    <?php if($fetch_product['status'] == 'Normal'):?>
                                    <div class="col-6 mb-1">
                                        <button type="button" onclick="pilih_produk('<?= $fetch_product['id'] ?>');" id="produk-ke-<?= $fetch_product['id']; ?>" class="btn btn-produk btn-outline-primary btn-block"><?= $fetch_product['layanan']; ?></button>
                                    </div>
                                    <?php endif ?>
                                    <?php endwhile; ?>
                                    <?php if (mysqli_num_rows($query_product) == 0): ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-warning py-1 text-center">
                                            <b>Produk belum tersedia</b>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="mdi mdi-numeric-3-circle-outline text-primary"></i>
                                    Pilih Metode Pembayaran
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="accordion" id="metode-guest">
                                    <?php
                                    $i = 1;
                                    $query_tipe_metode = mysqli_query($db, "SELECT DISTINCT tipe FROM metode_guest"); 
                                    while($fetch_tipe_metode = mysqli_fetch_assoc($query_tipe_metode)):
                                    $query_metode = mysqli_query($db, "SELECT * FROM metode_guest WHERE tipe = '".$fetch_tipe_metode['tipe']."'");
                                    ?>
                                    <?php if (mysqli_num_rows($query_metode) !== 0): ?>
                                    <div class="mb-1 border" style="border-radius: 8px;">
                                        <div class="mb-0 bg-primary p-1 text-white collapsed" style="border-radius: 8px 8px 0 0;" data-toggle="collapse" data-target="#collapse-<?= $i; ?>" aria-expanded="true" aria-controls="collapse-<?= $i; ?>">
                                            <b><?= $fetch_tipe_metode['tipe']; ?></b>
                                        </div>
                                        <div id="collapse-<?= $i; ?>" class="collapse p-1" aria-labelledby="headingOne" data-parent="#metode-guest">
                                            <?php while($fetch_metode = mysqli_fetch_assoc($query_metode)): ?>
                                            <div class="p-1 border box-metode" style="border-radius: 8px;margin-bottom: 8px;box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%);" id="metode-<?= $fetch_metode['id']; ?>" onclick="pilih_metode('<?= $fetch_metode['id']; ?>');">
                                                <img src="/assets/metode/<?= $fetch_metode['img']; ?>" width="35">
                                                <span class="float-right text-warning" style="font-weight: 500;font-size: 13px;" data-harga="" id="metode-harga-<?= $fetch_metode['id']; ?>"></span>
                                                <hr style="margin: 8px 0 !important;">
                                                <small><?= $fetch_metode['ket']; ?><br><i class="text-warning"><?= $fetch_metode['sub_ket']; ?></i></small>
                                            </div>
                                            <?php endwhile; ?>
                                        </div>
                                        <div class="p-1 text-right" style="background: #fFf;border-radius: 0 0 8px 8px;">
                                            <?php 
                                            $query_metode_logo = mysqli_query($db, "SELECT * FROM metode_guest WHERE tipe = '".$fetch_tipe_metode['tipe']."'");
                                            while($fetch_metode_logo = mysqli_fetch_assoc($query_metode_logo)): 
                                            ?>
                                            <img src="/assets/metode/<?= $fetch_metode_logo['img']; ?>" width="35">
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php $i++; endwhile; ?>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" id="input-produk" name="produk">
                        <input type="hidden" id="input-harga">
                        <input type="hidden" id="input-metode" name="metode">
                        
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="mdi mdi-numeric-4-circle-outline text-primary"></i>
                                    <b>Konfirmasi Pesanan</b>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Masukkan Nomor Whatsapp Contoh ; 62xxxxxx</label>
                                    <input type="number" class="form-control" placeholder="628xxxxxxx" require name="wa" id="wa">
                                    <div class="mt-2">
                                    <span class="text-muted">Dengan membeli otomatis saya menyetujui <a href="/page/terms">Syarat Ketentuan</a></span>
                                    </div><br>
                                    <?php if ($fetch_games['validate_id'] !== 'Tydacks'): ?>
                                    <button type="button" class="btn waves-effect btn-block btn-lg btn-primary waves-light" onclick="confirm_order();"><i class="mdi mdi-shopping mr-1"></i>Beli Sekarang</button>
                                    <?php else: ?>
                                    <button type="submit" class="btn btn-relief-primary btn-block"><i class="mdi mdi-cart"></i>Beli Sekarang</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
    	        </div>
    	    </div>
        </div>
    </form>
    <script type="text/javascript">
        
        function submit_order() {
            $("#form-order").submit();
        }
        
        function pilih_produk(id) {
            
            $(".btn-produk").removeClass('btn-primary');
            $("#produk-ke-" + id).addClass('btn-primary');
            
            $.ajax({
                url: '<?= base_url(); ?>id/ajax/get-harga.php',
                data: 'produk=' + id,
                type: 'POST',
                dataType: 'JSON',
                success: function(result) {
                    
                    $("#input-produk").val(id);
                    
                    for(var i = 0; i < result.length; i++) {
                        $("#metode-harga-" + result[i].id).html(result[i].harga);
                        $("#metode-harga-" + result[i].id).attr('data-harga', result[i].harga);
                    }
                }
            });
        }
        
        function pilih_metode(id) {
            $(".box-metode").removeClass('border-warning');
            $("#metode-" + id).addClass('border-warning');
            
            $("#input-metode").val(id);
            $("#input-harga").val($("#metode-harga-" + id).attr('data-harga'));
        }
	</script>
	
<?php require_once '../../layouts/javascript.php'; ?>
<?php include_once '../../layouts/footer1.php'; ?>

<?php if ($fetch_games['validate_id'] !== 'Tydacks'): ?>

    <?php if ($petunjuk !== false): ?>
    <div class="modal fade text-left" id="modal-petunjuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" id="SModal-size" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="SModal-title">Petunjuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="<?= $petunjuk; ?>" class="w-100">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"></button>
                </div>
            </div>
        </div>
    </div> 
    <script>
        function btn_petunjuk() {
            $("#modal-petunjuk").modal('show');
        }
    </script>
    <?php endif; ?>

    <div class="modal fade text-left" id="modal-detail-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" id="SModal-size" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="SModal-title">Detail pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="SModal-body">
                    <p>Mohon konfirmasi Username anda sudah benar</p>
                    <table class="table">
                        <tr>
                            <th>Username</th>
                            <td id="mdu-user">-</td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <td id="mdu-target">-</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td id="mdu-harga">-</td>
                        </tr>
                    </table>
                    <hr>
                    <h5 style="padding: 10px 0;">Total pembayaran</h5>
                    <h2 style="float: right;margin-top: -39px;" class="text-warning" id="mdu-harga2">-</h2>
                    <hr>
                    <button class="btn btn-primary w-100" type="button" onclick="submit_order();">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>   
    
    <div class="modal fade text-left" id="modal-detail-user-loading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" id="SModal-size" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" width="80"><br><br>
                        <h4 class="modal-title text-center">Mohon Tunggu</h4>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script> 
    
        function confirm_order() {
            var user = $("#target").val();
            var server = $("#server").val();
            var harga = $("#input-harga").val();
            var wa = $("input[name=wa]").val();
            var email = $("input[name=email]").val();
            if (user == '' || server == '') {
                Swal.fire('Gagal', 'ID Player tidak boleh kosong', 'error');
            } else if (harga == '') {
                Swal.fire('Gagal', 'Silahkan pilih metode pembayaran', 'error');
            } else if (wa == '') {
                Swal.fire('Gagal', 'Silahkan isi Nomor WhatsApp', 'error');
            } else if (wa.startsWith('1') || wa.startsWith('2') || wa.startsWith('3') || wa.startsWith('4') || wa.startsWith('5') || wa.startsWith('7') || wa.startsWith('8') || wa.startsWith('9')) {
                Swal.fire('Gagal', 'Nomor Whatsapp tidak sesuai', 'error');
            } else if (wa.length < 10 || wa.length > 14) {
                Swal.fire('Gagal', 'Nomor Kurang dari 10 Angka', 'error');
            } else {
                target = user;
                <?php if ($fetch_games['sistem_id'] !== 'A'): ?>
                target = user + '(' + server +')';
                <?php endif; ?>
                $("#mdu-target").text(target);
                $("#mdu-harga").text(harga);
                $("#mdu-harga2").text(harga);
                <?php if ($fetch_games['sistem_id'] !== 'A'): ?>
                target = user + '(' + server +')';
                <?php endif; ?>
                $.ajax({
                    url: '/cron/games/get-detail.php',
                    data: 'games=<?= $fetch_games['validate_id']; ?>&target='+user+'&server='+server,
                    type: 'POST',
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#modal-detail-user-loading").modal();
                    },
                    error: function() {
                        Swal.fire('Gagal', 'Gagal', 'error');
                    },
                    success: function(result) {
                        $("#modal-detail-user-loading").modal('hide');
                        
                        if (result.error_msg) {
                            Swal.fire('Gagal', 'ID Player Tidak Ditemukan', 'error');
                        } else {
                            $("#mdu-user").text(result.nickname);
                            $('#modal-detail-user').modal();
                            Swal.fire('Success!','ID Player Ditemukan', 'success');
                        }
                    }
                });
            }
        }
        
    </script>
<?php endif; ?>