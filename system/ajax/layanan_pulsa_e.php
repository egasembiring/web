<?php
require_once("../../mainconfig.php");

if (isset($_POST['category'])) {
	$post_cat = filter($_POST['category']);
	$check_service = $connect->query("SELECT * FROM srv WHERE brand = '$post_cat' AND status = 'available' ORDER BY price ASC");
	?>
	<option value="0">- Select one -</option>
	<?php
	while ($data_service = $check_service->fetch_assoc()) {
	?>
	<option value="<?= $data_service['code'];?>"><?= $data_service['name'];?></option>
	<?php
	}
} else {
?>
<option value="0">Error.</option>
<?php
}