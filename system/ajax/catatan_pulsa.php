<?php
require_once("../../mainconfig.php");

if (isset($_POST['service'])) {
	$post_code = filter($_POST['service']);
	$check_service = $connect->query("SELECT * FROM srv WHERE code = '$post_code' AND status = 'available'");
	if ($check_service->num_rows == 1) {
		$data_service = $check_service->fetch_assoc();
		$result = $data_service['note'];
		echo $result;
	} else {
		die("0");
	}
} else {
	die("0");
}