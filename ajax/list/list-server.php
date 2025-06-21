<?php
require_once '../../mainconfig.php';

if (isset($_POST['server'])) {
	$post_server = $db->real_escape_string(e(@$_POST['server']));
	$cek_layanan = $db->query("SELECT DISTINCT kategori FROM layanan_sosmed ORDER BY kategori ASC");
	?>
	<option value="VGAME">- Select One -</option>
	<?php
	while ($data_layanan = $cek_layanan->fetch_assoc()) {
	?>
	<option value="<?php echo $data_layanan['kategori'];?>"><?php echo $data_layanan['kategori'];?></option>
	<?php
	}
} else {
?>
<option value="0">Error.</option>
<?php
}