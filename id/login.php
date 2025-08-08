<?php
session_start();
$guest = true;

require_once '../mainconfig.php';

if (opt_get('Z3Vlc3Rfc3RhdHVz') == 'Off') {
    require '../404.html';
    die;
}

// Check if already logged in
if (isset($_SESSION['user'])) {
    redirect(0, base_url());
}

require_once '../auth/auth-login.php';
require_once '../layouts/header.php';
?>

<style>
    .app-content {
        margin-left: 0 !important;
    }
    .auth-form {
        max-width: 400px;
        margin: 0 auto;
        background: #fff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .dark-layout body .auth-form {
        background: #283046;
        color: #fff;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .form-control {
        border-radius: 8px;
        border: 2px solid #e4e6fc;
        padding: 15px 20px;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #7367f0;
        box-shadow: 0 0 0 0.2rem rgba(115, 103, 240, 0.25);
    }
    .btn-login {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 8px;
        padding: 15px 30px;
        color: white;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s ease;
        font-size: 16px;
    }
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        color: white;
    }
    .auth-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .auth-header h2 {
        color: #5a5c69;
        font-weight: 700;
        margin-bottom: 10px;
    }
    .dark-layout body .auth-header h2 {
        color: #fff;
    }
    .auth-links {
        text-align: center;
        margin-top: 25px;
    }
    .auth-links a {
        color: #7367f0;
        text-decoration: none;
        font-weight: 500;
    }
    .auth-links a:hover {
        text-decoration: underline;
    }
    .remember-me {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }
    .form-check-input:checked {
        background-color: #7367f0;
        border-color: #7367f0;
    }
    @media (max-width: 768px) {
        .auth-form {
            margin: 20px;
            padding: 30px 20px;
        }
    }
</style>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="auth-form">
            <div class="auth-header">
                <h2><i class="fas fa-sign-in-alt"></i> Login</h2>
                <p class="text-muted">Masuk ke akun Anda untuk melanjutkan</p>
            </div>
            
            <?php if (isset($_SESSION['alert'])): ?>
            <div class="alert alert-<?= $_SESSION['alert'][0]; ?> alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['alert'][1]; ?></strong> <?= $_SESSION['alert'][2]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php unset($_SESSION['alert']); endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label for="user"><i class="fas fa-user"></i> Username</label>
                    <input type="text" class="form-control" id="user" name="user" placeholder="Masukkan username" required>
                </div>
                
                <div class="form-group">
                    <label for="pass"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Masukkan password" required>
                </div>
                
                <div class="remember-me">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Ingat saya
                        </label>
                    </div>
                    <a href="#" class="text-muted" data-toggle="modal" data-target="#forgotModal">Lupa password?</a>
                </div>
                
                <button type="submit" name="login" class="btn btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>
            </form>
            
            <div class="auth-links">
                <p>Belum punya akun? <a href="<?= base_url('/id/register'); ?>">Daftar di sini</a></p>
                <p><a href="<?= base_url('/id'); ?>">← Kembali ke beranda</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotModalLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Untuk reset password, silakan hubungi administrator melalui:</p>
                <ul>
                    <li>WhatsApp: <strong>+62 812-3456-7890</strong></li>
                    <li>Email: <strong>admin@example.com</strong></li>
                    <li>Telegram: <strong>@admintopup</strong></li>
                </ul>
                <p class="text-muted"><small>Sertakan username dan email yang terdaftar untuk verifikasi.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php include_once '../layouts/footer1.php'; ?>