<?php
define("BASEPATH", __DIR__.'/system/');

// application configuration
$_CONFIG = [
	'db' => [ // database
		'host' => 'localhost', // host
		'username' => 'gotopupm_topupgame', // username
		'password' => 'gotopupm_topupgame', // password
		'name' => 'gotopupm_topupgame' // name
	],
];

require_once BASEPATH.'helpers/SimCardDetector.php';
require_once BASEPATH.'core.php';
require_once BASEPATH.'helpers/db.php';

$_CONFIG = array_merge($_CONFIG, [
    'web' => [ // website
		'environment' => 'development', // development or production
		'url' => 'https://gotopup.my.id', // url without '/' in end
		'assets' => 'https://gotopup.my.id/assets', // assets url without '/' in end
		'title' => opt_get('dGl0bGVfd2Vi'), // title
        'title_web' => opt_get('dGl0bGU='), // title web
		'description' => opt_get('ZGVzY3JpcHRpb24='), // description
		'keywords' => opt_get('a2V5d29yZHM='), // description
		'author' => opt_get('YXV0aG9y'), // author
		'timezone' => 'Asia/Jakarta' // timezone                                
	]
]);

$fo_active = 'none';
require_once 'auth/data_ex.php';
require_once 'cron/custom/date_at.php';
$level_list = ['member', 'reseller', 'premium', 'h2hspecial'];

$fo_menus = [
    [
        'link' => '/',
        'fa' => 'fa fa-home',
        'text' => 'Home',
    ],
    [
        'link' => '/riwayat/pesanan_pulsa',
        'fa' => 'fa fa-shopping-basket',
            'text' => 'Riwayat',
    ],
    [
        'link' => '/deposit/new',
        'fa' => 'fa fa-wallet',
        'text' => 'Deposit',
    ],
    [
        'link' => '/account/mutasi_saldo',
        'fa' => 'fa fa-credit-card',
        'text' => 'Mutasi',
    ],
    [
        'link' => '/account/pengaturan_akun',
        'fa' => 'far fa-user-circle',
        'text' => 'Profile',
    ],
];

function magic_level($level) {
    return strtolower(str_replace(' ', '', $level));
}

if(isset($_SESSION['user']['username']) && $_SESSION['user']['level'] !== 'Admin' && $data_reCapcha['maintenance'] == 'false') {
    require 'layouts/header_mt.php';
    print '<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Halo '.$data_user['name'].'                    
                </div>                
                <div class="card-body">
                	<center> '.$data_reCapcha['reason_mt'].' </center>
                </div>
            </div>
        </div>
    </div>
</div>
';
    require 'layouts/footer.php';
    die();
}
if(preg_match('#Mozilla/4.05 [fr] (Win98; I)#',$user_agent)
    || preg_match('/Java1.1.4/si',$user_agent)
    || preg_match('/MS FrontPage Express/si',$user_agent)
    || preg_match('/HTTrack/si',$user_agent)
    || preg_match('/IDentity/si',$user_agent)
    || preg_match('/HyperBrowser/si',$user_agent)
    || preg_match('/Lynx/si',$user_agent)
) die('Be a Creative Human Dude<br><br>- Lann X solo');