<?php
session_start();
require_once '../../mainconfig.php';
load('middleware', 'user');

if ($_SESSION['user']['level'] == "Reseller" || $_SESSION['user']['level'] == "Member") {
    header('location:' . base_url('/id'));
}

if (isset($_POST['editmt'])) {
        $post_id = $db->real_escape_string(e(@$_POST['id']));
        
	$post_secret = $db->real_escape_string(e(@$_POST['secret']));
	$post_key = $db->real_escape_string(e(@$_POST['key']));
	$post_keywords = $db->real_escape_string(e(@$_POST['keywords']));
	$post_wa = $db->real_escape_string(e(@$_POST['wa']));
	$post_maintenance = $db->real_escape_string(e(@$_POST['maintenance']));
	$post_reason = $db->real_escape_string(e(@$_POST['reason']));

	if (!$post_id) {
		$_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada form kosong.'];
	} else if ($_SESSION['user']['level'] == 'Lock') {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'your account has been locked.'];
	} else {
	        $edit_mt = $db->query("UPDATE reCapcha SET secret = '{$post_secret}', site = '{$post_key}', keyworld = '{$post_keywords}', grup_wa = '{$post_wa}', maintenance = '{$post_maintenance}', reason_mt = '{$post_reason}' WHERE id = '{$post_id}'");
	        if ($edit_mt === true) {
				$_SESSION['alert'] = ['success', 'Success!', 'Configuration successfully change.'];
				exit(header("Location: ".base_url('/admin/other/config')));
			} else {
				$_SESSION['alert'] = ['success', 'Success!', 'Configuration successfully change.'];
			        exit(header("Location: ".base_url('/admin/other/config')));
			       }
			}
	} 
include_once '../../layouts/header_admin.php'; ?>
<section id="basic-vertical-layouts">
  <div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Configuration</h4>
                </div>
                <div class="card-body card-dashboard">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped zero-configuration" id="datatable">
                            <thead>
                                <tr>
                                    <th>Secret Key</th>
                                    <th>Site Key</th>
                                    <th>Keywords</th>
                                    <th>Group WhatsApp</th>
                                    <th>Maintenance</th>
                                    <th>Reason MT</th>
                                    <th>Act.</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                    $check_config = $db->query("SELECT * FROM reCapcha ORDER BY id DESC LIMIT 1");
                    while($data_config = $check_config->fetch_assoc()) :
                    ?>
                            <tr>
                                <td><?= $data_config['secret']; ?></td>
                                <td><?= $data_config['site']; ?></td>
                                <td><?= $data_config['keyworld']; ?></td>
                                <td><?= $data_config['grup_wa']; ?></td>
                                <td><?= $data_config['maintenance']; ?></td>
                                <td><?= $data_config['reason_mt']; ?></td>
                                <td>
                            <a href="javascript:;" onclick="modal('Edit Configuration','<?= base_url(); ?>admin/other/configuration/edit-config?id=<?= $data_config['id']; ?>','','md')">
                                <i class="mdi mdi-pencil-box-outline mdi-24px"></i>
                            </a>
                            </td>

                            </tr>
                            <?php endwhile; ?>
						</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  <!--/ Stats Horizontal Card -->
</section>
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