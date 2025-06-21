
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?= $_CONFIG['description'] ?>">
    <meta name="author" content="<?= $_CONFIG['title'] ?>">
    <meta name="keyword" content="<?= $_CONFIG['keyword'] ?>">
    
    <title><?= $_CONFIG['title'] ?> | <?= $page ?></title>
    
    <link rel="apple-touch-icon" href="<?= $_CONFIG['logo'] ?>">
    <link rel="shortcut icon" href="<?= $_CONFIG['ico'] ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= $url ?>global/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url ?>global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?= $url ?>assets/css/site.min.css">
    <link rel="stylesheet" href="<?= $url ?>assets/examples/css/uikit/progress-bars.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?= $url ?>global/vendor/blueimp-file-upload/jquery.fileupload.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/dropify/dropify.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/chartist/chartist.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
        <link rel="stylesheet" href="<?= $url ?>assets/examples/css/dashboard/v1.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/slick-carousel/slick.css">
        <link rel="stylesheet" href="<?= $url ?>assets/examples/css/pages/profile-v2.css">
        <link rel="stylesheet" href="<?= $url ?>assets/examples/css/uikit/carousel.css">
    <link rel="stylesheet" href="<?= $url ?>assets/examples/css/uikit/icon.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/plyr/plyr.css">
    <link rel="stylesheet" href="<?= $url ?>assets/examples/css/pages/invoice.css">
    <link rel="stylesheet" href="<?= $url ?>global/fonts/glyphicons/glyphicons.css">
    <!-- Start Script Morris Chart -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="<?= $url ?>global/fonts/font-awesome/font-awesome.css">
        <link rel="stylesheet" href="<?= $url ?>global/fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="<?= $url ?>global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="<?= $url ?>global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <link rel="stylesheet" href="<?= $url ?>global/vendor/toastr/toastr.css">
        <link rel="stylesheet" href="<?= $url ?>assets/examples/css/advanced/toastr.css">
    <link rel="stylesheet" href="<?= $url ?>global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
        <link rel="stylesheet" href="<?= $url ?>global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
        <link rel="stylesheet" href="<?= $url ?>assets/examples/css/tables/datatable.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.7.95/css/materialdesignicons.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <!--[if lt IE 9]>
    <script src="global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="global/vendor/media-match/media.match.min.js"></script>
    <script src="global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="<?= $url ?>global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-expand-md bg-blue-600" role="navigation">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo" src="<?= $_CONFIG['logo'] ?>" title="<?= $_CONFIG['title'] ?>">
          <span class="navbar-brand-text hidden-xs-down"> <?= $_CONFIG['title'] ?></span>
        </div>
      </div>
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
          </ul>
          <!-- End Navbar Toolbar -->
    
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="<?= $url ?>assets/images/profile/<?= $data_photo['photo'] ?>" alt="<?= $data_user['name'] ?>">
                  <i></i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="<?= $url ?>riwayat/login" role="menuitem"><i class="icon fa-history" aria-hidden="true"></i> Log User</a>
                <a class="dropdown-item" href="<?= $url ?>account/setting" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                <div class="dropdown-divider" role="presentation"></div>
                <a class="dropdown-item" href="<?= $url ?>logout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
              </div>
            </li>
            <?php
            $count = $connect->query("SELECT * FROM mutation WHERE user = '$sess_username' AND date = '$date' ORDER BY id DESC LIMIT 5")->num_rows;
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon wb-bell" aria-hidden="true"></i>
                <span class="badge badge-pill badge-danger up"><?= $count; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <div class="dropdown-menu-header">
                  <h5>NOTIFICATIONS</h5>
                  <span class="badge badge-round badge-danger"><?= $count ? 'New '.$count : '0'; ?></span>
                </div>
                <?php
					$no = 1;
					$check_mutation = $connect->query("SELECT * FROM mutation WHERE user = '$sess_username' AND date = '$date' ORDER BY id DESC LIMIT 5"); // edit
					while ($data_mutation = mysqli_fetch_assoc($check_mutation)) {
					if($data_mutation['kategori'] == "Transaksi" && $data_mutation['type'] == "-") {
						$icon = "wb-order";
						$color = "red";
					} else if($data_mutation['kategori'] == "Transaksi" && $data_mutation['type'] == "+") {
						$icon = "wb-order";
						$color = "green";
					} else if($data_mutation['kategori'] == "Deposit" && $data_mutation['type'] == "-") {
						$icon = "fa-money";
						$color = "red";
					} else if($data_mutation['kategori'] == "Deposit" && $data_mutation['type'] == "+") {
						$icon = "fa-money";
						$color = "green";
					} else if($data_mutation['kategori'] == "Tarik Komisi" && $data_mutation['type'] == "+") {
						$icon = "fa-credit-card";
						$color = "red";
					} else if($data_mutation['kategori'] == "Tarik Komisi" && $data_mutation['type'] == "+") {
						$icon = "fa-credit-card";
						$color = "green";
					} else if($data_mutation['kategori'] == "Komisi Transaksi" && $data_mutation['type'] == "+") {
						$icon = "fa-credit-card-alt";
						$color = "red";
					} else if($data_mutation['kategori'] == "Komisi Transaksi" && $data_mutation['type'] == "+") {
						$icon = "fa-credit-card-alt";
						$color = "green";
					} else {
						$icon = "wb-settings";
						$color = "blue";
					}
				?>
                <div class="list-group">
                  <div data-role="container">
                    <div data-role="content">
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon <?= $icon; ?> bg-<?=$color;?>-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading"><?=$data_mutation['note'];?> Rp.<?= currency($data_mutation['amount']) ?></h6>
                            <time class="media-meta" datetime="2018-06-12T20:50:48+08:00"><?= format_date('en',$data_mutation['date'],$data_mutation['time']) ?></time>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <?php
			    $no++;
                }
                ?>
                <div class="dropdown-menu-footer">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    All notifications
                  </a>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $url.'page/news' ?>">
                <i class="icon wb-info-circle" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
      </div>
    </nav>
    <div class="site-menubar">
    <?php if (isset($_SESSION['user'])) { ?>
      <div class="site-menubar-body">
        <div>
          <div>
            <ul class="site-menu" data-plugin="menu">
              <li class="site-menu-category">General</li>
              <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">Dashboard</span>
                </a>
                <ul class="site-menu-sub">
                  <li class="site-menu-item">
                    <a class="animsition-link" href="<?= $url ?>">
                      <span class="site-menu-title">Dashboard</span>
                    </a>
                  </li>
                <?php if ($data_user['level'] == "Admin") { ?>
                  <li class="site-menu-item">
                    <a class="animsition-link" href="<?= $url ?>admin/">
                      <span class="site-menu-title">Dashboard Admin</span>
                    </a>
                  </li>
                <?php } ?>
                </ul>
              </li>
              <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-user-circle" aria-hidden="true"></i>
                    <span class="site-menu-title">Menu <?= $data_user['level'] ?></span>
                </a>
                <ul class="site-menu-sub">
                <?php if ($data_user['level'] == "Basic") { ?>
                  <li class="site-menu-item">
                    <a class="animsition-link" href="javascript:;" data-target="#basic" data-toggle="modal">
                      <span class="site-menu-title">Upgrade User</span>
                    </a>
                  </li>
                <?php } else { ?>
                  <li class="site-menu-item">
                    <a class="animsition-link" href="<?= $url ?>page/voucher">
                      <span class="site-menu-title">Create Voucher</span>
                    </a>
                  </li>
                  <li class="site-menu-item">
                    <a class="animsition-link" href="<?= $url ?>deposit/transfer-saldo">
                      <span class="site-menu-title">Transfer Saldo</span>
                    </a>
                  </li>
                  <li class="site-menu-item">
                    <a class="animsition-link" href="<?= $url ?>premium/tarik-komisi">
                      <span class="site-menu-title">Tarik Komisi</span>
                    </a>
                  </li>
                <?php } ?>
                </ul>
              </li>

              <li class="site-menu-category">Transaksi</li>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>riwayat/transaksi">
                    <i class="site-menu-icon fa-history" aria-hidden="true"></i>
                    <span class="site-menu-title">Riwayat Transaksi</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>riwayat/isi-saldo">
                    <i class="site-menu-icon fa-history" aria-hidden="true"></i>
                    <span class="site-menu-title">Riwayat Isi Saldo</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>riwayat/mutasi-saldo">
                    <i class="site-menu-icon fa-history" aria-hidden="true"></i>
                    <span class="site-menu-title">Cut Balance</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>page/daftar-harga">
                    <i class="site-menu-icon fa-reorder" aria-hidden="true"></i>
                    <span class="site-menu-title">Daftar Harga</span>
                </a>
              </li>
              
              <li class="site-menu-category">Saldo</li>
              <?php if ($data_user['level'] == "Premium") { ?>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>deposit/tarik-saldo">
                    <i class="site-menu-icon fa-random" aria-hidden="true"></i>
                    <span class="site-menu-title">Transfer ke Bank</span>
                </a>
              </li>
              <?php } else if ($data_user['level'] == "Admin") { ?>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>deposit/tarik-saldo">
                    <i class="site-menu-icon fa-random" aria-hidden="true"></i>
                    <span class="site-menu-title">Transfer ke Bank</span>
                </a>
              </li>
              <?php } ?>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>deposit/">
                    <i class="site-menu-icon fa-credit-card-alt" aria-hidden="true"></i>
                    <span class="site-menu-title">Isi Saldo</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>deposit/redeem">
                    <i class="site-menu-icon fa-gift" aria-hidden="true"></i>
                    <span class="site-menu-title">Reedem Voucher</span>
                </a>
              </li>
              
              <li class="site-menu-category">Lainnya</li>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>referral/">
                    <i class="site-menu-icon fa-users" aria-hidden="true"></i>
                    <span class="site-menu-title">Referral</span>
                </a>
              </li>
              <?php if ($data_user['level'] == "Premium") { ?>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>page/dokumentasi-api">
                    <i class="site-menu-icon fa-code" aria-hidden="true"></i>
                    <span class="site-menu-title">Dokumentasi Api</span>
                </a>
              </li>
              <?php } else if ($data_user['level'] == "Admin") { ?>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>page/dokumentasi-api">
                    <i class="site-menu-icon fa-code" aria-hidden="true"></i>
                    <span class="site-menu-title">Dokumentasi Api</span>
                </a>
              </li>
              <?php } ?>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="https://api.whatsapp.com/send?phone=<?= $_CONFIG['nohp'] ?>&text=Saya%20Butuh%20Bantuan" target="blank_">
                    <i class="site-menu-icon wb-inbox" aria-hidden="true"></i>
                    <span class="site-menu-title">Layanan Bantuan</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>page/syarat-ketentuan">
                    <i class="site-menu-icon fa-shield" aria-hidden="true"></i>
                    <span class="site-menu-title">Syarat & Ketentuan</span>
                </a>
              </li>
              <li class="site-menu-item has-sub">
                <a class="animsition-link" href="<?= $url ?>page/hubungi-kami">
                    <i class="site-menu-icon fa-volume-control-phone" aria-hidden="true"></i>
                    <span class="site-menu-title">Hubungi Kami</span>
                </a>
              </li>
            </ul>
            </div>
        </div>
      </div>
      <?php } ?>
    
      <!--<div class="site-menubar-footer">
        <a href="<?= $url ?>account/setting" class="fold-show" data-placement="top" data-toggle="tooltip"
          data-original-title="Settings">
          <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="<?= $url ?>riwayat/login" data-placement="top" data-toggle="tooltip" data-original-title="Log user">
          <span class="icon fa-history" aria-hidden="true"></span>
        </a>
        <a href="<?= $url ?>logout" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
          <span class="icon wb-power" aria-hidden="true"></span>
        </a>
      </div> -->
      </div>
      <div class="site-gridmenu">
      <div>
        <div>
          <ul>
            <li>
              <a href="<?= $url ?>">
                <i class="icon wb-dashboard"></i>
                <span>Dashboard</span>
              </a>
              <?php if ($data_user['level'] == "Admin") { ?>
              <a href="<?= $url ?>admin/">
                <i class="icon wb-dashboard"></i>
                <span>Dashboard Admin</span>
              </a>
              <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
