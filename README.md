# Game Top-Up Web Application

## 📋 Deskripsi
Aplikasi web berbasis PHP untuk layanan top-up game dan produk digital. Aplikasi ini menyediakan platform untuk pembelian kredit game, voucher digital, dan layanan top-up lainnya dengan sistem pembayaran yang terintegrasi.

## ✨ Fitur Utama

### 🔐 Sistem Autentikasi
- **Login & Registrasi**: Sistem login/register yang aman dengan validasi
- **Session Management**: Pengelolaan sesi pengguna yang reliable
- **Remember Me**: Fitur ingat saya untuk kemudahan akses
- **Email Verification**: Verifikasi email untuk keamanan akun

### 👤 Manajemen Pengguna
- **Multi-Level User**: Member, Reseller, Premium, H2H Special, Admin
- **Profile Management**: Pengaturan profil dan informasi akun
- **API Access**: Akses API untuk integrasi dengan sistem lain
- **Activity Logging**: Pencatatan aktivitas login dan transaksi

### 🎮 Produk & Layanan
- **Game Top-Up**: Top-up untuk berbagai game populer (Mobile Legends, Free Fire, PUBG, dll)
- **Digital Vouchers**: Voucher game dan entertainment
- **E-Money**: Integrasi dengan e-wallet (OVO, DANA, GoPay, ShopeePay)
- **Pulsa & Data**: Layanan top-up pulsa dan paket data

### 💰 Sistem Pembayaran
- **Multiple Payment Methods**: 
  - Virtual Account (BRI, Mandiri, BNI, BSI, Maybank)
  - E-Wallet (DANA, OVO, GoPay, ShopeePay)
  - QRIS (Universal QR Code)
  - Convenience Store (Alfamart, Indomaret)
- **Auto-Check Payment**: Pengecekan pembayaran otomatis
- **Transaction History**: Riwayat transaksi lengkap

### 📊 Dashboard Admin
- **User Management**: Kelola pengguna dan level akses
- **Product Management**: Kelola produk dan harga
- **Transaction Monitoring**: Monitor semua transaksi
- **Report & Analytics**: Laporan penjualan dan analitik

## 🛠 Teknologi

### Backend
- **PHP 7.4+**: Server-side scripting
- **MySQL/MariaDB**: Database management
- **PHPMailer**: Email functionality
- **cURL**: API integrations

### Frontend
- **Bootstrap 4**: Responsive CSS framework
- **jQuery**: JavaScript library
- **Feather Icons**: Icon set
- **Custom CSS**: Additional styling

### API Integrations
- **Digiflazz**: Game top-up provider
- **APIGames**: Game service provider
- **Tripay**: Payment gateway
- **Various E-Money APIs**: Wallet integrations

## 📦 Instalasi

### Requirements
- PHP 7.4 atau lebih tinggi
- MySQL/MariaDB 5.7+
- Web server (Apache/Nginx)
- cURL extension
- OpenSSL extension
- MySQLi extension

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/egasembiring/web.git
   cd web
   ```

2. **Database Setup**
   ```bash
   # Import database
   mysql -u username -p database_name < Database.sql
   ```

3. **Konfigurasi Database**
   Edit file `mainconfig.php`:
   ```php
   $_CONFIG = [
       'db' => [
           'host' => 'localhost',
           'username' => 'your_username',
           'password' => 'your_password',
           'name' => 'your_database'
       ],
   ];
   ```

4. **Set Permissions**
   ```bash
   chmod 755 assets/
   chmod 755 assets/upload/
   chmod 755 assets/games/
   chmod 755 assets/slide/
   ```

5. **Virtual Host Configuration**
   
   **Apache (.htaccess sudah included)**
   ```apache
   <VirtualHost *:80>
       ServerName your-domain.com
       DocumentRoot /path/to/web
       DirectoryIndex index.php
   </VirtualHost>
   ```

   **Nginx**
   ```nginx
   server {
       listen 80;
       server_name your-domain.com;
       root /path/to/web;
       index index.php;

       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }

       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
           fastcgi_index index.php;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
           include fastcgi_params;
       }
   }
   ```

## ⚙️ Konfigurasi

### 1. Website Settings
Akses admin panel untuk mengatur:
- **Site Information**: Nama, deskripsi, keywords
- **Contact Details**: Email, WhatsApp, alamat
- **Payment Methods**: Aktifkan/nonaktifkan metode pembayaran
- **API Configurations**: Setup API keys untuk provider

### 2. Payment Gateway Setup

**Tripay Configuration**
```php
// Di admin panel, masukkan:
Merchant ID: T15117
API Key: your_tripay_api_key
Private Key: your_tripay_private_key
```

**Digiflazz Configuration**
```php
// Di admin panel, masukkan:
Username: your_digiflazz_username
API Key: your_digiflazz_api_key
```

### 3. Email Configuration
Setup SMTP di admin panel:
```php
SMTP Host: your_smtp_host
SMTP Port: 587/465
SMTP Username: your_email
SMTP Password: your_password
```

## 👥 Default User Accounts

Setelah import database, gunakan akun default:

**Admin Account**
- Username: `admin`
- Password: `admin123` 
- Level: Admin

**Test User Account**  
- Username: `Selynch`
- Password: `admin123`
- Level: Admin

> **⚠️ Penting**: Segera ganti password default setelah instalasi!

## 📁 Struktur Direktori

```
web/
├── admin/              # Admin panel
├── assets/             # Static assets (CSS, JS, images)
├── auth/               # Authentication modules
├── ajax/               # AJAX handlers
├── dev/                # Development/login pages
├── id/                 # Guest/public pages
├── layouts/            # Template layouts
├── lib/                # Third-party libraries
├── system/             # Core system files
├── cron/               # Cron jobs
├── Database.sql        # Database schema
├── mainconfig.php      # Main configuration
├── index.php           # Main entry point
└── .htaccess          # Apache configuration
```

## 🔧 API Documentation

### Authentication
```http
POST /api/auth/login
Content-Type: application/json

{
    "username": "your_username", 
    "password": "your_password"
}
```

### Get Balance
```http
GET /api/user/balance
Authorization: Bearer your_api_key
```

### Place Order
```http
POST /api/order/create
Authorization: Bearer your_api_key
Content-Type: application/json

{
    "service_id": "ML5",
    "target": "12345678",
    "quantity": 1
}
```

## 🚀 Deployment

### Production Checklist
- [ ] Ganti semua password default
- [ ] Setup SSL certificate
- [ ] Konfigurasi firewall
- [ ] Setup backup otomatis
- [ ] Monitor error logs
- [ ] Optimasi database
- [ ] Setup CDN (optional)

### Recommended Production Settings
```php
// mainconfig.php
$_CONFIG['web']['environment'] = 'production';

// PHP settings
error_reporting(0);
display_errors = 0
log_errors = 1
```

## 🔒 Keamanan

### Implemented Security Features
- **Password Hashing**: Menggunakan PHP password_hash()
- **SQL Injection Protection**: Prepared statements dan escape string
- **XSS Protection**: Input sanitization
- **CSRF Protection**: Token validation
- **Session Security**: Secure session handling
- **Input Validation**: Server-side dan client-side validation

### Recommended Security Measures
1. **Regular Updates**: Update PHP dan dependencies
2. **Database Security**: Gunakan user database dengan privilese minimal
3. **File Permissions**: Set permissions yang tepat
4. **Backup Strategy**: Backup database dan files secara berkala
5. **Monitoring**: Monitor logs untuk aktivitas mencurigakan

## 📈 Fitur Modern yang Ditambahkan

### User Experience
- **Responsive Design**: Mobile-friendly interface
- **Real-time Notifications**: Status update real-time
- **Progressive Web App**: PWA capabilities
- **Dark Mode**: Theme switcher

### Payment Innovations
- **QR Code Payments**: QRIS integration
- **Crypto Payments**: Bitcoin/cryptocurrency support (optional)
- **Buy Now Pay Later**: Installment options
- **Loyalty Program**: Points and rewards system

### Business Features
- **Affiliate System**: Referral program
- **Multi-language**: Support bahasa Indonesia dan English
- **Analytics Dashboard**: Business intelligence
- **Marketing Tools**: Promo codes, discounts

## 🐛 Troubleshooting

### Common Issues

**1. Database Connection Error**
```bash
# Check database credentials in mainconfig.php
# Verify MySQL service is running
sudo systemctl status mysql
```

**2. Permission Denied**
```bash
# Fix file permissions
chmod -R 755 assets/
chown -R www-data:www-data web/
```

**3. Payment Gateway Issues**
```bash
# Check API keys configuration
# Verify internet connectivity
# Check provider API status
```

**4. Email Not Sending**
```bash
# Verify SMTP configuration
# Check firewall settings for port 587/465
# Test with mail() function
```

## 📞 Support

### Development Team
- **Lead Developer**: Ega Sembiring
- **GitHub**: https://github.com/egasembiring/web
- **Email**: support@example.com

### Community
- **Issues**: Report bugs di GitHub Issues
- **Documentation**: Wiki tersedia di repository
- **Updates**: Follow repository untuk update terbaru

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🙏 Credits

### Third-party Libraries
- **Bootstrap**: CSS Framework
- **jQuery**: JavaScript Library  
- **PHPMailer**: Email Library
- **Feather Icons**: Icon Set

### API Providers
- **Digiflazz**: Game top-up services
- **Tripay**: Payment gateway
- **Various E-Money APIs**: Digital wallet integrations

---

**⭐ Jika project ini membantu, jangan lupa untuk memberikan star di GitHub!**

**🚀 Happy Coding!**