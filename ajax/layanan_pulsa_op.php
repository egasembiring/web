<?php
session_start();
require_once '../mainconfig.php';

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	if(!isset($_POST['phone'])) exit('Not Access!');
    if(is_numeric($_POST['phone'])) {
        $post_phone = $db->real_escape_string(e(@$_POST['phone']));
        $post_operator = strtr(strtoupper($SimCard->operator($post_phone)),['SMARTFREN' => 'SMART', 'THREE' => 'TRI']);
        
        if(strtolower($post_operator) <> 'unknown') {
            $cek_layanan = $db->query("SELECT * FROM layanan_pulsa WHERE operator LIKE '$post_operator%' AND tipe = 'PULSA' AND status = 'Normal' ORDER BY harga ASC");
            if($cek_layanan->num_rows > 0) {
                if (!isset($_POST['kostum'])) {
                    print '<option value="0">- Select One -</option>';
                }
                while ($data_layanan = $cek_layanan->fetch_assoc()) {
                    if (!isset($_POST['kostum'])) {
                        print '<option value="'.$data_layanan['provider_id'].'">'.$data_layanan['layanan'].'</option>';
                    } else {
                        $onid = "'" .$data_layanan['provider_id']. "'";
                        
                        if ($data_user['level'] === 'Member') {
                            $price = $data_layanan['harga'];
                        } else if ($data_user['level'] === 'Reseller') {
                            $price = $data_layanan['harga_api'];
                        } else if ($data_user['level'] === 'Premium') {
                            $price = $data_layanan['harga_premium'];
                        } else {
                            $price = $data_layanan['harga_h2h'];
                        }
                        
                        echo '
                        <div class="col-md-3 col-6 list-produk">
                            <div class="bg-primary rounded p-1 text-white mb-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" onchange="note('.$onid.')" name="layanan" id="produk-'.$data_layanan['provider_id'].'" value="'.$data_layanan['provider_id'].'">
                                    <label class="form-check-label text-white" for="produk-'.$data_layanan['provider_id'].'">
                                        <b>'.$data_layanan['layanan'].'</b>
                                    </label>
                                </div>
                                <div style="font-size: 11px;padding: 5px 8px;border: 2px solid #fff;margin-top: 8px;">
                                    <b>Harga:</b> '.number_format($price,0,',','.').'
                                </div>
                            </div>
                        </div>
                        ';
                    }
                }
            } else {
                if (isset($_POST['kostum'])) {
                    print '<div class="col-md-12"><div class="alert p-1 rounded alert-dark">Layanan tidak ditemukan</div></div>';
                } else {
                    print '<option value="0">Layanan tidak ditemukan</option>';
                }
            }
        } else {
            if (isset($_POST['kostum'])) {
                print '<div class="col-md-12"><div class="alert p-1 rounded alert-info">Operator tidak dikenali</div></div>';
            } else {
                print '<option value="0">Operator tidak dikenali</option>';
            }
        }
    } else {
        if (isset($_POST['kostum'])) {
            print '<div class="col-md-12"><div class="alert p-1 rounded alert-danger">Masukkan nomer ponsel Anda</div></div>';
        } else {
            print '<option value="0">Masukan nomer HP</option>';
        }
    }
} else {$SimCard->operator();
	exit('Not Access!');
}