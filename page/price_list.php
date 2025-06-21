<?php
session_start();
require_once '../mainconfig.php';
include_once '../layouts/header.php';
?>
<section id="dashboard-ecommerce">
         <div class="row match-height">
<div class="col-md-12 col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                        <i data-feather="tag"></i>
                        Daftar Harga
                    </h4>
                     
                     <div class="tab-pane active" id="Topup" role="tabpanel">
                         	<div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <select class="form-control" name="tipe" id="tipe">
                                            <option value="0">- Pilih Salah Satu -</option>
                                            <option value="VGAME">Topup Game</option>
			</select>
			</div>
			
			<div class="form-group col-12 col-md-6">
                                        <select class="form-control" name="operator" id="operator">
                                            <option value="0">- Pilih Games -</option>
                                        </select>
                                    </div>
                                </div>
	                
	        <div class="col-md-12">
		<div id="layanan"></div>
		</div>
		</form>
		</div>
		
				
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
		    $("#tipe").change(function() {
			    var tipe = $("#tipe").val();
			    
		        $.ajax({
			        url: '<?= base_url() ?>ajax/list/list-produk.php',
			        data: 'tipe=' + tipe,
			        type: 'POST',
			        dataType: 'html',
			        success: function(msg) {
				        $("#operator").html(msg);
			        }
		        });
	        });
			$("#operator").change(function() {
			    var tipe = $("#tipe").val();
			    var operator = $("#operator").val();
			    $.ajax({
			        url: '<?= base_url() ?>ajax/list/list-layanan.php',
			        data  : 'tipe=' +tipe + '&operator=' + operator,
			        type: 'POST',
			        dataType: 'html',
			        success: function(msg) {
				        $("#layanan").html(msg);
			        }
		        });
	        });
		});
		
		$(document).ready(function() {
		    $("#tipea").change(function() {
			    var tipea = $("#tipea").val();
		        $.ajax({
			        url: '<?= base_url() ?>ajax/list/list-produk.php',
			        data: 'tipe=' + tipea,
			        type: 'POST',
			        dataType: 'html',
			        success: function(msg) {
				        $("#operatora").html(msg);
			        }
		        });
	        });
			$("#operatora").change(function() {
			    var tipea = $("#tipea").val();
			    var operatora = $("#operatora").val();
			    $.ajax({
			        url: '<?= base_url() ?>ajax/list/list-layanan.php',
			        data  : 'tipe=' +tipea + '&operator=' + operatora,
			        type: 'POST',
			        dataType: 'html',
			        success: function(msg) {
				        $("#layanana").html(msg);
			        }
		        });
	        });
		});
		</script>
		
		
		<script type="text/javascript">
		$(document).ready(function() {
		    $("#server").change(function() {
			    var server = $("#server").val();
		        $.ajax({
			        url: '<?= base_url() ?>ajax/list/list-server.php',
			        data: 'server=' + server,
			        type: 'POST',
			        dataType: 'html',
			        success: function(msg) {
				        $("#kategori").html(msg);
			        }
		        });
	        });
		$("#kategori").change(function() {
			    var server = $("#server").val();
			    var kategori = $("#kategori").val();
			    $.ajax({
			        url: '<?= base_url() ?>ajax/list/list-kategori.php',
			        data  : 'server=' +server + '&kategori=' + kategori,
			        type: 'POST',
			        dataType: 'html',
			        success: function(msg) {
				        $("#service").html(msg);
			        }
		        });
	           });      
		});
		</script>
		</div>
      </section>
<?php include_once '../layouts/footer.php'; ?>