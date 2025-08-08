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
	</head>
	<body onload="geojson()">
	<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static light-layout <?= isset($guest) ? 'menu-collapsed' : ''; ?>" data-open="click" data-menu="vertical-menu-modern" data-col="content-right-siderbar">
		<nav class="header-navbar navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
			<div class="navbar-container d-flex content">
				<div class="bookmark-wrapper d-flex align-items-center">
					<ul class="nav navbar-nav d-xl-none">
						<li class="nav-item">
							<a class="nav-link menu-toggle " href="javascript:void(0);">
								<i class="ficon mr-1" data-feather="align-left"></i>
							</a>
						</li>
					</ul>
				</div>
				<ul class="nav navbar-nav align-items-center ml-auto">
				    <li class="nav-item">
					    <img style="max-width: 50px;" src="<?= opt_get('bG9nb19ndWVzdA==') ?>">
					</li>
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
	                        <h2 style="color:#7367F0;" class="brand-text mt-1">STORE ID</h2>
	                    </a>
	                </li>
	                <li class="nav-item nav-toggle mt-1 mr-1">
	                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
	                        <i style="color:#000;" class="d-block d-xl-none toggle-icon font-medium-4" data-feather="arrow-left-circle"></i>
	                        <i style="color:#0d47a1;" class="d-none d-xl-block collapse-toggle-icon font-medium-4" data-feather="disc" data-ticon="disc"></i>
	                    </a>
	                </li>
                </ul>
			</div>

			<div class="shadow-bottom"></div>

			<div class="main-menu-content">
				<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
					<li class=" navigation-header">
					 <span>Dashboard</span>
						<i data-feather="more-horizontal"></i>
					</li>
					<?php if ($_SESSION['user']['level'] == 'Lock' || $_SESSION['user']['level'] == 'Admin') : ?>
					<li class="nav-item <?= (uri() == '/') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url() ?>">
							<i style="color:#000;" data-feather="check-circle"></i>
							<span class="menu-title text-truncate" data-i18n="Admin">Admin Akses</span>
						</a>
					</li>
					<?php endif; ?>
					<li class="nav-item <?= (uri() == '/id') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/id') ?>">
							<i style="color:#000;" data-feather="home"></i>
							<span class="menu-title text-truncate" data-i18n="Home">Home</span>
						</a>
					</li>
					<li class="nav-item <?= (uri() == '/id/check') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/id/check') ?>">
							<i style="color:#000;" data-feather="search"></i>
							<span class="menu-title text-truncate" data-i18n="Check">Cek Transaksi</span>
						</a>
					</li>
					  <li class="nav-item <?= (uri() == '/page/price_list') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/page/price_list') ?>">
							<i style="color:#000;" data-feather="tag"></i>
							<span class="menu-title text-truncate" data-i18n="Daftar Harga">Daftar Harga</span>
						</a>
					</li>
					<?php if (isset($guest) && $guest === true): ?>
					<li class=" navigation-header">
						<span>Akun</span>
						<i data-feather="more-horizontal"></i>
					</li>
					<li class="nav-item <?= (uri() == '/id/login') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/id/login') ?>">
							<i style="color:#000;" data-feather="log-in"></i>
							<span class="menu-title text-truncate" data-i18n="Login">Login</span>
						</a>
					</li>
					<li class="nav-item <?= (uri() == '/id/register') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/id/register') ?>">
							<i style="color:#000;" data-feather="user-plus"></i>
							<span class="menu-title text-truncate" data-i18n="Register">Daftar</span>
						</a>
					</li>
					<?php endif; ?>
					<li class=" navigation-header">
						<span>Pusat Bantuan</span>
					<li class="nav-item <?= (uri() == '/page/mitra') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/page/terms') ?>">
							<i style="color:#000;" data-feather="bookmark"></i>
							<span class="menu-title text-truncate" data-i18n="Faq">Ketentuan</span>
						</a>
					</li>
					<li class="nav-item <?= (uri() == '/page/faq') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/page/faq') ?>">
							<i style="color:#000;" data-feather="pocket"></i>
							<span class="menu-title text-truncate" data-i18n="Faq">FAQ</span>
						</a>
					</li>
					<li class="nav-item <?= (uri() == '/page/contact_us') ? 'active':'' ?>">
						<a class="d-flex align-items-center" href="<?= base_url('/page/contact_us') ?>">
							<i style="color:#000;" data-feather="message-square"></i>
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