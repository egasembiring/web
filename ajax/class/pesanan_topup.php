<?php
session_start();
require_once '../../mainconfig.php';

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    $data = [];
    $query = mysqli_query($db, "SELECT * FROM pembelian_pulsa WHERE user = '$session' AND tipe = 'TopUp' ORDER BY id DESC");
    while($fetch = mysqli_fetch_assoc($query)) {
        
        $js_text = "'Detail Pesanan'";
        $js_url = "'".base_url()."/ajax/detail_pesanan_pulsa?id=".$fetch['id']."'";
        $txt_salin = "'input-target-" . $fetch['id']. "'";
        
        if ($fetch['status'] == 'Pending') {
            $icon = '<i class="fas fa-clock text-warning mr-1"></i>';
        } else if ($fetch['status'] == 'Success') {
            $icon = '<i class="far fa-check-circle text-success mr-1"></i>';
        } else {
            $icon = '<i class="far fa-times-circle text-danger mr-1"></i>';
        }
        
        $data[] = [
            format_date('id', $fetch['tanggal']),
            $fetch['layanan'] . '<br><small class="text-primary">'.$icon.'Trx : ' . $fetch['oid'] . '</small>',
            '<div class="input-group">
                <input type="text" id="input-target-'.$fetch['id'].'" class="form-control form-control-sm" readonly value="'.$fetch['target'].'">
                <button onclick="salin('.$txt_salin.');" class="btn btn-warning btn-sm" style="border-top-left-radius: 0;border-bottom-left-radius: 0;"><i class="far fa-copy"></i></button>
            </div>',
            'Rp ' . number_format($fetch['harga'],0,',','.'),
            '<a href = "javascript:;" onclick="modal('.$js_text.','.$js_url.')" class=""><center><i class="btn btn-primary text-white"><i class="fas fa-qrcode"></i></a></center></a>'
        ];
    }
    
    print_r(json_encode(['data' => $data]));
} else {
	exit("No direct script access allowed!");
}