<?php
session_start();
require_once '../../mainconfig.php';
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	require_once '../../system/helpers/ssp.class.php';
	$table = 'pembelian_sosmed';
	$primaryKey = 'id';
	
function status($s) {
    if ($s === "Success") {
        return '<div class="badge badge-glow badge-success">Success</div>';
    } else if ($s === "Pending") {
        return '<div class="badge badge-glow badge-warning"><i class="mdi mdi-autorenew mdi-spin"></i> Pending</div>';
    } else if ($s === "Processing") {
        return '<div class="badge badge-glow badge-info"><i class="mdi mdi-cube-send"></i> Processing</div>';
    } else if ($s === "Partial") {
        return '<div class="badge badge-glow badge-secondary">Partial</div>';
    } else {
        return '<div class="badge badge-glow badge-danger">Error</div>';
    }
}
	
	$columns = array(
		array( 'db' => 'tanggal', 'dt' => 0, 'formatter' => function($i) {
			return "<center>".format_date('id',$i)."</center>";
		}),
		array( 'db' => 'oid', 'dt' => 1, 'formatter' => function($i) {
			return "#".$i."";
		}),
		array( 'db' => 'layanan', 'dt' => 2),
		array( 'db' => 'target',  'dt' => 3, 'formatter' => function($i) {
			return 
			"
		<td style=\"min-width: 10px;\"<div class=\"input-group\"><input type=\"text\" value=\"".$i."\" class=\"form-control form-control-sm\" readonly=\"\">
                        </div></td>
			";
		}),  
		array( 'db' => 'jumlah', 'dt' => 4),
		array( 'db' => 'harga', 'dt' => 5, 'formatter' => function($i) {
			return "Rp ".number_format($i,0,',','.')."";
		}),
		array( 'db' => 'status', 'dt' => 6, 'formatter' => function($i) {
			return "". status($i)."";
		}),
		array( 'db' => 'id', 'dt' => 7)
		
		
	);
	$sql_details = array(
		'user' => $_CONFIG['db']['username'],
		'pass' => $_CONFIG['db']['password'],
		'db'   => $_CONFIG['db']['name'],
		'host' => $_CONFIG['db']['host']
	);
	$joinQuery = null;
	$extraWhere = "user = '$session' ORDER BY id DESC";
	$groupBy = '';
	$having = '';
	print(json_encode(
		SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
	));
} else {
	exit("No direct script access allowed!");
}