<?php
session_start();
require_once '../mainconfig.php';
load('middleware', 'guest');
// load('middleware', 'csrf');
require_once '../mypulsaa.app/auth-login.php';
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
    <title><?= config('web', 'title_web') ?></title>
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
    <div class="app-content content ">
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

                        <?php unset($_SESSION['alert']);
                        } ?>
                        <div class="card mb-0">
                    <div class="card-body">
                    <div class="mb-3 text-center">
                            <img src="/assets/icon-dynamshop/icons/user.png" alt="" width="80">
                        </div>
                        </a>
                                <form method="POST" class="form form-vertical">
                                    <input type="hidden" id="csrf_token" name="csrf_token" value="<?= csrf_token() ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Username<font color="red" size="1rem">*</font></label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" class="form-control" name="user" id="user-name" placeholder="Username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between">
                                                    <label>Password<font color="red" size="1rem">*</font></label>
                                                </div>
                                                <div class="input-group form-password-toggle">
                                                    <input type="password" class="form-control" name="pass" id="user-name" placeholder="******">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox d-flex justify-content-between">
                                                    <input type="checkbox" name="remember" id="remember" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="remember">Remember me</label>
                                                    </label>
                                                </div>
                                                <br>
                                                <button style="background-color:#0D47A1;color:white;" type="submit" name="login" class="btn btn-block btn-inline">Masuk</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        </div>
                                    </div>
                                    <div class="login-footer">
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

    <script src="app-assets/js/scripts/pages/page-auth-login.js"></script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>

</html>