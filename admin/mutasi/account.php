<?php 
require '../../mainconfig.php';
require '../../lib/gopay/gopay.php';
require '../../lib/ovo/ovo.php';

$gopay = new GojekPay();
$data_gopay = $db->query("SELECT * FROM akun_emoney WHERE type = 'GOPAY'") 
->fetch_assoc();
session_start();
function rdate($f,$x = '-0 days') { return date($f, strtotime($x, strtotime(date('Y-m-d H:i:s')))); }
load('middleware', 'user');
if (isset($_POST['otp-gopay']) OR isset($_POST['phone-gopay']) OR isset($_POST['pin-gopay'])) {
    if(isset($_POST['send_otp_gopay'])){
    $post_phone = $_POST['phone-gopay'];
    $device = json_decode($gopay->loginRequest($post_phone), true)['data']['otp_token'];
    
    if($device == true){
        $update  = $db->query("UPDATE akun_emoney SET device = '$device' , nomor = '$post_phone' WHERE type = 'GOPAY'");
        if($update == true){
            $_SESSION['alert'] = ['success', 'Success!', 'Berhasil Menautkan Nomor GOPAY'];
        }else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Menautkan Nomor GOPAY'];
        }
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Mengirim OTP'];
    }
    
    }else if(isset($_POST['confirm_otp_gopay'])){
        $post_otp = $_POST['otp-gopay'];
        $verif = json_decode($gopay->getAuthToken($data_gopay['device'],$post_otp), true)['access_token'];
    
        if($verif == true){
        $update = $db->query("UPDATE akun_emoney SET otp = '$post_otp', token = '$verif' WHERE type = 'GOPAY'");
        if($update ==  true){
            $_SESSION['alert'] = ['success', 'Success!', 'Berhasil Menautkan Akun Gopay'];
        }else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Menautkan Akun Gopay'];
        }
        }else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Mendapatkan Token'];
        }
    }else if(isset($_POST['auth_pin'])){
    $post_pins = $_POST['pin-gopay'];
        $db->query("UPDATE akun_emoney SET pin = '$post_pins' WHERE type = 'GOPAY'");
            $_SESSION['alert'] = ['success', 'Success!', 'Berhasil Menautkan Pin GOPAY'];
    }else{
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Menautkan Pin GOPAY'];
    }
}
$OVO = new Ovo();
$data_ovo = $db->query("SELECT * FROM akun_emoney WHERE type = 'OVO'") 
->fetch_assoc();
if (isset($_POST['otp']) OR isset($_POST['phone']) OR isset($_POST['pin'])) {
if(isset($_POST['send_otp'])){
    $post_phone1 = $_POST['phone'];
    $device = json_decode($OVO->sendOtp($post_phone1), true)['data']['otp']['otp_ref_id'];
    if($device == true){
        $update  = $db->query("UPDATE akun_emoney SET device = '$device' , nomor = '$post_phone1' WHERE type = 'OVO'");
        if($update == true){
            $_SESSION['alert'] = ['success', 'Success!', 'Sukses Menautkan Nomor OVO'];
        }else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Menautkan Nomor OVO'];;
        }
    } else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Mengirim OTP'];
    }
    
}else if(isset($_POST['confirm_otp'])){
    $post_otp = $_POST['otp'];
    $verif = json_decode($OVO->OTPVerify($data_ovo['nomor'],$data_ovo['device'],$post_otp), true)['data']['otp']['otp_token'];
    
    if($verif == true){
        $update = $db->query("UPDATE akun_emoney SET otp = '$post_otp', token = '$verif' WHERE type = 'OVO'");
        if($update ==  true){
            $_SESSION['alert'] = ['success', 'Success!', 'Sukses Menautkan OTP'];
        }else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Menautkan OTP'];
        }
    }else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Mengirim Token'];
    }
    
}else if(isset($_POST['auth_otp'])){
    $post_pin = $_POST['pin'];
    $akses = json_decode($OVO->getAuthToken($data_ovo['nomor'],$data_ovo['device'],$data_ovo['token'],$post_pin), true)['data']['auth'];
    
    if($akses['access_token'] == true){
        $db->query("UPDATE akun_emoney SET pin = '$post_pin', token = '".$akses['access_token']."' WHERE type = 'OVO'");
            $_SESSION['alert'] = ['success', 'Success!', 'Berhasil Menautkan Akun OVO'];
    }else{
            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal Menautkan Akun OVO'];
    }
}

}
include '../../layouts/header_admin.php';
?>
<div class="row justify-content-center">
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Akun GOPAY</h4>
            </div>
            <div class="card-body card-dashboard">
                <form method="POST">
                    <div class="form-group">
                        <label>NOMOR GOPAY</label>
                        <input type="tel" class="form-control" autocomplete="off" placeholder="08xxxxxx" value="<?= $data_gopay['nomor']?>" name="phone-gopay">
                        <button class="btn btn-primary mt-1" type="submit" name="send_otp_gopay">Kirim OTP</button>
                    </div>
                    <div class="form-group">
                        <label>OTP</label>
                        <input type="tel" class="form-control" autocomplete="off" placeholder="2321" value="<?= $data_gopay['otp']?>" name="otp-gopay">
                        <button class="btn btn-primary mt-1" type="submit" name="confirm_otp_gopay">Konfirmasi OTP</button>
                    </div>
                    <div class="form-group">
                        <label>PIN</label>
                        <input type="tel" class="form-control" autocomplete="off" placeholder="2321" value="<?= $data_gopay['pin']?>" name="pin-gopay">
                        <button class="btn btn-primary mt-1" type="submit" name="auth_pin">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Akun OVO</h4>
            </div>
            <div class="card-body card-dashboard">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>NOMOR OVO</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="628xxxxxx" value="<?= $data_ovo['nomor']?>" name="phone">
                        <button class="btn btn-primary mt-1" type="submit" name="send_otp">Kirim OTP</button>
                    </div>
                    <div class="form-group">
                        <label>OTP</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="2321" value="<?= $data_ovo['otp']?>" name="otp">
                        <button class="btn btn-primary mt-1" type="submit" name="confirm_otp">Konfirmasi OTP</button>
                    </div>
                    <div class="form-group">
                        <label>PIN</label>
                        <input type="text" class="form-control" autocomplete="off" placeholder="2321" value="<?= $data_ovo['pin']?>" name="pin">
                    <button class="btn btn-primary mt-1" type="submit" name="auth_otp">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><br>
<?php include '../../layouts/footer.php'; ?>