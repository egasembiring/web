<?php defined("BASEPATH") or exit("No direct script access allowed."); ?>
<?php
$start_time = microtime(TRUE); if (isset($_SESSION['user'])) {
	$check_notifications = $db->query("SELECT * FROM user_notifications WHERE username = '{$_SESSION['user']['username']}' ORDER BY created_at DESC LIMIT 5");
} 

$check_reCapcha = $db->query("SELECT * FROM reCapcha WHERE id = '1'");
$data_reCapcha = $check_reCapcha->fetch_assoc();

function level($s) {
    if ($s === "Admin") {
        return 'Admin <i class="mdi mdi-checkbox-multiple-marked-circle text-success"></i> ';
    } else if ($s === "Reseller") {
        return 'Reseller <i class="mdi mdi-checkbox-multiple-marked-circle text-success"></i> ';
    } else if ($s === "Premium") {
        return 'Premium <i class="mdi mdi-checkbox-multiple-marked-circle text-success"></i> ';
    } else if ($s === "H2H Special") {
        return 'H2H Special <i class="mdi mdi-checkbox-multiple-marked-circle text-success"></i> ';
    } else if ($s === "Member") {
        return 'Member';
    } else {
        return 'Lock <i class="mdi mdi-lock text-danger"></i>';
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
	    <title><?= config('web', 'title_web') ?></title>
	    
        <link rel="shortcut icon" type="image/x-icon" href="<?= opt_get('aWNvbi13ZWI=') ?>">
	    <link rel="stylesheet" href="<?= asset('/fonts/Montserrat.css?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600') ?>">

	    <!-- BEGIN: Page Vendor CSS -->	
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/animate/animate.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/charts/apexcharts.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/editors/quill/katex.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/dragula.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/jquery.contextMenu.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/jquery.rateyo.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/jstree.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/nouislider.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/plyr.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/shepherd.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/sweetalert2.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/swiper.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/tether-theme-arrows.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/tether.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/extensions/toastr.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/file-uploaders/dropzone.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/forms/select/select2.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/forms/wizard/bs-stepper.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/maps/leaflet.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/maps/maps-leaflet.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/pickers/flatpickr/flatpickr.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/pickers/pickadate/pickadate.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/tables/datatable/buttons.bootstrap4.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/tables/datatable/datatables.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/tables/datatable/responsive.bootstrap.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/tables/datatable/responsive.bootstrap4.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/doku.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/prism.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= asset('/vendors/css/popup.css') ?>">
            
	    <!-- BEGIN: Theme CSS-->
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/bootstrap.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/bootstrap-extended.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/colors.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/components.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/themes/dark-layout.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/themes/bordered-layout.min.css') ?>">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.7.95/css/materialdesignicons.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">

	    <!-- BEGIN: Page CSS-->
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/core/menu/menu-types/vertical-menu.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/pages/app-invoice.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/pages/app-file-manager.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/pages/app-invoice-list.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/pages/page-pricing.min.css') ?>">
	    
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/plugins/charts/chart-apex.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/pages/dashboard-ecommerce.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/plugins/forms/pickers/form-flat-pickr.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/plugins/extensions/ext-component-tree.min.css') ?>">
	    <link rel="stylesheet" type="text/css" href="<?= asset('/css/plugins/extensions/ext-component-toastr.min.css') ?>">
	    <link href="https://cdn.materialdesignicons.com/5.3.45/css/materialdesignicons.min.css" rel="stylesheet">
	    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" rel="stylesheet">
	    
	    <!-- BEGIN: Custom CSS & JS -->
	    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	    <style type="text/css"> .copy { cursor: pointer; } </style>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>	    
            <!--<script async='async' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>-->
            
        <?php if (isset($guest)): ?>
        <style>
            .header-navbar.floating-nav {
                border-radius: 0;
                margin: 0 !important;
                width: 100% !important;
            }
            
            @media only screen and (min-width: 600px) {
                nav.header-navbar.navbar {
                    padding-left: 78px;
                }
            }
        </style>
        <?php else: ?>
        <style>
            .fo-menu {
                background: #fff;
                position: fixed;
                width: 100%;
                padding: 10px 10px 0 10px;
                bottom: 0;
                text-align: center;
                border-top: 1px solid #edebeb;
                display: none;
                left: 0;
            }
            .fo-item {
                padding-top: 3px;
                padding-bottom: 6px;
                border-bottom: 3px solid #fff;
                width: 19%;
                display: inline-block;
                text-align: center;
            }
            .fo-item i {
                display: block;
                margin-bottom: 5px;
                color: #6E6B7B;
            }
            .fo-item span {
                display: block;
                font-size: 11px;
                font-weight: 500;
                color: #6E6B7B;
            }
            .fo-icon-center {
                background: #8f86f3;
                height: 46px;
                width: 46px;
                position: relative;
                margin: -40px auto 10px;
                text-align: center;
                border-radius: 50%;
                font-size: 19px;
            }
            .fo-icon-center i {
                color: #fff;
                padding-top: 12px;
            }
            .fo-item.active {
                border-color: #8f86f3;
            }
            @media only screen and (max-width: 600px) {
                .fo-menu {
                    display: block;
                }
                html .content.app-content {
                    padding-bottom: 80px !important;
                }
            }
        </style>
        <?php endif; ?>
	</head>
	<body onload="geojson()">
	<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static light-layout <?= isset($guest) ? 'menu-collapsed' : ''; ?>" data-open="click" data-menu="vertical-menu-modern" data-col="content-right-siderbar">
		<nav class="header-navbar navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
			<div class="navbar-container d-flex content">
				<div class="bookmark-wrapper d-flex align-items-center">
					<ul class="nav navbar-nav d-xl-none">
						<li class="nav-item">
							<a class="nav-link menu-toggle " href="javascript:void(0);">
								<i class="ficon mr-1" data-feather="menu"></i>
								<?php if (isset($guest)): ?>
								<img style="max-width: 50px;" src="<?= opt_get('bG9nb19ndWVzdA==') ?>">
								<?php endif; ?>
							</a>
						</li>
					</ul>
				</div>
				<ul class="nav navbar-nav align-items-center ml-auto">
				    <?php if (isset($guest)): ?>
				    <li class="nav-item">
				        <a class="nav-link" href="/id/check.php">
				            <i class="ficon" data-feather="search"></i>
				        </a>
				    </li>
				    <?php else: ?>
					<?php endif; ?>
					<?php if (!isset($guest)): ?>
				    <?php endif; ?>
					<?php if (isset($_SESSION['user'])) { ?>
					<?php if (!isset($guest)): ?>
					<li class="nav-item dropdown dropdown-notification mr-25">
						<a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge badge-pill badge-primary badge-glow badge-up"><?= mysqli_num_rows($check_notifications) ?></span></a>
						<ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
							<li class="dropdown-menu-header">
	                            <div class="dropdown-header d-flex">
	                                <h4 class="notification-title mb-0 mr-auto">Notifikasi</h4>
	                                <div class="badge badge-pill badge-light-primary"><?= mysqli_num_rows($check_notifications) ?> Baru</div>
	                            </div>
	                        </li>
	                        <li class="scrollable-container media-list">
		                        <?php while ($data_notification = $check_notifications->fetch_assoc()) { ?>
		                        <a class="d-flex" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left">
                                            <div class="avatar bg-light-success">
                                                <div class="avatar-content"><i class="fas fa-bullhorn"></i></div>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <p class="media-heading">
                                                <span class="font-weight-bolder"><?= $data_notification['title'] ?></span>
                                                <small class="float-right"><?= time_elapsed_string($data_notification['created_at']) ?></small>
                                            </p>
                                            <small class="notification-text"><?= $data_notification['message'] ?></small>
                                        </div>
                                    </div>
                                </a>
		                        <?php } ?>
		                    </li>
		                    <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="<?= base_url('/account/aktifitas_login') ?>">Tampilkan Semua</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown dropdown-user">
						<a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div class="user-nav d-sm-flex d-none">
	                            <span class="user-name font-weight-bolder limited-text" style="white-space:nowrap;overflow:ellipsis;max-width:8ch;"><?= $_SESSION['user']['name'] ?></span>
	                            <span class="user-status"><?= level(e($_SESSION['user']['level'])) ?></span>
	                        </div>
	                        &nbsp;&nbsp;&nbsp;<span class="avatar">
	                            <img class="round" src="/assets/icon-dynamshop/icons/user.png" alt="avatar" height="40" width="40">
	                        </span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
	                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url('/account/logout') ?>">
	                            <i class="mr-50" data-feather="power"></i> Logout
	                        </a>
						</div>
					</li>
					<?php endif; ?>
					<?php } ?>
				</ul>
			</div>
		</nav>
		
		<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mr-auto">
	                    <a class="navbar-brand" href="">
	                        <span class="brand-logo">
	                        </span>
	                        <h2 class="brand-text text-primary"></h2>
	                    </a>
	                </li>
	                <li class="nav-item nav-toggle">
	                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
	                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
	                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
	                    </a>
	                </li>
                </ul>
			</div>

			<div class="shadow-bottom"></div>

			<div class="main-menu-content">
				<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
					<li class=" navigation-header">
						<i data-feather="more-horizontal"></i>
					</li>
					<?php if ($_SESSION['user']['level'] == 'Lock' || $_SESSION['user']['level'] == 'Admin') : ?>
					<li class="nav-item <?= (uri() == '/') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url() ?>">
							<i class="text-warning" data-feather="check-circle"></i>
							<span class="menu-title text-truncate" data-i18n="Admin">Admin Akses</span>
						</a>
					</li>
					<?php endif; ?>
					<li class="nav-item <?= (uri() == '/id') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/') ?>">
							<i data-feather="home"></i>
							<span class="menu-title text-truncate" data-i18n="Home">Home</span>
						</a>
					</li>
					<li class="nav-item <?= (uri() == '/id/check') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/id/check') ?>">
							<i data-feather="search"></i>
							<span class="menu-title text-truncate" data-i18n="Check">Cek Transaksi</span>
						</a>
					</li>
					  <li class="nav-item <?= (uri() == '/page/price_list') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/page/price_list') ?>">
							<i data-feather="tag"></i>
							<span class="menu-title text-truncate" data-i18n="Daftar Harga">Daftar Harga</span>
						</a>
					</li>
					<li class=" navigation-header">
						<span>Pusat Bantuan</span>
					<li class="nav-item <?= (uri() == '/page/mitra') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/page/terms') ?>">
							<i class="text-dark" data-feather="bookmark"></i>
							<span class="menu-title text-truncate" data-i18n="Faq">Ketentuan</span>
						</a>
					</li>
					<li class="nav-item <?= (uri() == '/page/contact_us') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/page/contact_us') ?>">
							<i class="text-primary" data-feather="message-square"></i>
							<span class="menu-title text-truncate" data-i18n="Kontak Kami">Kontak Kami</span>
						</a>
					</li>
					
				</ul>
			</div>
		</div>

		<div class="app-content content ">
			<div class="content-overlay"></div>
        	<div class="header-navbar-shadow"></div>
        	<div class="content-wrapper">
        		<div class="content-header row"></div>
        		<div class="content-body">
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