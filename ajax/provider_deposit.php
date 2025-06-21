<?php
session_start();
require_once '../mainconfig.php';

if (!isset($_SESSION['user'])) {
   die("Anda Tidak Memiliki Akses!");
}
if (isset($_POST['tipe'])) {
	$post_tipe = strtoupper($db->real_escape_string(e(@$_POST['tipe'])));
	$cek_metode = $db->query("SELECT * FROM metode_depo WHERE tipe = '$post_tipe' AND provider != 'QRIS' ORDER BY id ASC");
	?>
	<?php if (mysqli_num_rows($cek_metode) !== 0): ?>
	<option value="0">- Select One -</option>
	<?php else: ?>
	<option value="0">- Method Not Found -</option>
	<?php endif; ?>
	<?php
	while ($data_metode = $cek_metode->fetch_assoc()) {
	    $provider = $data_metode['provider'] == 'Default' ? 'Manual' : 'Otomatis';
	?>
	<option value="<?php echo $data_metode['id'];?>">(<?php echo $provider;?>) <?= $data_metode['nama']; ?></option>
	<?php
	}
} else {
?>
<option value="0"></option>
<?php
}