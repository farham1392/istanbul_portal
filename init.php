<?php
// includes/init.php

/**
 * فایل تنظیمات اولیه و شروع سشن
 */

// مسیر ریشه پروژه
define('ROOT_PATH', dirname(__DIR__));

// بارگذاری تنظیمات
require_once ROOT_PATH . '/config.php';

// تنظیم زمان محلی
date_default_timezone_set('Asia/Tehran');

// شروع سشن با تنظیمات امنیتی
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 86400 * 30, // 30 روز
        'path' => '/',
        'domain' => $_SERVER['HTTP_HOST'] ?? '',
        'secure' => isset($_SERVER['HTTPS']), // فقط روی HTTPS
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    
    session_name('ISTANBUL_GUIDE_SESSION');
    session_start();
    
    // Regenerate session ID برای جلوگیری از session fixation
    if (!isset($_SESSION['created'])) {
        session_regenerate_id(true);
        $_SESSION['created'] = time();
    } elseif (time() - $_SESSION['created'] > 1800) { // هر 30 دقیقه
        session_regenerate_id(true);
        $_SESSION['created'] = time();
    }
}

// تنظیم هدرهای امنیتی
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

// تنظیم هدرهای CORS برای API
if (isset($_SERVER['HTTP_ORIGIN'])) {
    $allowed_origins = [
        'http://localhost',
        'https://localhost',
        'https://farhamzamani.com',
        FRONTEND_URL
    ];
    
    if (in_array($_SERVER['HTTP_ORIGIN'], $allowed_origins)) {
        header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400'); // کش 1 روز
    }
}

// برای درخواست‌های OPTIONS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    }
    
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    }
    
    exit(0);
}

// تنظیم کدینگ و نوع محتوا
header('Content-Type: text/html; charset=utf-8');

// تنظیم متغیرهای گلوبال
$GLOBALS['config'] = $config;

// بارگذاری توابع
require_once ROOT_PATH . '/includes/functions.php';

// بررسی نسخه PHP
if (version_compare(PHP_VERSION, '7.4.0', '<')) {
    die('PHP 7.4.0 یا بالاتر مورد نیاز است');
}

// بررسی فعال بودن اکسپنشن‌ها
if (!extension_loaded('openssl')) {
    die('اکستنشن OpenSSL مورد نیاز است');
}

// بررسی فعال بودن PDO
if (!extension_loaded('pdo_mysql')) {
    die('اکستنشن PDO MySQL مورد نیاز است');
}

// تنظیم خطاها
if (defined('DEBUG') && DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}

// ثبت شروع درخواست
if (defined('DEBUG') && DEBUG) {
    error_log("Request started: " . $_SERVER['REQUEST_METHOD'] . " " . $_SERVER['REQUEST_URI']);
}

// تابع shutdown برای ثبت خطاها
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error !== null && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        error_log("Fatal error: " . print_r($error, true));
        
        if (!defined('DEBUG') || !DEBUG) {
            // نمایش صفحه خطا
            http_response_code(500);
            include ROOT_PATH . '/templates/error/500.php';
        }
    }
});

// تابع auto-load برای کلاس‌ها
spl_autoload_register(function ($className) {
    $paths = [
        ROOT_PATH . '/includes/classes/',
        ROOT_PATH . '/includes/models/',
        ROOT_PATH . '/includes/controllers/'
    ];
    
    $className = str_replace('\\', '/', $className);
    $filename = $className . '.php';
    
    foreach ($paths as $path) {
        $file = $path . $filename;
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// بررسی نصب
if (!file_exists(ROOT_PATH . '/installed.txt')) {
    if (basename($_SERVER['PHP_SELF']) !== 'install.php') {
        header('Location: /install.php');
        exit;
    }
}

// تنظیم زبان کاربر
if (!isset($_SESSION['language'])) {
    // تشخیص زبان مرورگر
    $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'fa', 0, 2);
    $allowedLangs = ['fa', 'en', 'tr', 'ar'];
    $_SESSION['language'] = in_array($browserLang, $allowedLangs) ? $browserLang : 'fa';
}

// تنظیم تم کاربر
if (!isset($_SESSION['theme'])) {
    // بررسی تم سیستم
    if (isset($_SERVER['HTTP_SEC_CH_PREFERS_COLOR_SCHEME'])) {
        $_SESSION['theme'] = $_SERVER['HTTP_SEC_CH_PREFERS_COLOR_SCHEME'];
    } else {
        $_SESSION['theme'] = 'light';
    }
}

// تنظیم CSRF Token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// تعریف ثابت‌های بیشتر
define('CURRENT_LANG', $_SESSION['language']);
define('CURRENT_THEME', $_SESSION['theme']);
define('CSRF_TOKEN', $_SESSION['csrf_token']);
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
                  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

// شروع بافر خروجی
ob_start();
?>