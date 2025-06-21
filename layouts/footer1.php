<?php defined("BASEPATH") or exit("No direct script access allowed."); ?>
        		</div>
        	</div>
        </div>
    	<?php if (isset($guest)): ?>
    	<style>
    	    .clip-overlay {
    	        clip-path: polygon(0 48%,9% 48%,18% 65%,27% 49%,36% 72%,45% 58%,55% 70%,64% 58%,73% 86%,82% 48%,91% 63%,100% 70%,100% calc(100% + 1px),0 calc(100% + 1px));
                -webkit-clip-path: polygon(0 48%,9% 48%,18% 65%,27% 49%,36% 72%,45% 58%,55% 70%,64% 58%,73% 86%,82% 48%,91% 63%,100% 70%,100% calc(100% + 1px),0 calc(100% + 1px));
                background-color: #7367F0;
                width: 100%;
                height: 25px;
                margin-top: -21px !important;
    	    }
    	    .clip-fo {
    	        margin-top: 10px !important;
    	        background-color: #7367F0 !important;
    	        display: flex;
                padding: 0;
                margin-top: -39px;
                width: 100%;
                height: 40px;
                clip-path: polygon(0 23%,6% 72%,12% 47%,18% 70%,24% 51%,32% 80%,38% 47%,44% 80%,50% 49%,56% 70%,60% 86%,66% 42%,72% 65%,78% 38%,84% 64%,90% 17%,96% 20%,100% 1%,100% calc(100% + 1px),0 calc(100% + 1px));
                -webkit-clip-path: polygon(0 23%,6% 72%,12% 47%,18% 70%,24% 51%,32% 80%,38% 47%,44% 80%,50% 49%,56% 70%,60% 86%,66% 42%,72% 65%,78% 38%,84% 64%,90% 17%,96% 20%,100% 1%,100% calc(100% + 1px),0 calc(100% + 1px));
    	    }
    	    .foo-img {
    	        width: 65px;
    	        height: 65px;
    	        background: #fff;
    	        text-align: center;
    	        border-radius: 50%;
    	        line-height: 65px;
    	        float: left;
    	        margin-right: 15px;
    	    }
    	    
    	    .fo-end a {
    	        margin: 0 3px;
    	    }
    	    
    	    @media only screen and (max-width: 600px) {
    	        .fo-end {
    	            text-align: center;
    	        }
    	        .fo-end span {
    	            margin-bottom: 8px;
    	            display: block;
    	        }
    	        .fo-end div {
    	            margin-top: 5px;
    	            display: block !important;
    	            float: none !important;
    	        }
    	        .fo-end div img {
    	            max-width: 150px !important;
    	        }
    	        .fo-xs2 {
    	            padding-bottom: 20px;
    	            border-bottom: 1px dotted #7367F0;
    	        }
    	    }
    	</style><br>&nbsp;&nbsp;&nbsp;
        <div class="clip-fo"></div>
        <div style="background: #7367F0;padding: 30px 0;">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                <br><br>
                                    <h4 style="color:white" class="ml-1">Pembayaran</h4>
                                    <div class="payment-channels-track marquee ml-1">
                                    <div class="footer-pc-marquee">
                                        <img draggable="false" class="footer-pc-icon running-text ls-is-cached DSloaded" data-src="/assets/icon-dynamshop/footer/ovo.png" alt="ovo" loading="DS" src="/assets/icon-dynamshop/footer/ovo.png">
                                        <img draggable="false" class="footer-pc-icon running-text ls-is-cached DSloaded" data-src="/assets/icon-dynamshop/footer/shopeepay.png" alt="shopeepay" loading="DS" src="/assets/icon-dynamshop/footer/shopeepay.png">
                                        <img draggable="false" class="footer-pc-icon running-text ls-is-cached DSloaded" data-src="/assets/icon-dynamshop/footer/qris.png" alt="qris" loading="DS" src="/assets/icon-dynamshop/footer/qris.png">
                                        <img draggable="false" class="footer-pc-icon running-text ls-is-cached DSloaded" data-src="/assets/icon-dynamshop/footer/bni.png" alt="bni" loading="DS" src="/assets/icon-dynamshop/footer/bni.png">
                                        <img draggable="false" class="footer-pc-icon running-text ls-is-cached DSloaded" data-src="/assets/icon-dynamshop/footer/bri.png" alt="bri" loading="DS" src="/assets/icon-dynamshop/footer/bri.png">
                                        <img draggable="false" class="footer-pc-icon running-text ls-is-cached DSloaded" data-src="/assets/icon-dynamshop/footer/mandiri.png" alt="mandiri" loading="DS" src="/assets/icon-dynamshop/footer/mandiri.png">
                                        <img draggable="false" class="footer-pc-icon running-text ls-is-cached DSloaded" data-src="/assets/icon-dynamshop/footer/bca.png" alt="bca" loading="DS" src="/assets/icon-dynamshop/footer/bca.png">
                                     </div>
                                  </div>
             
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="background: #7367F0; color:#fff;padding: 15px 0;">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-7 fo-end" style="font-size: 12px;">
                        <span class="mr-2"><a href="#"><b style="color:#fff;"><?= config('web','title_web'); ?></b></a> © <script>document.write(new Date().getFullYear())</script> All Rights Reserved.</span>
                        <a class="text-white" href="/page/terms">Syarat & Ketentuan</a>
                        <a class="text-white" href="/page/terms">Kebijakan Privasi</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php 
    	if (!isset($guest)) {
    	    require 'fo.php'; 
    	}
    	?>
    	
    	

<link rel="stylesheet" href="/layouts/dynamshop/style.css">
<!-- partial:index.partial.html -->
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body><div class="container-wa">
		<div class="card"  >

				
			<div style="margin:25px;padding: 1px;">
					<img   src="/assets/icon-dynamshop/footer/account.png" style="width:55px;height:55px;margin-left: 82px;">
	<p style="text-align: center;border: 1px solid rgb(0,0,0,0.15);border-radius: 5px;padding: 10px 6px;margin-top: 9px;font-size: 13px;">
			Ada yang bisa kami bantu?
	  </p>
		  <br>
<div  style="text-align: center; font-size: 1.5em;letter-spacing: 10px;">
<a href="#" target="https://wa.me/6283809200616" rel="noopner"><i  style="color:#18d45c" class="fa fa-whatsapp">
  </i></a>
	<a href="#" target="#" rel="noopner"><i style="color:#3481f6" class="fa fa-facebook"></i></a>
  
  <a href="#" target="cs@game.mypulsaa.com" rel="noopner"><i style="color:ffdd99" class="fa fa-envelope"></i></a>
  
  <a href="#" target="#" rel="noopner"><i style="color:blue" class="fa fa-instagram"></i></a>
	</div>
</div>
<center><div class="title-2VJjm"><?= config('web', 'title_web') ?> CS</div></center>
</div>
<div style="background:#7367F0;" class="floating-button">
	<i class="fa fa-comments icon wa"></i>
<i style="color:#fff;" class="fa fa-times icon close"></i>

		</div>
	</div>
   
  </body>
</html>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script><script  src="/layouts/dynamshop/script.js"></script>

</body>
</html>
	    
	<!-- BEGIN: Vendor JS-->
        <script src="<?= asset('/vendors/js/vendors.min.js?v=1') ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

        <!-- BEGIN: Page Vendor JS-->
        <script src="<?= asset('/vendors/js/charts/apexcharts.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/extensions/tether.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/extensions/toastr.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/datatables.bootstrap4.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/responsive.bootstrap4.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/datatables.checkboxes.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/jszip.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/pdfmake.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/buttons.html5.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/buttons.print.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/forms/select/select2.full.min.js') ?>"></script>        
        <script src="<?= asset('/vendors/js/doku.js') ?>"></script>
        <script src="<?= asset('/vendors/js/prism.js') ?>"></script>
        <script src="<?= asset('/vendors/js/apix.js') ?>"></script>
        <script src="<?= asset('/vendors/js/popup.js') ?>"></script>
        <script src="<?= asset('/vendors/js/gallery-init.js') ?>"></script>
        <script src="<?= asset('/vendors/js/modal-min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/swiper.js') ?>"></script>
        <script src="<?= asset('/vendors/js/swiper.min.js') ?>"></script>
        <script src="<?= asset('/vendors/js/componens.js') ?>"></script>
        
        <!-- BEGIN: Customs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/addons/cleave-phone.id.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
       
        <!-- BEGIN: Theme JS-->
        <script src="<?= asset('/js/core/app-menu.min.js') ?>"></script>
        <script src="<?= asset('/js/core/app.min.js') ?>"></script>
        <script src="<?= asset('/js/scripts/components/components-alerts.min.js') ?>"></script>
        <script src="<?= asset('/js/scripts/components/components-collapse.min.js') ?>"></script>
        <script src="<?= asset('/js/scripts/components/components-modals.min.js') ?>"></script>
        <script src="<?= asset('/js/scripts/customizer.min.js') ?>"></script>
        <script src="<?= asset('/js/scripts/select.js') ?>"></script> 
        <script src="<?= asset('/js/scripts/main.js') ?>"></script>
        
        <a href="#" class="d-none">
            <img src="/assets/images/wa.png" class="wabutton" alt="Whatsapp-Button" />
        </a>
        <style>
        .wabutton{
            width:50px;
            height:50px;
            position:fixed;
            bottom:20px;
            right:20px;
            z-index:100;
        }
        </style>
        
        <script>
            function salin(id) {
                var copyText = document.getElementById(id);
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText.value);
            }
        </script>
	</body>
	
	<!-- Dropify js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
        <script type="text/javascript">$('.dropify').dropify();</script>
        <!-- Dropify js ends -->
	
	<script type="text/javascript">
        var clipboard = new ClipboardJS('.copy');clipboard.on('success', function(e) {toastr.success("", "Copied to clipboard!");$('#sess-result').html('<div class="alert alert-success" role="alert"><h4 class="alert-heading">Success!</h4><div class="alert-body">Copied to clipboard!</div></div>');e.clearSelection(); });
        </script>
        
	<script>
	$(window).on('load', function() {if (feather) feather.replace({width: 14,height: 14});});
        </script>    
        <script type="text/javascript">
$(document).ready(function() {$('#datatable').DataTable({"ordering": false,"serverSide": false,"processing": false,"paging": true,"pagingType": "simple_numbers","ajax": "","keys": !0,"drawCallback": function() { $(".dataTables_paginate > .pagination").addClass("pagination") },"language": {"emptyTable": "Tidak ada data dalam table","info": "Showing _START_ to _END_ of _TOTAL_ data","infoEmpty": "Showing _START_ to _END_ of _TOTAL_ data","infoFiltered": "","infoPostFix": "","thousands": ".","lengthMenu": "Show _MENU_ data","loadingRecords": "Waiting...","processing": "Processing...","search": "Search:","searchPlaceholder": "","zeroRecords": "Data not found..","paginate": {"first": "First","last": "Last","next": "<i class='fas fa-chevron-right'>","previous": "<i class='fas fa-chevron-left'>"},"aria": {"sortAscending": ": activate to sort column ascending","sortDescending": ": activate to sort column descending"}}});});
       </script>
    
    <?php if (isset($_SESSION['sound'])): ?>
    
    <audio id="myAudio">
        <?php if ($_SESSION['sound'] == 'order'): ?>
        <source src="https://duitly.my.id/order/sound/<?= opt_get('c291bmRfb3JkZXI='); ?>" type="audio/mpeg">
        <?php else: ?>
        <source src="https://duitly.my.id/order/sound/<?= opt_get('c291bmRfZGVwb3NpdA=='); ?>" type="audio/mpeg">
        <?php endif; ?>
    </audio>
    
    <script>
    setTimeout(function() {
        document.getElementById("myAudio").play();
    }, 1000);
    </script>
    <?php 
    unset($_SESSION['sound']);
    endif; ?>
       
</html>  
<?php
$end_time = microtime(TRUE);
$page_load_in = round(($end_time - $start_time), 4);
?><script>
$(window).ready(function() {$("#pageLoad").html('<?= $page_load_in ?>');});
</script>

