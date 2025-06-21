<?php
require_once '../../mainconfig.php';

if (isset($_POST['operator'])) {
	$post_kategori = $db->real_escape_string((@$_POST['operator']));
	$cek_layanan = $db->query("SELECT * FROM layanan_pulsa WHERE operator = '$post_kategori' AND tipe ='VGAME' ORDER BY harga ASC");
	if (mysqli_num_rows($cek_layanan) == 0) {
	?>
<div class="table-responsive">
                                    <table class="table table-bordered table-striped zero-configuration mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle">ID</th>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle">Nama</th>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle;width:30%">Catatan</th>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle">Harga</th>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle">Status</th>
                                            </tr>
                                        </thead>
                            <tbody>
                                <tr>                                    
                                    <td colspan="5" class="text-center"><span class="text-danger "><i class="mdi mdi-close-circle-outline"></i> Tidak Ada Data Produk</span></td>                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>

<?php
} else {
?>
                     <div class="table-responsive">
                                    <table class="table table-bordered table-striped zero-configuration mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle">ID</th>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle">Nama</th>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle;width:30%">Catatan</th>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle">Harga</th>
                                                <th class="text-center" rowspan="2" style="vertical-align:middle">Status</th>
                                            </tr>
                                        </thead>
                            <tbody>
                            <?php
                            while ($data_layanan = mysqli_fetch_assoc($cek_layanan)) {
                            if($data_layanan['status'] == "Normal") {
                                $label = "success";
                                $icon = "mdi mdi-checkbox-marked-circle-outline";
                            } else if($data_layanan['status'] == "Gangguan") {
                                $label = "danger";
                                $icon = "mdi mdi-close-circle-outline";
                            }
                            ?>
                                <tr>
                                    <td><?php echo $data_layanan['provider_id']; ?></td>
                                    <td><?php echo $data_layanan['layanan']; ?></td>
                                    <td><small><?php echo $data_layanan['note']; ?></small></td>
                                    <td><span class="badge badge-primary">Rp. <?php echo number_format($data_layanan['harga'],0,',','.'); ?></span></td>                                    
                                    <td><span class="text-<?php echo $label; ?>"><i class="<?php echo $icon; ?>"></i> <?php echo $data_layanan['status']; ?></span></td>                                    
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
<?php
}
}