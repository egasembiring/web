<?php
require_once '../../mainconfig.php';
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	$table = 'layanan_pulsa';
	$primaryKey = 'id';
	
	function color($s) {
        if ($s === "Normal") {
        return '<div class="badge badge-success">Normal</div>';
        } else {
        return '<div class="badge badge-danger">Gangguan</div>';
        }
}

	
	$columns = array(
		array( 'db' => 'provider_id', 'dt' => 0),
		array( 'db' => 'layanan', 'dt' => 1),	
		array( 'db' => 'provider', 'dt' => 2),
		array( 'db' => 'id', 'dt' => 3)		
	);
	require_once '../../system/helpers/ssp.class.php';
	$sql_details = array(
		'user' => $_CONFIG['db']['username'],
		'pass' => $_CONFIG['db']['password'],
		'db'   => $_CONFIG['db']['name'],
		'host' => $_CONFIG['db']['host']
	);
	$joinQuery = null;
	$extraWhere = '';
	$groupBy = '';
	$having = '';
	print(json_encode(
		SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
	));
} else {
	exit("No direct script access allowed!");
}