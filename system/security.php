<?php
/**
 * Security Enhancement Functions
 * Enhanced security features for the web application
 */

class SecurityManager {
    
    private $db;
    private $maxLoginAttempts = 5;
    private $lockoutTime = 900; // 15 minutes
    
    public function __construct($database) {
        $this->db = $database;
    }
    
    /**
     * Rate limiting for login attempts
     */
    public function checkLoginAttempts($ip, $username) {
        $time = time() - $this->lockoutTime;
        
        // Clean old attempts
        $this->db->query("DELETE FROM login_attempts WHERE attempt_time < {$time}");
        
        // Count recent attempts
        $result = $this->db->query("SELECT COUNT(*) as count FROM login_attempts 
                                   WHERE (ip = '{$ip}' OR username = '{$username}') 
                                   AND attempt_time > {$time}");
        $attempts = $result->fetch_assoc()['count'];
        
        return $attempts < $this->maxLoginAttempts;
    }
    
    /**
     * Record failed login attempt
     */
    public function recordFailedLogin($ip, $username) {
        $time = time();
        $this->db->query("INSERT INTO login_attempts (ip, username, attempt_time) 
                         VALUES ('{$ip}', '{$username}', {$time})");
    }
    
    /**
     * Generate CSRF token
     */
    public function generateCSRFToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    
    /**
     * Verify CSRF token
     */
    public function verifyCSRFToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
    
    /**
     * Sanitize input data
     */
    public function sanitizeInput($data) {
        if (is_array($data)) {
            return array_map([$this, 'sanitizeInput'], $data);
        }
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }
    
    /**
     * Validate password strength
     */
    public function validatePasswordStrength($password) {
        $errors = [];
        
        if (strlen($password) < 8) {
            $errors[] = 'Password minimal 8 karakter';
        }
        
        if (!preg_match('/[A-Z]/', $password)) {
            $errors[] = 'Password harus mengandung huruf besar';
        }
        
        if (!preg_match('/[a-z]/', $password)) {
            $errors[] = 'Password harus mengandung huruf kecil';
        }
        
        if (!preg_match('/[0-9]/', $password)) {
            $errors[] = 'Password harus mengandung angka';
        }
        
        return $errors;
    }
    
    /**
     * Generate secure random password
     */
    public function generateSecurePassword($length = 12) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }
        return $password;
    }
    
    /**
     * Check if IP is suspicious
     */
    public function checkSuspiciousIP($ip) {
        // Check against known malicious IPs (implement your own blacklist)
        $suspiciousIPs = [
            // Add known malicious IPs here
        ];
        
        return in_array($ip, $suspiciousIPs);
    }
    
    /**
     * Log security events
     */
    public function logSecurityEvent($event, $details, $severity = 'info') {
        $timestamp = date('Y-m-d H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
        
        $logEntry = [
            'timestamp' => $timestamp,
            'event' => $event,
            'details' => $details,
            'severity' => $severity,
            'ip' => $ip,
            'user_agent' => $userAgent
        ];
        
        // Insert into security_logs table
        $this->db->query("INSERT INTO security_logs 
                         (timestamp, event, details, severity, ip, user_agent) 
                         VALUES ('{$timestamp}', '{$event}', '{$details}', '{$severity}', '{$ip}', '{$userAgent}')");
    }
    
    /**
     * Generate 2FA code
     */
    public function generate2FACode() {
        return sprintf('%06d', random_int(0, 999999));
    }
    
    /**
     * Send 2FA code via email
     */
    public function send2FACode($email, $code) {
        // Implement email sending logic here
        // This is a placeholder - integrate with your email system
        return true;
    }
    
    /**
     * Validate session security
     */
    public function validateSession() {
        // Check session hijacking
        if (!isset($_SESSION['user_ip'])) {
            $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
        } elseif ($_SESSION['user_ip'] !== $_SERVER['REMOTE_ADDR']) {
            // IP changed - possible session hijacking
            session_destroy();
            return false;
        }
        
        // Check session timeout
        if (isset($_SESSION['last_activity']) && 
            (time() - $_SESSION['last_activity']) > 3600) { // 1 hour timeout
            session_destroy();
            return false;
        }
        
        $_SESSION['last_activity'] = time();
        return true;
    }
    
    /**
     * Encrypt sensitive data
     */
    public function encryptData($data, $key) {
        $cipher = 'AES-256-GCM';
        $iv = random_bytes(12);
        $tag = '';
        
        $encrypted = openssl_encrypt($data, $cipher, $key, OPENSSL_RAW_DATA, $iv, $tag);
        return base64_encode($iv . $tag . $encrypted);
    }
    
    /**
     * Decrypt sensitive data
     */
    public function decryptData($encryptedData, $key) {
        $cipher = 'AES-256-GCM';
        $data = base64_decode($encryptedData);
        
        $iv = substr($data, 0, 12);
        $tag = substr($data, 12, 16);
        $encrypted = substr($data, 28);
        
        return openssl_decrypt($encrypted, $cipher, $key, OPENSSL_RAW_DATA, $iv, $tag);
    }
}

// Additional security functions

/**
 * Enhanced CSRF token function
 */
function csrf_token() {
    global $security;
    return $security ? $security->generateCSRFToken() : '';
}

/**
 * Enhanced input sanitization
 */
function secure_input($data) {
    global $security;
    return $security ? $security->sanitizeInput($data) : htmlspecialchars($data);
}

/**
 * Check if request is AJAX
 */
function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

/**
 * Generate secure API key
 */
function generate_api_key($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

/**
 * Rate limiting function
 */
function rate_limit($identifier, $max_requests = 60, $window = 3600) {
    $cache_key = "rate_limit_" . md5($identifier);
    
    if (!isset($_SESSION[$cache_key])) {
        $_SESSION[$cache_key] = ['count' => 0, 'reset_time' => time() + $window];
    }
    
    $data = $_SESSION[$cache_key];
    
    if (time() > $data['reset_time']) {
        $_SESSION[$cache_key] = ['count' => 1, 'reset_time' => time() + $window];
        return true;
    }
    
    if ($data['count'] >= $max_requests) {
        return false;
    }
    
    $_SESSION[$cache_key]['count']++;
    return true;
}

/**
 * Detect bot/crawler
 */
function is_bot() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    
    $bots = [
        'bot', 'crawler', 'spider', 'scraper', 'curl', 'wget', 'python', 'java'
    ];
    
    foreach ($bots as $bot) {
        if (stripos($user_agent, $bot) !== false) {
            return true;
        }
    }
    
    return false;
}

/**
 * Validate file upload security
 */
function validate_upload($file) {
    $errors = [];
    
    // Check file size (max 5MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        $errors[] = 'File terlalu besar (maksimal 5MB)';
    }
    
    // Check file type
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
    if (!in_array($file['type'], $allowed_types)) {
        $errors[] = 'Tipe file tidak diizinkan';
    }
    
    // Check file extension
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_extensions)) {
        $errors[] = 'Ekstensi file tidak diizinkan';
    }
    
    // Check for executable content
    if (is_executable($file['tmp_name'])) {
        $errors[] = 'File berisi konten yang dapat dieksekusi';
    }
    
    return $errors;
}

/**
 * Secure file upload
 */
function secure_upload($file, $destination) {
    $errors = validate_upload($file);
    
    if (!empty($errors)) {
        return ['success' => false, 'errors' => $errors];
    }
    
    // Generate secure filename
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $secure_filename = bin2hex(random_bytes(16)) . '.' . $file_extension;
    $full_path = $destination . '/' . $secure_filename;
    
    if (move_uploaded_file($file['tmp_name'], $full_path)) {
        return ['success' => true, 'filename' => $secure_filename];
    }
    
    return ['success' => false, 'errors' => ['Gagal mengunggah file']];
}

// Initialize security manager if database is available
if (isset($db)) {
    $security = new SecurityManager($db);
    
    // Create security tables if they don't exist
    $security_tables = [
        "CREATE TABLE IF NOT EXISTS login_attempts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            ip VARCHAR(45) NOT NULL,
            username VARCHAR(100) NOT NULL,
            attempt_time INT NOT NULL,
            INDEX(ip),
            INDEX(username),
            INDEX(attempt_time)
        )",
        "CREATE TABLE IF NOT EXISTS security_logs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            timestamp DATETIME NOT NULL,
            event VARCHAR(100) NOT NULL,
            details TEXT,
            severity ENUM('info', 'warning', 'error', 'critical') DEFAULT 'info',
            ip VARCHAR(45) NOT NULL,
            user_agent TEXT,
            INDEX(timestamp),
            INDEX(event),
            INDEX(severity)
        )",
        "CREATE TABLE IF NOT EXISTS user_sessions (
            id VARCHAR(128) PRIMARY KEY,
            user_id INT NOT NULL,
            ip_address VARCHAR(45) NOT NULL,
            user_agent TEXT,
            created_at DATETIME NOT NULL,
            last_activity DATETIME NOT NULL,
            expires_at DATETIME NOT NULL,
            INDEX(user_id),
            INDEX(ip_address),
            INDEX(expires_at)
        )"
    ];
    
    foreach ($security_tables as $query) {
        $db->query($query);
    }
}
?>