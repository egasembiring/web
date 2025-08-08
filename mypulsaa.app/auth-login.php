<?php if(!isset($db)) print 'Error';

function CurL($url){
     $session = curl_init(); 
     curl_setopt($session, CURLOPT_URL, $url);
     curl_setopt($session, CURLOPT_RETURNTRANSFER, 1);
     $hasil = curl_exec($session);
     curl_close($session);
     //print_r($hasil);
     $res = json_decode($hasil, true);
     return $res;
}
$ip = $_SERVER['REMOTE_ADDR'];
$sumber =  CurL('http://www.geoplugin.net/json.gp?ip='.$_SERVER['REMOTE_ADDR']);

if(isset($_COOKIE['cookie_token'])) {
	$data = $db->query("SELECT * FROM users WHERE cookie_token = '{$_COOKIE['cookie_token']}'");
	if(mysqli_num_rows($data) > 0) {
	    $hasil = mysqli_fetch_assoc($data);
		$_SESSION['user'] = $hasil;
		redirect(0,base_url());
	}
}
if (isset($_POST['login'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $post_user = $db->real_escape_string(secure_input($_POST['user'] ?? ''));
    $post_pass = $_POST['pass'] ?? '';
    
    // Check rate limiting
    if (isset($security) && !$security->checkLoginAttempts($ip, $post_user)) {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Terlalu banyak percobaan login. Coba lagi setelah 15 menit.'];
    } else if (!$post_user || !$post_pass) {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Username dan password harus diisi.'];
        if (isset($security)) {
            $security->recordFailedLogin($ip, $post_user);
        }
    } else {
        $check_user = $db->query("SELECT * FROM users WHERE username = '{$post_user}'");
        if (mysqli_num_rows($check_user) == 0) {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Username tidak terdaftar.'];
            if (isset($security)) {
                $security->recordFailedLogin($ip, $post_user);
                $security->logSecurityEvent('login_failed', "Failed login attempt for non-existent user: {$post_user}", 'warning');
            }
        } else {
            $data_user = $check_user->fetch_assoc();
            
            // Check if account is verified
            if ($data_user['verif'] == 'NO') {
                $_SESSION['alert'] = ['danger', 'Failed!', 'Akun belum diverifikasi. Silakan cek email Anda.'];
            } else if (password_verify($post_pass, $data_user['password']) === false) {
                $_SESSION['alert'] = ['danger', 'Failed!', 'Password salah.'];
                if (isset($security)) {
                    $security->recordFailedLogin($ip, $post_user);
                    $security->logSecurityEvent('login_failed', "Failed login attempt for user: {$post_user}", 'warning');
                }
            } else {
                // Successful login
                $create_token = bin2hex(random_bytes(32));
                $remember = isset($_POST['remember']) ? TRUE : false;
                
                if ($remember == TRUE) {
                    $cookie_token = bin2hex(random_bytes(32));
                    $db->query("UPDATE users SET cookie_token = '{$cookie_token}' WHERE username = '{$post_user}'");
                    setcookie('cookie_token', $cookie_token, time() + (86400 * 30), '/', '', true, true); // 30 days, secure, httponly
                } else {
                    $db->query("UPDATE users SET cookie_token = '0' WHERE username = '{$post_user}'");
                    setcookie('cookie_token', '', time() - 3600, '/'); // Delete cookie
                }
                
                // Update user data
                $login_at = date('Y-m-d H:i:s');
                $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
                
                // Log successful login
                $db->query("INSERT INTO user_notifications 
                           VALUES('', '{$data_user['username']}', 'Login Berhasil', '{$ip}', '{$user_agent}', 
                                  '".$sumber['geoplugin_city']." ".$sumber['geoplugin_countryCode']."', '', '', '{$login_at}')");
                
                $db->query("INSERT INTO agent VALUES('', '{$device}', '".get_client_browser()."')");
                $db->query("UPDATE users SET token = '{$create_token}' WHERE username = '{$post_user}'");
                
                // Set session with security measures
                $_SESSION['user'] = $data_user;
                $_SESSION['user_ip'] = $ip;
                $_SESSION['last_activity'] = time();
                
                if (isset($security)) {
                    $security->logSecurityEvent('login_success', "Successful login for user: {$post_user}", 'info');
                }
                
                $_SESSION['alert'] = ['success', 'Berhasil!', 'Login berhasil. Selamat datang!'];
                redirect(1, base_url());
            }
        }
    }
}