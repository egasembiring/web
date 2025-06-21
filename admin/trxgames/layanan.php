<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url('/id'));
}

if (isset($_POST['edit_layanan'])) {
        $post_pid = $db->real_escape_string(e(@$_POST['pid']));
        
	$post_layanan = $db->real_escape_string(e(@$_POST['layanan']));
	$post_note = $db->real_escape_string(e(@$_POST['note']));
	$post_harga = $db->real_escape_string(e(@$_POST['harga']));
        $post_tipe = $db->real_escape_string(e(@$_POST['tipe']));
        $post_status = $db->real_escape_string(e(@$_POST['status']));
        $post_provider = $db->real_escape_string(e(@$_POST['provider']));
        
	if (!$post_pid) {
		$_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada form kosong.'];
	} else if ($_SESSION['user']['level'] == 'Lock') {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'your account has been locked.'];
	} else {
	        $edit_layanan = $db->query("UPDATE layanan_pulsa SET layanan = '{$post_layanan}', note = '{$post_note}', harga = '{$post_harga}', tipe = '{$post_tipe}', status = '{$post_status}', provider = '{$post_provider}' WHERE id = '{$post_pid}'");
	        if ($edit_layanan === true) {
				$_SESSION['alert'] = ['success', 'Success!', 'Layanan successfully change.'];
				exit(header("Location: ".base_url('/admin/trxgames/layanan')));
			        } 
			}
	} 
	
if (isset($_POST['addlayanan'])) {
	$post_provider = $db->real_escape_string(e(@$_POST['provider']));
	$post_kategori = $db->real_escape_string(e(@$_POST['kategori']));
	$post_code = $db->real_escape_string(e(@$_POST['code']));
	$post_layanan = $db->real_escape_string(e(@$_POST['layanan']));
	$post_note = $db->real_escape_string(e(@$_POST['note']));
	$post_harga_web = $db->real_escape_string(e(@$_POST['harga_web']));
	$post_profit = $db->real_escape_string(e(@$_POST['profit']));
        $post_tipe = $db->real_escape_string(e(@$_POST['tipe']));

	if (!$post_provider || !$post_kategori || !$post_code || !$post_layanan || !$post_note || !$post_harga_web || !$post_harga_api || !$post_profit || !$post_tipe) {
	$_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada form kosong.'];
	} else if ($_SESSION['user']['level'] == 'Lock') {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'your account has been locked.'];
	} else {
			$insert_srvc = $db->query("INSERT INTO layanan_pulsa VALUES('', '', '{$post_code}', '{$post_kategori}', '{$post_layanan}', '{$post_harga_web}', '{$post_profit}', 'Normal', '{$post_provider}', '{$post_tipe}', '{$post_note}')");
			if ($insert_srvc === true) {
				$_SESSION['alert'] = ['success', 'Success!', 'layanan successfully add.'];
				exit(header("Location: ".base_url('/admin/trxgames/layanan')));
			} else {
				$_SESSION['alert'] = ['danger', 'Failed!', 'System is busy, please try again later.'];
			}
		}
	}

if (isset($_POST['delete'])) {
	$post_id = $db->real_escape_string(e(@$_POST['id']));
	if (!$post_id) {
		$_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada form kosong.'];
	} else if ($_SESSION['user']['level'] == 'Lock') {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'your account has been locked.'];
        } else { 
                $delete_srvc = $db->query("DELETE FROM layanan_pulsa WHERE id = '{$post_id}'");
                if ($delete_srvc === true) {
                    $_SESSION['alert'] = ['success', 'Success!', 'Layanan successfully delete.'];
                    exit(header("Location: ".base_url('/admin/trxgames/layanan')));
                } else {
                    $_SESSION['alert'] = ['danger', 'Failed!', 'System is busy, please try again later.'];
                }
           }
      }
include_once '../../layouts/header_admin.php'; ?>
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Layanan Games</h4>
                </div>
                <div class="card-body card-dashboard">
                    <div class="table-responsive">
                        	<table class="table table-bordered table-striped zero-configuration" id="datatabl3s">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Layanan</th>
                                    <th>Provider</th>
                                    <th>Act.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <td colspan="4" class="text-center">Loading data from server...</td>
                            </tbody>		
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatabl3s').DataTable({
        "order": [[0, 'desc']],
        "processing": false,
        "serverSide": true,
        "paging": true,
        "pagingType": "simple_numbers",
        "ajax": "<?= base_url(); ?>/admin/class/layanan_pulsa.php",
        columnDefs : [
        {
        "searhable" : false,
        "orderable" : false,
        "targets" : 3,
        "render" : function(data, type, row) {
            var btn = "<a href = \"javascript:;\" onclick=\"modal('Detail Layanan','<?= base_url(); ?>/admin/trxgames/service_data/detail_layanan?id="+data+"')\"><p class=\"font-medium-5 mr-1\" style=\"text-decoration:none;\"><i class=\"mdi mdi-eye mdi-24px\"></i></a></p><a href = \"javascript:;\" onclick=\"modal('Edit Layanan','<?= base_url(); ?>/admin/trxgames/service_data/edit_layanan?id="+data+"')\"><p class=\"font-medium-5 ml-1\" style=\"text-decoration:none;\"><i class=\"mdi mdi-pencil-box-outline mdi-24px\"></i></a></p><a href = \"javascript:;\" onclick=\"modal('Delete Layanan','<?= base_url(); ?>/admin/trxgames/service_data/delete_layanan?id="+data+"')\"><p class=\"font-medium-5 mr-1\" style=\"text-decoration:none;\"><i class=\"mdi mdi-trash-can mdi-24px\"></i></a></p>"
            return btn;
        }
        } 
                     ]
        
    });
});
</script>
<script type="text/javascript">
    function modal(name, link, size) {
        var sizes = '';
        if (size == 'smaller' || size == 'xs') sizes = 'modal-xs';
        if (size == 'small' || size == 'sm') sizes = 'modal-sm';
        if (size == 'large' || size == 'lg') sizes = 'modal-lg';
        if (size == 'larger' || size == 'xl') sizes = 'modal-xl';

        $.ajax({
            type: "GET",
            url: link,
            beforeSend: function() {
                $('#SModal-body').html('Loading...');
            },
            success: function(result) {
                $('#SModal-body').html(result);
            },
            error: function() {
                $('#SModal-body').html('Failed to get contents...');
            }
        });

        $('#SModal-title').html(name);
        $('#SModal-size').removeClass('modal-xs');
        $('#SModal-size').removeClass('modal-sm');
        $('#SModal-size').removeClass('modal-lg');
        $('#SModal-size').removeClass('modal-xl');
        $('#SModal-size').addClass(sizes);
        $('#SModal').modal();
    }
</script>
<div class="modal fade text-left" id="SModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" id="SModal-size" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="SModal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="SModal-body"></div>
        </div>
    </div>
</div>                </div>
                </div>
                </div>
<?php include_once '../../layouts/footer.php'; ?>