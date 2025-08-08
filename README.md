# 🎮 PPOB Topup Game Platform

Platform PPOB (Payment Point Online Banking) modern untuk layanan topup game, pulsa, dan digital payment terpercaya di Indonesia.

## ✨ Fitur Utama

### 🚀 Sistem Autentikasi
- **Registrasi User**: Pendaftaran akun baru dengan validasi lengkap
- **Login Aman**: Sistem login dengan remember me dan cookie token
- **Verifikasi Email**: Validasi email untuk keamanan akun
- **Reset Password**: Sistem reset password melalui admin

### 🎯 Sistem Topup Game
- **Multi Game Support**: Mendukung berbagai game populer Indonesia
- **Real-time Validation**: Validasi ID game secara real-time
- **Kategori Game**: Sistem kategorisasi game yang terorganisir
- **Guest Mode**: Pembelian tanpa perlu registrasi

### 💰 Sistem Pembayaran
- **Multi Payment Gateway**: 
  - Bank Transfer (BCA, BRI, BNI, Mandiri)
  - E-Wallet (GoPay, OVO, DANA, ShopeePay)
  - Virtual Account
  - QRIS Payment
- **Auto Payment Detection**: Deteksi pembayaran otomatis
- **Deposit System**: Sistem deposit saldo untuk kemudahan transaksi

### 🎫 Sistem Voucher & Diskon
- **Voucher Code**: Kode voucher dengan berbagai jenis diskon
  - Diskon Persentase (%)
  - Diskon Fixed Amount (Rp)
  - Bonus Saldo
- **Flash Sale**: Sistem flash sale dengan countdown timer
- **Voucher Validation**: Validasi voucher real-time
- **Usage Tracking**: Tracking penggunaan voucher

### 🏆 Loyalty Program
- **Point System**: Sistem poin untuk setiap transaksi
- **Tier System**: 
  - Bronze (0-999 poin)
  - Silver (1000-4999 poin)
  - Gold (5000-9999 poin)
  - Platinum (10000+ poin)
- **Tier Benefits**: Bonus saldo untuk setiap naik tier
- **Point History**: Riwayat perolehan dan penggunaan poin

### 🎨 Modern UI/UX
- **Responsive Design**: Optimized untuk mobile dan desktop
- **Dark/Light Mode**: Tema gelap dan terang
- **Interactive Components**: Animasi dan efek visual modern
- **Progressive Web App**: PWA ready untuk pengalaman seperti aplikasi

### 📊 Admin Panel
- **Dashboard Analytics**: Statistik penjualan dan transaksi
- **User Management**: Manajemen user dan level akses
- **Product Management**: Manajemen produk dan harga
- **Voucher Management**: Kelola voucher dan flash sale
- **Transaction Monitoring**: Monitor semua transaksi real-time

## 🛠️ Teknologi

### Backend
- **PHP 8.3+**: Core backend language
- **MySQL/MariaDB**: Database management
- **Session Management**: Secure session handling
- **CURL**: API integration untuk payment gateway

### Frontend
- **Bootstrap 4**: Responsive framework
- **jQuery**: JavaScript library
- **DataTables**: Advanced table management
- **Chart.js**: Data visualization
- **FontAwesome**: Icon library

### Security
- **Password Hashing**: Secure password dengan bcrypt
- **CSRF Protection**: Cross-site request forgery protection
- **SQL Injection Prevention**: Prepared statements
- **XSS Protection**: Input sanitization

## 📋 Instalasi

### Persyaratan Sistem
```
- PHP 8.0 atau lebih tinggi
- MySQL 5.7+ atau MariaDB 10.3+
- Apache/Nginx web server
- Ekstensi PHP: mysqli, curl, json, mbstring
- SSL Certificate (Recommended)
```

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone https://github.com/username/ppob-topup-game.git
cd ppob-topup-game
```

2. **Setup Database**
```sql
-- Import database utama
SOURCE Database.sql;

-- Import enhancement untuk fitur baru
SOURCE database_enhancements.sql;
```

3. **Konfigurasi Database**
Edit file `mainconfig.php`:
```php
$_CONFIG = [
    'db' => [
        'host' => 'localhost',
        'username' => 'your_db_username',
        'password' => 'your_db_password',
        'name' => 'your_db_name'
    ],
    'web' => [
        'url' => 'https://yourdomain.com',
        'assets' => 'https://yourdomain.com/assets',
        // ... other configs
    ]
];
```

4. **Set Permission**
```bash
chmod 755 assets/
chmod 755 uploads/
chmod 644 mainconfig.php
```

5. **Setup Admin**
```sql
INSERT INTO users (name, email, username, password, level, status, verif) VALUES 
('Administrator', 'admin@example.com', 'admin', '$2y$10$hashedpassword', 'Admin', 'active', 'YES');
```

## 🎮 Penggunaan

### Untuk User
1. **Registrasi**: Daftar akun baru di `/id/register`
2. **Login**: Masuk ke akun di `/id/login`
3. **Topup**: Pilih game dan nominal di halaman utama
4. **Deposit**: Isi saldo melalui berbagai metode pembayaran
5. **Voucher**: Gunakan kode voucher untuk diskon

### Untuk Admin
1. **Login Admin**: Akses `/admin` dengan akun admin
2. **Kelola User**: Manage user dan level akses
3. **Kelola Produk**: Tambah/edit game dan produk
4. **Monitor**: Pantau transaksi dan analytics

## 🔧 Konfigurasi

### Payment Gateway
Edit konfigurasi di admin panel atau database:
```sql
-- Contoh konfigurasi payment
UPDATE options SET opt_value = 'your_api_key' WHERE opt_name = 'payment_api_key';
```

### Email SMTP
```php
// lib/PHPMailer configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your_email@gmail.com';
$mail->Password = 'your_password';
```

## 📱 API Endpoints

### Voucher API
```
POST /ajax/check_voucher.php
Parameters: code, amount
Response: {valid: boolean, discount: number, message: string}
```

### Game Validation
```
POST /ajax/checknick.php
Parameters: game_code, user_id
Response: {valid: boolean, nickname: string}
```

## 🚀 Fitur Mendatang

- [ ] Multi-language Support
- [ ] Cryptocurrency Payment
- [ ] Affiliate System
- [ ] Mobile App (React Native)
- [ ] AI Chatbot Support
- [ ] Advanced Analytics
- [ ] WhatsApp Integration
- [ ] Social Media Login

## 🤝 Kontribusi

1. Fork repository
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 Lisensi

Project ini menggunakan lisensi MIT. Lihat file `LICENSE` untuk detail.

## 📞 Support

- **Website**: https://yourstore.com
- **Email**: support@yourstore.com
- **WhatsApp**: +62 812-3456-7890
- **Telegram**: @yoursupport

## 🙏 Credits

- **Framework**: Bootstrap, jQuery
- **Icons**: FontAwesome, Feather Icons
- **Payment**: Midtrans, Xendit Integration
- **Charts**: Chart.js, ApexCharts

---

**Dibuat dengan ❤️ untuk komunitas gaming Indonesia**

### 📊 Statistics
- 🎮 50+ Game Support
- 💳 10+ Payment Methods
- 🏆 4-Tier Loyalty System
- ⚡ Real-time Processing
- 🔒 Bank-level Security