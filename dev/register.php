<?php
session_start();
require_once '../mainconfig.php';
load('middleware', 'guest');

// Handle registration form submission
if (isset($_POST['register'])) {
    $name = $db->real_escape_string(trim($_POST['name']));
    $email = $db->real_escape_string(trim($_POST['email']));
    $phone = $db->real_escape_string(trim($_POST['phone']));
    $username = $db->real_escape_string(trim($_POST['username']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($username) || empty($password)) {
        $_SESSION['alert'] = ['danger', 'Error!', 'Semua field harus diisi.'];
    } else if (strlen($username) < 4) {
        $_SESSION['alert'] = ['danger', 'Error!', 'Username minimal 4 karakter.'];
    } else if (strlen($password) < 6) {
        $_SESSION['alert'] = ['danger', 'Error!', 'Password minimal 6 karakter.'];
    } else if ($password !== $confirm_password) {
        $_SESSION['alert'] = ['danger', 'Error!', 'Konfirmasi password tidak cocok.'];
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['alert'] = ['danger', 'Error!', 'Format email tidak valid.'];
    } else {
        // Check if username already exists
        $check_username = $db->query("SELECT * FROM users WHERE username = '{$username}'");
        if (mysqli_num_rows($check_username) > 0) {
            $_SESSION['alert'] = ['danger', 'Error!', 'Username sudah digunakan.'];
        } else {
            // Check if email already exists
            $check_email = $db->query("SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($check_email) > 0) {
                $_SESSION['alert'] = ['danger', 'Error!', 'Email sudah digunakan.'];
            } else {
                // Hash password and create user
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $api_key = substr(md5(uniqid(rand(), true)), 0, 26);
                $cookie_token = md5(uniqid(rand(), true));
                $token = md5(uniqid(rand(), true));
                $register_date = date('Y-m-d H:i:s');
                
                $insert_user = $db->query("INSERT INTO users (
                    name, email, phone, username, password, saldo, poin, pemakaian, 
                    pin, ip_static, api_status, refferal, level, status, verif, 
                    uplink, api_key, cookie_token, token, register_at
                ) VALUES (
                    '{$name}', '{$email}', '{$phone}', '{$username}', '{$hashed_password}', 
                    0, 0, 0, '0', '', 'OFF', 'DEFAULT', 'Member', 'active', 'YES', 
                    'DYNMSHP', '{$api_key}', '{$cookie_token}', '{$token}', '{$register_date}'
                )");
                
                if ($insert_user) {
                    $_SESSION['alert'] = ['success', 'Berhasil!', 'Akun berhasil dibuat. Silakan login.'];
                    header("Location: login.php");
                    exit();
                } else {
                    $_SESSION['alert'] = ['danger', 'Error!', 'Gagal membuat akun. Silakan coba lagi.'];
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?= config('web', 'description') ?>">
    <meta name="keywords" content="<?= $data_reCapcha['keyworld']; ?>">
    <meta name="author" content="<?= config('web', 'author') ?>">
    <meta name="robots" content="index, follow">
    <title>Daftar - <?= config('web', 'title_web') ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= opt_get('aWNvbi13ZWI=') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/page-auth.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <?php if (isset($_SESSION['alert']) && $alert = $_SESSION['alert']) { ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-<?= $alert[0] ?>" role="alert">
                                        <h4 class="alert-heading"><?= $alert[1] ?></h4>
                                        <div class="alert-body"><?= $alert[2] ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php unset($_SESSION['alert']); } ?>
                        
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="mb-3 text-center">
                                    <img src="/assets/icon-dynamshop/icons/user.png" alt="" width="80">
                                    <h4 class="mt-2">Daftar Akun Baru</h4>
                                </div>
                                
                                <form method="POST" class="form form-vertical" id="register-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Nama Lengkap<font color="red">*</font></label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama lengkap" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Email<font color="red">*</font></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Nomor HP<font color="red">*</font></label>
                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Masukkan nomor HP" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Username<font color="red">*</font></label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required>
                                                <small class="text-muted">Minimal 4 karakter</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Password<font color="red">*</font></label>
                                                <div class="input-group form-password-toggle">
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                    </div>
                                                </div>
                                                <small class="text-muted">Minimal 6 karakter</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Konfirmasi Password<font color="red">*</font></label>
                                                <div class="input-group form-password-toggle">
                                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Ulangi password" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button style="background-color:#0D47A1;color:white;" type="submit" name="register" class="btn btn-block">Daftar</button>
                                        </div>
                                        <div class="col-12 text-center mt-2">
                                            <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });

        // Form validation
        $('#register-form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    minlength: 10
                },
                username: {
                    required: true,
                    minlength: 4
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "Nama harus diisi",
                    minlength: "Nama minimal 2 karakter"
                },
                email: {
                    required: "Email harus diisi",
                    email: "Format email tidak valid"
                },
                phone: {
                    required: "Nomor HP harus diisi",
                    minlength: "Nomor HP minimal 10 digit"
                },
                username: {
                    required: "Username harus diisi",
                    minlength: "Username minimal 4 karakter"
                },
                password: {
                    required: "Password harus diisi",
                    minlength: "Password minimal 6 karakter"
                },
                confirm_password: {
                    required: "Konfirmasi password harus diisi",
                    equalTo: "Password tidak cocok"
                }
            }
        });
    </script>
</body>

</html>