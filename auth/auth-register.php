<?php if(!isset($db)) print 'Error';

function CurL($url){
     $session = curl_init(); 
     curl_setopt($session, CURLOPT_URL, $url);
     curl_setopt($session, CURLOPT_RETURNTRANSFER, 1);
     $hasil = curl_exec($session);
     curl_close($session);
     $res = json_decode($hasil, true);
     return $res;
}

$ip = $_SERVER['REMOTE_ADDR'];
$sumber = CurL('http://www.geoplugin.net/json.gp?ip='.$_SERVER['REMOTE_ADDR']);

if (isset($_POST['register'])) {
    $post_name = $db->real_escape_string(e(@$_POST['name']));
    $post_email = $db->real_escape_string(e(@$_POST['email']));
    $post_phone = $db->real_escape_string(e(@$_POST['phone']));
    $post_user = $db->real_escape_string(e(@$_POST['username']));
    $post_pass = $db->real_escape_string(e(@$_POST['password']));
    $post_confirm_pass = $db->real_escape_string(e(@$_POST['confirm_password']));
    $post_refferal = $db->real_escape_string(e(@$_POST['refferal']));
    
    // Validation
    if (!$post_name || !$post_email || !$post_phone || !$post_user || !$post_pass || !$post_confirm_pass) {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Semua field harus diisi.'];
    } else if (strlen($post_user) < 5) {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Username minimal 5 karakter.'];
    } else if (strlen($post_pass) < 6) {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Password minimal 6 karakter.'];
    } else if ($post_pass !== $post_confirm_pass) {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Konfirmasi password tidak cocok.'];
    } else if (!filter_var($post_email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Format email tidak valid.'];
    } else if (!preg_match('/^[0-9]{10,15}$/', $post_phone)) {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Format nomor telepon tidak valid.'];
    } else {
        // Check if username already exists
        $check_username = $db->query("SELECT * FROM users WHERE username = '{$post_user}'");
        if (mysqli_num_rows($check_username) > 0) {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Username sudah terdaftar.'];
        } else {
            // Check if email already exists
            $check_email = $db->query("SELECT * FROM users WHERE email = '{$post_email}'");
            if (mysqli_num_rows($check_email) > 0) {
                $_SESSION['alert'] = ['danger', 'Failed!', 'Email sudah terdaftar.'];
            } else {
                // Check if phone already exists
                $check_phone = $db->query("SELECT * FROM users WHERE phone = '{$post_phone}'");
                if (mysqli_num_rows($check_phone) > 0) {
                    $_SESSION['alert'] = ['danger', 'Failed!', 'Nomor telepon sudah terdaftar.'];
                } else {
                    // Check refferal if provided
                    $uplink = '';
                    if ($post_refferal) {
                        $check_reff = $db->query("SELECT * FROM users WHERE username = '{$post_refferal}'");
                        if (mysqli_num_rows($check_reff) == 0) {
                            $_SESSION['alert'] = ['danger', 'Failed!', 'Kode refferal tidak valid.'];
                        } else {
                            $uplink = $post_refferal;
                        }
                    }
                    
                    if (!isset($_SESSION['alert'])) {
                        // Create account
                        $hashed_password = password_hash($post_pass, PASSWORD_DEFAULT);
                        $api_key = random(25);
                        $register_at = date('Y-m-d H:i:s');
                        $refferal_code = strtoupper(random(8));
                        
                        $insert_query = "INSERT INTO users VALUES (
                            '', 
                            '{$post_name}', 
                            '{$post_email}', 
                            '{$post_phone}', 
                            '{$post_user}', 
                            '{$hashed_password}', 
                            '0', 
                            '0', 
                            '0', 
                            '123456', 
                            '', 
                            'ON', 
                            '{$refferal_code}', 
                            'Member', 
                            'active', 
                            'YES', 
                            '{$uplink}', 
                            '{$api_key}', 
                            '0', 
                            '0', 
                            '{$register_at}'
                        )";
                        
                        if ($db->query($insert_query)) {
                            // Log registration
                            $address = $_SERVER['REMOTE_ADDR'];
                            $db->query("INSERT INTO user_notifications VALUES('','{$post_user}', 'Melakukan Registrasi','{$address}','{$_SERVER['HTTP_USER_AGENT']}', '".$sumber['geoplugin_city']." ".$sumber['geoplugin_countryCode']."', '', '','{$register_at}')");
                            
                            // Give bonus saldo for refferal
                            if ($uplink) {
                                $bonus_reff = 1000; // Bonus refferal
                                $db->query("UPDATE users SET saldo = saldo + {$bonus_reff} WHERE username = '{$uplink}'");
                                $db->query("INSERT INTO history_saldo VALUES('', '{$uplink}', '+', '{$bonus_reff}', 'Bonus Refferal dari {$post_user}', '{$register_at}')");
                            }
                            
                            $_SESSION['alert'] = ['success', 'Berhasil!', 'Akun berhasil dibuat. Silakan login.'];
                            redirect(2, base_url('/id/login'));
                        } else {
                            $_SESSION['alert'] = ['danger', 'Failed!', 'Gagal membuat akun. Silakan coba lagi.'];
                        }
                    }
                }
            }
        }
    }
}