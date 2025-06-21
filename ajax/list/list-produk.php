<?php
require_once '../../mainconfig.php';

if (isset($_POST['tipe'])) {
	$post_tipe = $db->real_escape_string(e(@$_POST['tipe']));
	$cek_layanan = $db->query("SELECT DISTINCT operator FROM layanan_pulsa WHERE tipe = 'VGAME' ORDER BY operator ASC");
	?>
	<option value="0">- Select One -</option>
	<?php
	while ($data_layanan = $cek_layanan->fetch_assoc()) {
	?>
	<option value="<?php echo $data_layanan['operator'];?>"><?php echo $data_layanan['operator'];?></option>
	<?php
	}
} else {
?>
<option value="0">Error.</option>
<?php
}