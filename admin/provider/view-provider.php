<?php
require_once '../../mainconfig.php';

$id = $_GET['id'];
if(!isset($id))
    die('No direct script access allowed!');
$query = mysqli_query($db, "SELECT * FROM provider WHERE id = '$id'");
$q = mysqli_fetch_assoc($query); 
?>

<?php if ($q['code'] == 'AG') { ?>
<table style="font-size:0.8rem;border-collapse:separate;border-spacing:1px;">
<?php 
                        $check_data = $db->query("SELECT * FROM provider WHERE code = 'AG'");
                        $AG = $check_data->fetch_assoc();
                        $signature = md5($AG['merchant_id'].$AG['api_key']);
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                        CURLOPT_URL => $AG['link'].'merchant/'.$AG['merchant_id'].'?signature='.$signature,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',));
                        $chresult = curl_exec($curl);
                        //print_r($chresult);
                        curl_close($ch);
                        $json_result = json_decode($chresult, true);
                        ?>
        <tbody>
            <tr>
                <td style="font-size:14pt;">Saldo</td>
                <td style="font-size:14pt;">:</td>
                <td style="font-size:14pt;">Rp <?php echo number_format($json_result['data']['saldo'],0,',','.'); ?></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="row">
        <div class="form-group col-12">
            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"> BACK </button>
        </div>
    </div>
</form>
<?php } ?>
<?php if ($q['code'] == 'Tripay') { ?>
<table style="font-size:0.8rem;border-collapse:separate;border-spacing:1px;">
<?php 
$check_data = $db->query("SELECT * FROM provider WHERE code = 'Tripay'");
$TF = $check_data->fetch_assoc();
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://tripay.co.id/api/v2/ceksaldo/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$TF['api_key'],
    'Accept: application/json'
  ),
));

$response = curl_exec($curl);
                        curl_close($ch);
                        $json_result = json_decode($response, true);
                        ?>
        <tbody>
            <tr>
                <td style="font-size:14pt;">Saldo</td>
                <td style="font-size:14pt;">:</td>
                <td style="font-size:14pt;">Rp <?php echo number_format($json_result['data'],0,',','.'); ?></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="row">
        <div class="form-group col-12">
            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"> BACK </button>
        </div>
    </div>
</form>
<?php } ?>

<?php if ($q['code'] == 'DF') { ?>
    <table style="font-size:0.8rem;border-collapse:separate;border-spacing:1px;">
<?php
    $provider = $db->query("SELECT * FROM provider WHERE code = 'DF'");
    $DG = $provider->fetch_assoc();
    $DGS = md5($DG['api_id'].$DG['api_key'].'depo');
    $DG_data = json_encode([
        'cmd' => 'deposit',
        'username' => $DG['api_id'],
        'sign' => $DGS,
    ]);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $DG['link'].'cek-saldo',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $DG_data));
    $chresult = curl_exec($curl);
    $result = json_decode($chresult, true);
?>
        <tbody>
            <tr>
                <td style="font-size:14pt;">Saldo</td>
                <td style="font-size:14pt;">:</td>
                <td style="font-size:14pt;">Rp <?php echo number_format($result['data']['deposit'],0,',','.'); ?></td>
            </tr>
            
        </tbody>
    </table>
    <hr>
    <div class="row">
        <div class="form-group col-12">
            <a href="/admin/other/df-service.php?redirect=y" class="btn btn-relief-success">Get Layanan</a>
            <a href="/admin/other/status_action" class="btn btn-relief-danger">Delete Layanan</a>
            <br><br>
            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"> BACK </button>
        </div>
    </div>
<?php } ?>
