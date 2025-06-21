<?php
session_start();
require_once '../mainconfig.php';
$guest = true;

include_once '../layouts/header.php'; ?>
<div class="row match-height justify-content-around">
<?php
$check_data = mysqli_query($db, "SELECT * FROM kontak_kami ORDER BY id ASC LIMIT 5");
while($kontak = mysqli_fetch_assoc($check_data)) : ?>
	<center><div class="col-lg-4 col-md-6 col-12">
	    <div class="card card-profile">
	        <img src="<?= config('web','assets') ?>/images/banner/banner-16.jpg" class="img-fluid card-img-top" alt="Profile Cover Photo">
	        <div class="card-body">
	            <div class="profile-image-wrapper">
	                <div class="profile-image">
	                    <div class="avatar">
	                        <img src="<?= html_entity_decode($kontak['url']); ?>" alt="MYPULSAA">
	                    </div>
	                </div>
	            </div>
	            <h3><?= $kontak['nama']; ?></h3>
	            <h6 class="text-muted"><?= $kontak['alamat']; ?></h6>
	            <div class="badge badge-light-primary profile-badge"><?= $kontak['jabatan']; ?></div>
	            <div class="divider divider-primary">
	                <div class="divider-text">SOSIAL MEDIA</div>
	            </div>
	            <div class="d-flex justify-content-around align-items-center">
	                <button type="button" class="btn btn-icon btn-outline-primary waves-effect" onclick="javascript:window.open('https://wa.me/<?= $kontak['whatsapp']; ?>');">
	                    <i class="fab fa-whatsapp text-success"></i>
	                </button>
	                <button type="button" class="btn btn-icon btn-outline-primary waves-effect" onclick="javascript:window.open('https://instagram.com/<?= $kontak['instagram']; ?>');">
	                    <i class="fab fa-instagram text-danger"></i>
	                </button>
	                <button type="button" class="btn btn-icon btn-outline-primary waves-effect" onclick="javascript:window.open('<?= $kontak['link']; ?>');">
	                    <i class="fas fa-link text-secondary"></i>
	                </button></center>
	            </div>
	        </div>
	    </div>
	</div>
	<?php endwhile; ?>
</div>
<?php include_once '../layouts/footer1.php'; ?>
