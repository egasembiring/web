<?php
session_start();
require_once '../mainconfig.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	if(!isset($_POST['phone'])) exit('Not Access!');
    if(is_numeric($_POST['phone'])) {
        $post_phone = $db->real_escape_string(e(@$_POST['phone']));
        $post_operator = strtr(strtoupper($SimCard->operator($post_phone)),['SMARTFREN' => 'SMART', 'THREE' => 'TRI']);
        
        if(strtolower($post_operator) <> 'unknown') {
            $cek_layanan = $db->query("SELECT * FROM layanan_pulsa WHERE operator LIKE '$post_operator%' AND tipe = 'PKIN' AND status = 'Normal' ORDER BY harga ASC");
            if($cek_layanan->num_rows > 0) {
                print '<option value="0">- Select One -</option>';
                while ($data_layanan = $cek_layanan->fetch_assoc()) {
                    print '<option value="'.$data_layanan['provider_id'].'">'.$data_layanan['layanan'].'</option>';
                }
            } else {
                print '<option value="0">Layanan tidak ditemukan</option>';
            }
        } else {
            print '<option value="0">Operator tidak dikenali</option>';
        }
    } else {
        print '<option value="0">Masukan nomer HP</option>';
    }
} else {$SimCard->operator();
	exit('Not Access!');
}