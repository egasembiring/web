
<script type="text/javascript">
function order_detail(name,link) {
    $.ajax({
        type: "GET",
        url: link,
        beforeSend: function() {
            $('#order-detail-title').html(name);
            $('#order-detail-body').html('Loading...');
        },
        success: function(result) {
            $('#order-detail-title').html(name);
            $('#order-detail-body').html(result);
        },
        error: function() {
            $('#order-detail-title').html(name);
            $('#order-detail-body').html('There is an error...');
        }
    });
    $('#order-detail').modal();
}
function modal(name,link) {
    $.ajax({
        type: "GET",
        url: link,
        beforeSend: function() {
            $('#modal-detail-title').html(name);
            $('#modal-detail-body').html('Loading...');
        },
        success: function(result) {
            $('#modal-detail-title').html(name);
            $('#modal-detail-body').html(result);
        },
        error: function() {
            $('#modal-detail-title').html(name);
            $('#modal-detail-body').html('There is an error...');
        }
    });
    $('#modal-detail').modal();
}
</script>
<div class="modal fade modal-3d-flip-horizontal" id="order-detail" aria-hidden="true" aria-labelledby="order-detail" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="order-detail-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="order-detail-body"></div>
        </div>
    </div>
</div>
<div class="modal fade modal-3d-flip-horizontal" id="modal-detail" aria-hidden="true" aria-labelledby="modal-detail" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-detail-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body" id="modal-detail-body"></div>
        </div>
    </div>
</div>
<?php if($data_user['level'] == 'Basic') { ?>
<div class="modal fade modal-3d-flip-horizontal" id="basic" aria-hidden="true" aria-labelledby="basic" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"> Level saat ini : <?= $data_user['level'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-bordered">
                    <li class="list-group-item list-group-item-action">1.Biaya Upgrade Langsung Dipotong Saldo</li>
                    <li class="list-group-item list-group-item-action">2.Akses Semua Fitur Layanan Premium</li>
                    <li class="list-group-item list-group-item-action">3.Mendapatkan Harga Layanan Lebih Murah</li>
                    <li class="list-group-item list-group-item-action">4.Mendapatkan 2 Poin Dari Setiap Transaksi Sukses</li>
                    <li class="list-group-item list-group-item-action">5.Mendapatkan Komisi Dari Referral Rp<?= currency(conf('referral', 3)) ?> Per Trx Sukses Member Referral</li>
                    <li class="list-group-item list-group-item-action">6.Mendapatkan Komisi Dari Referral Rp<?= currency(conf('referral', 2)) ?> Per Member Referral Upgrade Ke Premium</li>
                </ul>
                <h4 class="text-center">Biaya Upgrade Hanya</h4>
                <h2 class="text-danger text-center">Rp <?= currency(conf('referral', 4)) ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-warning rounded shadowed btn-block btn-lg mt-2 mb-2" data-toggle="modal" data-target="#DialogKonfirmasi"> UPGRADE SEKARANG</button>
            </div>
        </div>
    </div>
</div>
    <!-- Dialog Konfirmasi -->
    <div class="modal fade modal-3d-flip-horizontal" id="DialogKonfirmasi" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-simple modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upgrade Premium</h5>
                </div>
                <div class="modal-body">
                    Saldo Akan Dipotong Sebesar Rp <?= currency(conf('referral', 4)) ?>
                </div>
                <div class="modal-footer">
                    <form method="POST">
                        <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $csrf_string ?>">
                        <div class="btn-inline">
                            <a href="#" class="btn btn-text-secondary" data-dismiss="modal">CLOSE</a>
                            <button type="submit" class="btn btn-primary" name="upgrade" onclick="var e=this;setTimeout(function(){e.disabled=true;},0);return true;">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- * Dialog Konfirmasi -->
<?php } ?>
 <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">2022 DYNAMSHOP</a></div>
      <div class="site-footer-right">
        Made with <i class="red-600 wb wb-heart"></i> by <a href="" target="blank_">ADMIN</a>
      </div>
    </footer>
    <!-- Core  -->
    <script src="<?= $url ?>global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="<?= $url ?>global/vendor/jquery/jquery.js"></script>
    <script src="<?= $url ?>global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="<?= $url ?>global/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?= $url ?>global/vendor/animsition/animsition.js"></script>
    <script src="<?= $url ?>global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= $url ?>global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="<?= $url ?>global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="<?= $url ?>global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    
    <!-- Plugins -->
    <script src="<?= $url ?>global/vendor/switchery/switchery.js"></script>
    <script src="<?= $url ?>global/vendor/intro-js/intro.js"></script>
    <script src="<?= $url ?>global/vendor/screenfull/screenfull.js"></script>
    <script src="<?= $url ?>global/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="<?= $url ?>global/vendor/skycons/skycons.js"></script>
        <script src="<?= $url ?>global/vendor/chartist/chartist.min.js"></script>
        <script src="<?= $url ?>global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>
        <script src="<?= $url ?>global/vendor/aspieprogress/jquery-asPieProgress.min.js"></script>
        <script src="<?= $url ?>global/vendor/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="<?= $url ?>global/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js"></script>
        <script src="<?= $url ?>global/vendor/matchheight/jquery.matchHeight-min.js"></script>
    <script src="<?= $url ?>global/vendor/owl-carousel/owl.carousel.js"></script>
        <script src="<?= $url ?>global/vendor/slick-carousel/slick.js"></script>
    <script src="<?= $url ?>global/vendor/datatables.net/jquery.dataTables.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-buttons/dataTables.buttons.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-buttons/buttons.html5.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-buttons/buttons.flash.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-buttons/buttons.print.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-buttons/buttons.colVis.js"></script>
        <script src="<?= $url ?>global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js"></script>
        <script src="<?= $url ?>global/vendor/asrange/jquery-asRange.min.js"></script>
        <script src="<?= $url ?>global/vendor/bootbox/bootbox.js"></script>
        <script src="<?= $url ?>global/vendor/toastr/toastr.js"></script>
        <script src="<?= $url ?>global/vendor/jquery-ui/jquery-ui.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-tmpl/tmpl.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-canvas-to-blob/canvas-to-blob.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-load-image/load-image.all.min.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-file-upload/jquery.fileupload.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-file-upload/jquery.fileupload-process.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-file-upload/jquery.fileupload-image.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-file-upload/jquery.fileupload-audio.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-file-upload/jquery.fileupload-video.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-file-upload/jquery.fileupload-validate.js"></script>
        <script src="<?= $url ?>global/vendor/blueimp-file-upload/jquery.fileupload-ui.js"></script>
        <script src="<?= $url ?>global/vendor/dropify/dropify.min.js"></script>
    <!-- Scripts -->
    <script src="<?= $url ?>global/js/Component.js"></script>
    <script src="<?= $url ?>global/js/Plugin.js"></script>
    <script src="<?= $url ?>global/js/Base.js"></script>
    <script src="<?= $url ?>global/js/Config.js"></script>
    
    <script src="<?= $url ?>assets/js/Section/Menubar.js"></script>
    <script src="<?= $url ?>assets/js/Section/GridMenu.js"></script>
    <script src="<?= $url ?>assets/js/Section/Sidebar.js"></script>
    <script src="<?= $url ?>assets/js/Section/PageAside.js"></script>
    <script src="<?= $url ?>assets/js/Plugin/menu.js"></script>
    <script src="<?= $url ?>global/vendor/asprogress/jquery-asProgress.js"></script>
    <script src="<?= $url ?>global/js/config/colors.js"></script>
    <script src="<?= $url ?>assets/js/config/tour.js"></script>
    <!-- Page -->
    <script src="<?= $url ?>assets/js/Site.js"></script>
    <script src="<?= $url ?>global/js/Plugin/asscrollable.js"></script>
    <script src="<?= $url ?>global/js/Plugin/slidepanel.js"></script>
    <script src="<?= $url ?>global/js/Plugin/switchery.js"></script>
    <script src="<?= $url ?>global/js/Plugin/matchheight.js"></script>
    <script src="<?= $url ?>global/js/Plugin/jvectormap.js"></script>
    <script src="<?= $url ?>global/js/Plugin/responsive-tabs.js"></script>
    <script src="<?= $url ?>global/js/Plugin/closeable-tabs.js"></script>
    <script src="<?= $url ?>global/js/Plugin/tabs.js"></script>

    <script src="<?= $url ?>assets/examples/js/dashboard/v1.js"></script>
    <script src="<?= $url ?>global/js/Plugin/owl-carousel.js"></script>
    
    <script src="<?= $url ?>assets/examples/js/uikit/carousel.js"></script>
    <script src="<?= $url ?>assets/examples/js/uikit/icon.js"></script>
    <script src="<?= $url ?>global/vendor/plyr/plyr.js"></script>
    <script src="<?= $url ?>global/js/Plugin/plyr.js"></script>
    <script src="<?= $url ?>global/js/Plugin/datatables.js"></script>
    <script src="<?= $url ?>global/js/Plugin/asprogress.js"></script>
    <script src="<?= $url ?>assets/examples/js/tables/datatable.js"></script>
    <script src="<?= $url ?>global/js/Plugin/panel.js"></script>
    <script src="<?= $url ?>assets/examples/js/uikit/panel-actions.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?= $url ?>global/js/Plugin/toastr.js"></script>
    <script src="<?= $url ?>global/js/Plugin/dropify.js"></script>
    <script src="<?= $url ?>assets/examples/js/forms/uploads.js"></script>
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        $(document).ready(function(){
            $('#trx_table').DataTable();
        });
    </script>
    <script>
        const copyBtn = document.getElementById('copyBtn')
        const copyText = document.getElementById('copyText')
            
        copyBtn.onclick=()=> {
        copyText.select();
            document.execCommand('copy');
            toastr["success"]("Berhasil Salin Ke Clipboard", "Sukses")

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }
    </script>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/system/message.html'; ?>
</body>
</html>
