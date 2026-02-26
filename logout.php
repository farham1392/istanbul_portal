<?php
session_start();
error_reporting(0);

// ========== تنظیمات مسیر ==========
define('LOGIN_PAGE', 'login.php'); // صفحه ورود شما

// ========== هدرهای امنیتی ==========
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');

// ========== خروج از سیستم ==========
$_SESSION = []; // پاک کردن تمام متغیرهای جلسه

// نابود کردن کوکی جلسه اگر وجود دارد
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// نابود کردن کامل جلسه
session_destroy();

// بازسازی مجدد session id برای امنیت بیشتر
session_start();
session_regenerate_id(true);
session_destroy();

// ========== هدایت به صفحه ورود ==========
header('Location: ' . LOGIN_PAGE . '?logout=success');
exit;
?>