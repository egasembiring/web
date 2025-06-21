<script type="text/javascript" src="https://cdn.mypanel.link/global/33srijdbqcgk6lsz.js"></script>

<?php defined("BASEPATH") or exit("No direct script access allowed."); ?>
        		</div>
        	</div>
	</div>
	
	<footer class="footer d-none d-md-block footer-static footer-light">
            <p class="clearfix blue-grey lighten-2 mb-0">
                <span class="float-md-left d-block d-md-inline-block mt-25">
                    <a href="#"><b><?= config('web','title_web'); ?></b></a> © <script>document.write(new Date().getFullYear())</script>
                </span>
                <?php
        $end_time = microtime(TRUE);
        $page_load_in = round(($end_time - $start_time), 4);
        ?>
                <span class="float-md-right d-none d-md-block">Pemuatan Halaman : <?php echo $page_load_in ?>dtk.</span>
                <button class="btn btn-primary btn-icon scroll-top waves-effect waves-light" type="button"><i data-feather="arrow-up"></i></button>
            </p>
        </footer>
	<!-- BEGIN: Footer-->
		
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