<?php
session_start();
$guest = true;

require_once '../mainconfig.php';

if (opt_get('Z3Vlc3Rfc3RhdHVz') == 'Off') {
    require '../404.html';
    die;
}

$query_slide = mysqli_query($db, "SELECT * FROM slider WHERE posisi = 'Guest'");

require_once 'fo.php';
require_once '../layouts/header.php';
?>
	<style>
    	.app-content {
    	    margin-left: 0 !important;
    	}
.row {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    /* display: flex; */
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    margin-right: -1rem;
    margin-left: -1rem;
    flex-direction: column;
    align-content: space-around;
}
.daftar-games {
    width: 18%;
    margin: 6px;
    text-align: center;
    display: inline-block;
    text-align: center;
    vertical-align: top;
    /* display: flex; */
    flex-wrap: wrap;
    flex-direction: row;
    align-content: center;
    justify-content: flex-end;
}
	    .daftar-games a img {
	        width: 100%;
	        border-radius: 25px;
	        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
	    }
	    .daftar-games a div {
	        color: #000000;
	        font-size: 13px;
	        margin-top: 8px;
	    }
	    .carousel-inner {
	        border-radius: 10px;
	    }
	    .ca-title {
	        margin-left: 50px;
	        font-weight: bold;
	    }
	    .ca-title:before {
	        content: ' ';
            background: #7367F0;
            width: 34px;
            height: 9px;
            display: block;
            position: absolute;
            border-radius: 40px;
            margin-top: 5px;
            margin-left: -45px;
	    }
	    .cg-4 {
	        background: #fff;
	        border: 1px solid #ebebeb;
	        padding: 5px;
	        border-radius: 14px;
	        min-height: 203px;
	    }
	    .cg-4-title {
	        padding: 7px;
	        font-weight: bold;
	    }
	    .dark-layout body .cg-4 {
	        background: #283046;
	        border-color: #283046;
	    }
	    .dark-layout body .cg-4-title {
	        color: #fff;
	    }
	    @media only screen and (max-width: 600px) {
	        body {
	            overflow-x: hidden;
	        }
	        .cg-4 {
	            min-height: 165px;
	        }
	        .cg-4-title {
	            padding: 3px;
	        }
	        .daftar-games {
	            width: 30%;
	            margin: 4px;
	        }
	        .title-game {
	            font-size: 10.5px;
	        }
	        .row-slide {
    	        margin: -35px -31px 0 -31px;
    	    }
    	    .carousel-inner {
    	        border-radius: 0;
    	    }
	    }
	</style>
	<?php if (mysqli_num_rows($query_slide) !== 0): ?>
	<br>
    <div>
        <div class="row justify-content-center row-slide">
    	    <div class="col-lg-7">
    	        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php $no = 1; while($fetch_slide = mysqli_fetch_assoc($query_slide)): ?>
                        <div style="padding:20px;" class="carousel-item <?= $no == 1 ? 'active' : ''; ?>">
                    		<a href="../assets/slide/<?= $fetch_slide['img']; ?>" class="image-popup">
                    			<img style="border-radius:18px;" class="d-block img-fluid" src="../assets/slide/<?= $fetch_slide['img']; ?>">
                    		</a>
                    	</div>
                    	<a  style="width:20%;" class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                             </a>
                                <a  style="width:20%;" class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                    	<?php $no++; endwhile; ?>
                    </div>
                </div>
    	    </div>
    	</div>
    </div>
    <?php endif; ?>
    
    <!-- Flash Sale and Vouchers Section -->
    <?php include_once '../components/flash_sale_voucher.php'; ?>
    
 <div class="row justify-content-center">
        <div class="col-lg-7 text-secondary">
            <?php
            $query_games_kategori = mysqli_query($db, "SELECT * FROM games_kategori ORDER BY urutan ASC");
            while($fetch_games_kategori = mysqli_fetch_assoc($query_games_kategori)): 
                $category = $fetch_games_kategori['kategori'];
                $query_games = mysqli_query($db, "SELECT * FROM games_guest WHERE category = '$category' ORDER BY urutan ASC");
            ?>
            <?php if (mysqli_num_rows($query_games) !== 0): ?>
            
            <div class="mb-2 mt-3">
                <h4 style="" class="ca-title"><?= $category; ?></h4>
            </div>
            
            <?php if (opt_get('Z2FtZXNfc3R5bGVfZ3Vlc3Q=') == 2): ?>
            <br>
            <?php endif; ?>
            
            <div class="games">
                <?php
                while($fetch_games = mysqli_fetch_assoc($query_games)): 
                ?>
                <?php if ($fetch_games['status'] == 'On'): ?>
                <div class="daftar-games">
                    <?php if (opt_get('Z2FtZXNfc3R5bGVfZ3Vlc3Q=') == 1) { ?>
                    <a href="<?= base_url(); ?>id/games/<?= $fetch_games['slug']; ?>">
                        <img src="/assets/games/<?= $fetch_games['img']; ?>">
                        <div><?= $fetch_games['name']; ?></div>
                    </a>
                    <?php } else if (opt_get('Z2FtZXNfc3R5bGVfZ3Vlc3Q=') == 2) { ?>
                    <div class="mb-3">
                        <a href="<?= base_url(); ?>guest/games/<?= $fetch_games['slug']; ?>">
                            <div class="card" style="border: 1px solid #ddd;">
                                <div class="card-body pb-0">
                                    <img src="/assets/games/<?= $fetch_games['img']; ?>" style="margin-top: -70px;border-radius: 8px;">
                                </div>
                                <div class="mt-0" style="padding: 5px;">
                                    <p class="title-game mb-0" style="color: #000;height: 40px;"><?= $fetch_games['name']; ?></p>
                                    <small class="title-game mb-0 text-muted" style="font-size: 10px;"><?= $fetch_games['sub_name']; ?></small>
                                    <div style="padding-top: 0 !important;margin-top: 0 !important;">
                                        <span class="text-white mb-0" style="background: #7367f0;display: block;width: 100%;padding: 5px;margin-top: 10px;border-radius: 100px;font-size: 11px;">Top Up</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } else if (opt_get('Z2FtZXNfc3R5bGVfZ3Vlc3Q=') == 3) { ?>
                    <div style="background: #7367f0;border-radius: 14px;">
                        <a href="<?= base_url(); ?>id/games/<?= $fetch_games['slug']; ?>">
                            <img src="/assets/games/<?= $fetch_games['img']; ?>" style="border-radius: 14px 14px 0 0;">
                            <div class="clip-overlay"></div>
                            <div style="padding: 3px;font-weight: 600;color: #fff;height: 58px;"><?= $fetch_games['name']; ?></div>
                        </a>
                    </div>
                    <?php } else { ?>
                    <div class="cg-4">
                        <a href="<?= base_url(); ?>id/games/<?= $fetch_games['slug']; ?>">
                            <img src="/assets/games/<?= $fetch_games['img']; ?>" style="border-radius: 14px;">
                            <div class="cg-4-title"><?= $fetch_games['name']; ?></div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
            
            
		</div>
	</div>
<?php include_once '../layouts/footer1.php'; ?>

<?php if (opt_get('cG9wdXBfZ3Vlc3Rfc3RhdHVz') == 'On'): ?>
<div class="modal fade" id="modal-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: transparent;">
            <button type="button" class="close" data-dismiss="modal" style="display: block;background: #fff;opacity: 1;width: 36px;position: absolute;right: 0;" aria-label="Close">
                <span aria-hidden="true" style="text-shadow: none;">&times;</span>
            </button>
            <img src="<?= opt_get('cG9wdXBfZ3Vlc3RfbGluaw=='); ?>" class="w-100">
        </div>
    </div>
</div>
<script>
    $("#modal-info").modal('show');
</script>
<?php endif; ?>