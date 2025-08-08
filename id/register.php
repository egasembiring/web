<?php
session_start();
$guest = true;

require_once '../mainconfig.php';

if (opt_get('Z3Vlc3Rfc3RhdHVz') == 'Off') {
    require '../404.html';
    die;
}

require_once '../auth/auth-register.php';
require_once '../layouts/header.php';
?>

<style>
    .app-content {
        margin-left: 0 !important;
    }
    .auth-form {
        max-width: 500px;
        margin: 0 auto;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .dark-layout body .auth-form {
        background: #283046;
        color: #fff;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-control {
        border-radius: 8px;
        border: 2px solid #e4e6fc;
        padding: 12px 15px;
        font-size: 14px;
    }
    .form-control:focus {
        border-color: #7367f0;
        box-shadow: 0 0 0 0.2rem rgba(115, 103, 240, 0.25);
    }
    .btn-register {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 8px;
        padding: 12px 30px;
        color: white;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s ease;
    }
    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    .auth-header {
        text-align: center;
        margin-bottom: 30px;
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
        margin-top: 20px;
    }
    .auth-links a {
        color: #7367f0;
        text-decoration: none;
        font-weight: 500;
    }
    .auth-links a:hover {
        text-decoration: underline;
    }
    @media (max-width: 768px) {
        .auth-form {
            margin: 20px;
            padding: 20px;
        }
    }
</style>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="auth-form">
            <div class="auth-header">
                <h2><i class="fas fa-user-plus"></i> Daftar Akun Baru</h2>
                <p class="text-muted">Bergabunglah dengan platform topup game terpercaya</p>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"><i class="fas fa-user"></i> Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username"><i class="fas fa-at"></i> Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Minimal 5 karakter" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="contoh@email.com" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone"><i class="fas fa-phone"></i> Nomor Telepon</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="08123456789" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock"></i> Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 karakter" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm_password"><i class="fas fa-lock"></i> Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Ulangi password" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="refferal"><i class="fas fa-gift"></i> Kode Refferal (Opsional)</label>
                    <input type="text" class="form-control" id="refferal" name="refferal" placeholder="Masukkan kode refferal untuk bonus">
                    <small class="text-muted">Dapatkan bonus saldo dengan menggunakan kode refferal</small>
                </div>
                
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">
                        Saya setuju dengan <a href="#" data-toggle="modal" data-target="#termsModal">Syarat dan Ketentuan</a>
                    </label>
                </div>
                
                <button type="submit" name="register" class="btn btn-register">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </button>
            </form>
            
            <div class="auth-links">
                <p>Sudah punya akun? <a href="<?= base_url('/id/login'); ?>">Login di sini</a></p>
                <p><a href="<?= base_url('/id'); ?>">← Kembali ke beranda</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Syarat dan Ketentuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>1. Ketentuan Umum</h6>
                <p>Dengan mendaftar di platform ini, Anda menyetujui untuk mematuhi semua aturan yang berlaku.</p>
                
                <h6>2. Keamanan Akun</h6>
                <p>Anda bertanggung jawab penuh atas keamanan akun dan kata sandi Anda.</p>
                
                <h6>3. Penggunaan Layanan</h6>
                <p>Layanan ini hanya untuk topup game legal dan sesuai dengan ketentuan developer game.</p>
                
                <h6>4. Refferal dan Bonus</h6>
                <p>Bonus refferal akan diberikan sesuai ketentuan yang berlaku dan dapat berubah sewaktu-waktu.</p>
                
                <h6>5. Penutupan Akun</h6>
                <p>Kami berhak menutup akun yang melanggar ketentuan atau melakukan aktivitas yang merugikan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
// Password confirmation validation
document.getElementById('confirm_password').addEventListener('input', function() {
    var password = document.getElementById('password').value;
    var confirmPassword = this.value;
    
    if (password !== confirmPassword) {
        this.setCustomValidity('Password tidak cocok');
    } else {
        this.setCustomValidity('');
    }
});

// Username validation
document.getElementById('username').addEventListener('input', function() {
    var username = this.value;
    if (username.length > 0 && username.length < 5) {
        this.setCustomValidity('Username minimal 5 karakter');
    } else {
        this.setCustomValidity('');
    }
});

// Phone validation
document.getElementById('phone').addEventListener('input', function() {
    var phone = this.value.replace(/\D/g, '');
    this.value = phone;
    
    if (phone.length > 0 && (phone.length < 10 || phone.length > 15)) {
        this.setCustomValidity('Nomor telepon harus 10-15 digit');
    } else {
        this.setCustomValidity('');
    }
});
</script>

<?php include_once '../layouts/footer1.php'; ?>