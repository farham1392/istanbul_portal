<?php
// تنظیمات اصلی
define('SITE_NAME', 'Istanbul Guide');
define('SITE_URL', 'http://localhost/istanbul portal');
define('TIMEZONE', 'Asia/Tehran');

// تنظیمات امنیتی
define('SECRET_KEY', '');
define('JWT_EXPIRE', 86400); // 24 ساعت

// تنظیمات آپلود فایل
define('UPLOAD_DIR', 'uploads/');
define('MAX_FILE_SIZE', 5242880); // 5MB
define('ALLOWED_TYPES', ['jpg', 'jpeg', 'png', 'gif', 'webp']);

// تنظیمات ایمیل
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');
define('SMTP_PASS', 'your-password');
define('EMAIL_FROM', 'noreply@istanbulguide.com');

// نمایش یا عدم نمایش خطاها
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// تنظیم هدرهای CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

// مدیریت درخواست‌های OPTIONS برای CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

// تنظیم زمان منطقه
date_default_timezone_set(TIMEZONE);

// شروع session
session_start();

$pdo = new PDO(
    "mysql:host=localhost;dbname=istanbul_guide;charset=utf8",
    "root",
    ""
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$OPENAI_API_KEY = "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";
?>