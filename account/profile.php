<?php

session_start();
require_once '../mainconfig.php';
// load('middleware', 'csrf');
load('middleware', 'user');

	
if (isset($_POST['save_general'])) {
	$post_full_name = $db->real_escape_string(e(@$_POST['full_name']));
	if (!$post_full_name) {
		$_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada form kosong.'];
	} else if ($_SESSION['user']['level'] == 'Lock') {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'your account has been locked.'];
        } else {
		$update_general = $db->query("UPDATE users SET name = '{$post_full_name}' WHERE id = '{$_SESSION['user']['id']}'");
		if ($update_general === true) {
			$_SESSION['user']['name'] = $post_full_name;
			$_SESSION['alert'] = ['success', 'Success!', 'Edit profile berhasil.'];
		} else {
			$_SESSION['alert'] = ['danger', 'Failed!', 'System is busy, please try again later.'];
		}
	}
   		
} else if (isset($_POST['save_password'])) {
	$post_password = $db->real_escape_string(e(@$_POST['password']));
	$post_new_password = $db->real_escape_string(e(@$_POST['new-password']));
	$post_confirm_new_password = $db->real_escape_string(e(@$_POST['confirm-new-password']));
	
	if (!$post_password || !$post_new_password || !$post_confirm_new_password) {
		$_SESSION['alert'] = ['danger', 'Failed!', 'Masih ada form kosong.'];
	} else if ($post_new_password !== $post_confirm_new_password) {
		$_SESSION['alert'] = ['danger', 'Failed!', 'Konfirmasi password tidak sama.'];
        } else if ($_SESSION['user']['level'] == 'Lock') {
                        $_SESSION['alert'] = ['danger', 'Failed!', 'your account has been locked.'];
        } else if (password_verify($post_password, $_SESSION['user']['password']) === false) {
		$_SESSION['alert'] = ['danger', 'Failed!', 'Wrong Old Password.'];
	} else {
		$password = password_hash($post_new_password, PASSWORD_DEFAULT);
		$update_password = $db->query("UPDATE users SET password = '{$password}' WHERE id = '{$_SESSION['user']['id']}'");
		if ($update_password === true) {
			$_SESSION['user']['password'] = $password;
			$_SESSION['alert'] = ['success', 'Success!', 'Edit profile berhasil.'];
		} else {
			$_SESSION['alert'] = ['danger', 'Failed!', 'System is busy, please try again later.'];
		}
	}
}

include_once '../layouts/header.php'; ?>
<section id="page-account-settings">
    <div class="row">
        <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column nav-left">
                <li class="nav-item">
                    <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                        <i data-feather="user" class="font-medium-3 mr-1"></i>
                            <span class="font-weight-bold">Detail</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                        <i data-feather="lock" class="font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Ubah Password</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                            <form class="validate-form mt-2" method="POST">
                                <input type="hidden" id="csrf_token" name="csrf_token" value="<?= csrf_token() ?>">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nomer HP</label>
                                            <input type="text" class="form-control" name="phone" value="<?= e($_SESSION['user']['phone']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="<?= e($_SESSION['user']['email']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <input type="text" class="form-control" name="level" value="<?= e($_SESSION['user']['level']) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="save_general" class="btn btn-primary mt-2 mr-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-2">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                            <form class="validate-form" method="POST">
                                <input type="hidden" id="csrf_token" name="csrf_token" value="<?= csrf_token() ?>">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" name="new-password" class="form-control" placeholder="Password Baru">
                                                <div class="input-group-append">
                                                    <div class="input-group-text cursor-pointer">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Konfirmasi Password Baru</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" name="confirm-new-password" placeholder="Password Baru">
                                                <div class="input-group-append">
                                                    <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Konfirmasi Password Lama</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="password" class="form-control" name="password" placeholder="Password Lama" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text cursor-pointer">
                                                        <i data-feather="eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="save_password" class="btn btn-primary mr-1 mt-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once '../layouts/footer.php'; ?>
