<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url());
}

if (isset($_POST['btn_kostum'])) {
    if (isset($_POST['id']) AND isset($_POST['harga'])) {
        $layanan_id = $_POST['id'];
        
        $query_produk = mysqli_query($db, "SELECT * FROM layanan_pulsa WHERE id = '$layanan_id'");
        
        if (mysqli_num_rows($query_produk) === 1) {
            $fetch_produk = mysqli_fetch_assoc($query_produk);
            
            foreach($_POST['harga'] as $metode_id => $harga) {
                if ($harga !== $fetch_produk['harga']) {
                    $query_harga = mysqli_query($db, "SELECT * FROM harga_guest WHERE layanan_id = '$layanan_id' AND metode_id = '$metode_id'");
                    
                    if (mysqli_num_rows($query_harga) === 0) {
                        mysqli_query($db, "INSERT INTO harga_guest VALUES ('','$layanan_id','$metode_id','$harga','Games')");
                    } else {
                        $fetch_harga = mysqli_fetch_assoc($query_harga);
                        
                        mysqli_query($db, "UPDATE harga_guest SET harga = '$harga' WHERE id = '".$fetch_harga['id']."'");
                    }
                }
            }
            
            $_SESSION['alert'] = ['success', 'Success!', 'Kostum harga berhasil.'];
        	exit(header("Location: ".base_url('/admin/guest/harga.php')));
        } else {
            $_SESSION['alert'] = ['danger', 'Failed!', 'Produk tidak ditemukan.'];
        }
    } else {
        $_SESSION['alert'] = ['danger', 'Failed!', 'Kostum harga gagal.'];
    }
}

include_once '../../layouts/header_admin.php'; ?>
<style>
    .box-games-harga.text-white h5 {
        color: #fff !important;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-10 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kostum Harga</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                        $query_games_guest = mysqli_query($db, "SELECT * FROM games_guest");
                        while($fetch_games_guest = mysqli_fetch_assoc($query_games_guest)): 
                        ?>
                        <div id="btn-games-<?= $fetch_games_guest['id']; ?>" class="border mb-1 box-games-harga" style="border-radius: 8px;padding: 8px;cursor: pointer;" onclick="show_produk('<?= $fetch_games_guest['product']; ?>', '<?= $fetch_games_guest['id']; ?>');">
                            <img src="/assets/games/<?= $fetch_games_guest['img']; ?>" width="35" class="mr-1 d-inline-block" style="border-radius: 5px;">
                            <h5 class="d-inline-block"><?= $fetch_games_guest['name']; ?></h5>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table border">
                                <thead>
                                    <tr>
                                        <th width="10">No</th>
                                        <th>Produk</th>
                                        <th style="white-space: nowrap;">Harga <code>Default</code></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="result-ajax-produk">
                                    <tr>
                                        <td colspan="4" align="center">Tidak ada produk</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once '../../layouts/footer.php'; ?>

<div class="modal fade" id="modal-kostum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kostum Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    
                    <div id="result-ajax-kostum"></div>
                    
                    <div class="text-right">
                        <button class="btn btn-relief-primary" type="submit" name="btn_kostum">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function show_produk(produk, id) {
        $(".box-games-harga").removeClass('bg-primary text-white');
        $("#btn-games-" + id).addClass('bg-primary text-white');
        
        $.ajax({
            url: '<?= base_url(); ?>/admin/guest/ajax/get-harga.php',
            data: 'produk=' + produk,
            type: 'POST',
            dataType: 'html',
            success: function(result) {
                $("#result-ajax-produk").html(result);
            }
        });
    }
    
    function kostum_harga(id) {
        
        $.ajax({
            url: '<?= base_url(); ?>/admin/guest/ajax/kostum-harga.php',
            data: 'produk=' + id,
            type: 'POST',
            dataType: 'html',
            success: function(result) {
                $("#result-ajax-kostum").html(result);
                
                $("#modal-kostum").modal('show');
            }
        });
    }
</script>

















