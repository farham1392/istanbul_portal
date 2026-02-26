<?php
session_start();
error_reporting(0);

// ========== 1. تنظیمات دیتابیس ==========
define('DB_HOST', 'localhost');
define('DB_NAME', 'farhamza_istanbul_guide');
define('DB_USER', 'farhamza_farham');
define('DB_PASS', 'fz1392@@');

// ========== 2. اتصال به دیتابیس با PDO ==========
try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db_connected = true;
} catch (PDOException $e) {
    $db_connected = false;
    $db_error = 'خطا در اتصال به دیتابیس: ' . $e->getMessage();
    error_log('Database connection error: ' . $e->getMessage());
}

// ========== 3. هدرهای امنیتی ==========
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');

// ========== 4. CSRF Token ==========
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

date_default_timezone_set("Asia/Tehran");

// ========== 5. مدیریت زبان ==========
$default_language = 'fa';
$supported_languages = ['tr', 'fa', 'en', 'ar'];

if (isset($_GET['lang']) && in_array($_GET['lang'], $supported_languages)) {
    $_SESSION['lang'] = $_GET['lang'];
    $current_lang = $_GET['lang'];
} elseif (isset($_SESSION['lang']) && in_array($_SESSION['lang'], $supported_languages)) {
    $current_lang = $_SESSION['lang'];
} else {
    $current_lang = $default_language;
    $_SESSION['lang'] = $default_language;
}
$translations = [
    'tr' => [
        'page_title' => 'Giriş Sistemi | İstanbul Rehberi 🇹🇷',
        'welcome_title' => 'İstanbul Rehberi 🇹🇷',
        'welcome_subtitle' => 'İstanbul Turizm Rehberi - Sisteme Giriş',
        'login' => 'Giriş Yap',
        'username' => 'Kullanıcı Adı',
        'password' => 'Şifre',
        'username_placeholder' => 'Kullanıcı adınızı girin',
        'password_placeholder' => 'Şifrenizi girin',
        'login_button' => 'Giriş Yap',
        'register_button' => 'İstanbul Rehberine Kayıt Ol',
        'forgot_password' => 'Şifrenizi mi unuttunuz?',
        'or_social' => 'Veya sosyal hesaplarınızla giriş yapın',
        'copyright' => 'Tüm hakları saklıdır.',
        'privacy' => 'Gizlilik',
        'terms' => 'Kullanım Şartları',
        'back_home' => 'Ana Sayfa',
        'change_language' => 'Dili Değiştir',
        'invalid_token' => 'Geçersiz güvenlik tokenı.',
        'login_success' => 'Giriş başarılı!',
        'login_error' => 'Kullanıcı adı veya şifre hatalı.',
        'loading' => 'Giriş yapılıyor...',
        'invalid_username' => 'Lütfen geçerli bir kullanıcı adı girin (3-20 karakter, sadece İngilizce harfler, sayılar ve alt çizgi)',
        'invalid_password' => 'Şifre en az 8 karakter olmalıdır',
        'demo_user' => 'demo',
        'demo_pass' => 'demo123',
        'remember_me' => 'Beni Hatırla',
        'demo_credentials' => 'Demo: demo / demo123',
    ],
    'fa' => [
        'page_title' => 'ورود به سیستم | راهنمای استانبول 🇹🇷',
        'welcome_title' => 'راهنمای استانبول 🇹🇷',
        'welcome_subtitle' => 'راهنمای گردشگری استانبول - ورود به سیستم',
        'login' => 'ورود به سیستم',
        'username' => 'نام کاربری',
        'password' => 'رمز عبور',
        'username_placeholder' => 'نام کاربری خود را وارد کنید',
        'password_placeholder' => 'رمز عبور خود را وارد کنید',
        'login_button' => 'ورود به سیستم',
        'register_button' => 'ثبت نام در راهنمای استانبول',
        'forgot_password' => 'رمز عبور خود را فراموش کرده‌اید؟',
        'or_social' => 'یا با حساب‌های اجتماعی وارد شوید',
        'copyright' => 'تمامی حقوق محفوظ است.',
        'privacy' => 'حریم خصوصی',
        'terms' => 'قوانین استفاده',
        'back_home' => 'بازگشت به خانه',
        'change_language' => 'تغییر زبان',
        'invalid_token' => 'توکن امنیتی نامعتبر است.',
        'login_success' => 'ورود موفقیت‌آمیز بود!',
        'login_error' => 'نام کاربری یا رمز عبور اشتباه است.',
        'loading' => 'در حال ورود...',
        'invalid_username' => 'لطفاً یک نام کاربری معتبر وارد کنید (۳-۲۰ کاراکتر، فقط حروف انگلیسی، اعداد و زیرخط)',
        'invalid_password' => 'رمز عبور باید حداقل ۸ کاراکتر باشد',
        'demo_user' => 'demo',
        'demo_pass' => 'demo123',
        'remember_me' => 'مرا به خاطر بسپار',
        // 'demo_credentials' => 'دمو',
    ],
    'en' => [
        'page_title' => 'Login System | Istanbul Guide 🇹🇷',
        'welcome_title' => 'Istanbul Guide 🇹🇷',
        'welcome_subtitle' => 'Istanbul Tourism Guide - Login System',
        'login' => 'Login',
        'username' => 'Username',
        'password' => 'Password',
        'username_placeholder' => 'Enter your username',
        'password_placeholder' => 'Enter your password',
        'login_button' => 'Login',
        'register_button' => 'Register in Istanbul Guide',
        'forgot_password' => 'Forgot your password?',
        'or_social' => 'Or login with social accounts',
        'copyright' => 'All rights reserved.',
        'privacy' => 'Privacy',
        'terms' => 'Terms of Use',
        'back_home' => 'Back to Home',
        'change_language' => 'Change Language',
        'invalid_token' => 'Invalid security token.',
        'login_success' => 'Login successful!',
        'login_error' => 'Incorrect username or password.',
        'loading' => 'Logging in...',
        'invalid_username' => 'Please enter a valid username (3-20 characters, only English letters, numbers and underscore)',
        'invalid_password' => 'Password must be at least 8 characters',
        'demo_user' => 'demo',
        'demo_pass' => 'demo123',
        'remember_me' => 'Remember Me',
        // 'demo_credentials' => 'Demo: demo / demo123',
    ],
    'ar' => [
        'page_title' => 'نظام الدخول | دليل إسطنبول 🇹🇷',
        'welcome_title' => 'دليل إسطنبول 🇹🇷',
        'welcome_subtitle' => 'دليل السياحة في إسطنبول - نظام الدخول',
        'login' => 'تسجيل الدخول',
        'username' => 'اسم المستخدم',
        'password' => 'كلمة المرور',
        'username_placeholder' => 'أدخل اسم المستخدم',
        'password_placeholder' => 'أدخل كلمة المرور',
        'login_button' => 'تسجيل الدخول',
        'register_button' => 'التسجيل في دليل إسطنبول',
        'forgot_password' => 'هل نسيت كلمة المرور؟',
        'or_social' => 'أو تسجيل الدخول باستخدام الحسابات الاجتماعية',
        'copyright' => 'جميع الحقوق محفوظة.',
        'privacy' => 'الخصوصية',
        'terms' => 'شروط الاستخدام',
        'back_home' => 'العودة إلى الرئيسية',
        'change_language' => 'تغيير اللغة',
        'invalid_token' => 'رمز الأمان غير صالح.',
        'login_success' => 'تم تسجيل الدخول بنجاح!',
        'login_error' => 'اسم المستخدم أو كلمة المرور غير صحيحة.',
        'loading' => 'جارٍ تسجيل الدخول...',
        'invalid_username' => 'يرجى إدخال اسم مستخدم صالح (3-20 حرفًا، أحرف إنجليزية وأرقام وشرطة سفلية فقط)',
        'invalid_password' => 'يجب أن تكون كلمة المرور 8 أحرف على الأقل',
        'demo_user' => 'demo',
        'demo_pass' => 'demo123',
        'remember_me' => 'تذكرني',
        // 'demo_credentials' => 'تجريبي: demo / demo123',
    ]
];

// تابع ترجمه
function t($key) {
    global $translations, $current_lang;
    return isset($translations[$current_lang][$key]) ? $translations[$current_lang][$key] : $translations['en'][$key];
}

// تنظیم جهت صفحه
$direction = ($current_lang == 'fa' || $current_lang == 'ar') ? 'rtl' : 'ltr';

// ========== 7. بررسی آیا کاربر قبلاً وارد شده ==========
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     header('Location: index.php');
//     exit;
// }

// ========== 8. مدیریت فرم ورود ==========
$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // بررسی CSRF Token
    $csrf_token = $_POST['csrf_token'] ?? '';
    if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
        $error = t('invalid_token');
    } else {
        // ✅ دریافت مستقیم ورودی (بدون filter_var غلط)
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        // اعتبارسنجی اولیه
        if (empty($username) || empty($password)) {
            $error = t('login_error');
        } elseif (!preg_match('/^[A-Za-z0-9_]{3,20}$/', $username)) {
            $error = t('invalid_username');
        } elseif (strlen($password) < 8) {
            $error = t('invalid_password');
        } else {
            // بررسی اتصال دیتابیس
            if (!$db_connected) {
                $error = 'مشکل در اتصال به پایگاه داده، لطفاً بعداً تلاش کنید.';
                error_log('Login attempted while DB not connected');
            } else {
                try {
                    // Prepared statement
                    $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = :username LIMIT 1");
                    $stmt->execute([':username' => $username]);
                    $user = $stmt->fetch();

                    if ($user && password_verify($password, $user['password'])) {
                        // ورود موفق
                        session_regenerate_id(true);
                        $_SESSION['loggedin'] = true;
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['user_language'] = $current_lang;

                        $success = t('login_success');
                        header('refresh:2;url=index.php');
                    } else {
                        // تأخیر مصنوعی
                        usleep(rand(200000, 500000));
                        $error = t('login_error');
                    }
                } catch (PDOException $e) {
                    $error = 'خطای داخلی، لطفاً بعداً تلاش کنید.';
                    error_log('Login query error: ' . $e->getMessage());
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="description" content="Istanbul Advanced Content Management System - World-class login experience">
    <meta name="keywords" content="Istanbul, Tourism, Login, Turkey, Premium, Design">
    <meta name="author" content="Istanbul Guide Team">
    <title><?php echo t('page_title'); ?></title>
    
    <!-- Bootstrap 5.3 + RTL support -->
    <?php if($direction == 'rtl'): ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    <?php else: ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php endif; ?>
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts: Vazirmatn & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&family=Inter:wght=300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        /* ========== GLOBAL VARIABLES ========== */
        :root {
            --turkey-red: <?php echo $turkey_red; ?>;
            --turkey-white: <?php echo $turkey_white; ?>;
            --turkey-crescent: <?php echo $turkey_crescent; ?>;
            --gradient-turkey: linear-gradient(145deg, #E30A17 0%, #B00808 100%);
            --gradient-gold: linear-gradient(145deg, #FFD700, #FFA500);
            --glass-bg: rgba(255, 255, 255, 0.25);
            --glass-border: rgba(255, 255, 255, 0.5);
            --glass-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --neon-shadow: 0 0 20px rgba(227, 10, 23, 0.3);
            --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: <?php echo ($current_lang == 'fa' || $current_lang == 'ar') ? "'Vazirmatn', sans-serif" : "'Inter', sans-serif"; ?>;
            background: radial-gradient(circle at 10% 30%, #E30A17 0%, #8B0000 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* ========== ANIMATED BACKGROUND ========== */
        .premium-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            backdrop-filter: blur(5px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 50px rgba(255, 215, 0, 0.1);
            animation: float 20s infinite;
        }

        .floating-shape:nth-child(1) { width: 400px; height: 400px; top: -100px; left: -100px; animation-delay: 0s; }
        .floating-shape:nth-child(2) { width: 300px; height: 300px; bottom: -50px; right: -50px; animation-delay: -5s; background: rgba(255, 215, 0, 0.03); }
        .floating-shape:nth-child(3) { width: 200px; height: 200px; top: 40%; left: 60%; animation-delay: -10s; }
        .floating-shape:nth-child(4) { width: 150px; height: 150px; bottom: 20%; left: 10%; animation-delay: -7s; background: rgba(227, 10, 23, 0.03); }

        .star {
            position: absolute;
            color: rgba(255, 255, 255, 0.2);
            font-size: 24px;
            animation: twinkle 3s infinite alternate;
        }

        .star:nth-child(5) { top: 15%; left: 15%; animation-delay: 0s; }
        .star:nth-child(6) { top: 70%; right: 20%; animation-delay: -1s; }
        .star:nth-child(7) { bottom: 30%; left: 25%; animation-delay: -2s; }
        .star:nth-child(8) { top: 45%; right: 35%; animation-delay: -3s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-40px) rotate(10deg); }
        }

        @keyframes twinkle {
            0% { opacity: 0.1; transform: scale(0.8); }
            100% { opacity: 0.4; transform: scale(1.3); }
        }

        /* ========== MAIN GLASS CARD ========== */
        .login-wrapper {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 10;
            animation: fadeInScale 0.8s ease-out;
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 40px;
            box-shadow: 0 35px 68px rgba(0, 0, 0, 0.25), 0 0 0 2px rgba(255, 255, 255, 0.5) inset;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: var(--transition-smooth);
        }

        .glass-card:hover {
            box-shadow: 0 45px 80px rgba(0, 0, 0, 0.3), 0 0 0 3px rgba(255, 255, 255, 0.6) inset;
            transform: translateY(-5px);
        }

        /* ========== HEADER SECTION ========== */
        .login-header {
            background: var(--gradient-turkey);
            padding: 45px 35px 35px;
            text-align: center;
            position: relative;
            border-bottom: 6px solid var(--turkey-white);
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }

        .logo-3d {
            width: 110px;
            height: 110px;
            background: white;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2), 0 0 0 5px rgba(255, 255, 255, 0.2);
            animation: morphing 6s infinite, float 6s infinite;
            position: relative;
        }

        @keyframes morphing {
            0% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
            25% { border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%; }
            50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
            75% { border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%; }
            100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        }

        .logo-3d i {
            font-size: 55px;
            background: var(--gradient-turkey);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 5px 10px rgba(0,0,0,0.2));
        }

        .login-header h1 {
            color: white;
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 10px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.3);
            letter-spacing: -0.5px;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.1rem;
            font-weight: 500;
            text-shadow: 0 2px 5px rgba(0,0,0,0.2);
            max-width: 280px;
            margin: 0 auto;
        }

        /* ========== FORM BODY ========== */
        .login-body {
            padding: 45px 40px;
            background: transparent;
        }

        /* Alert styling */
        .alert {
            border-radius: 20px;
            border: none;
            padding: 18px 20px;
            margin-bottom: 30px;
            animation: slideInDown 0.5s;
            backdrop-filter: blur(10px);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .alert-danger {
            background: rgba(255, 235, 238, 0.9);
            color: #B71C1C;
            border-left: 6px solid #E30A17;
        }

        .alert-success {
            background: rgba(232, 245, 233, 0.9);
            color: #1B5E20;
            border-left: 6px solid #2E7D32;
        }

        /* Form floating customization */
        .form-floating {
            margin-bottom: 25px;
        }

        .form-floating .input-group {
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            border-radius: 20px;
            transition: var(--transition-smooth);
            background: white;
        }

        .form-floating .input-group:focus-within {
            box-shadow: 0 8px 25px rgba(227, 10, 23, 0.2), 0 0 0 3px rgba(227, 10, 23, 0.1);
            transform: scale(1.01);
        }

        .input-group-text {
            background: white;
            border: 2px solid #f0f0f0;
            border-<?php echo ($direction == 'rtl') ? 'left' : 'right'; ?>: none;
            border-radius: <?php echo ($direction == 'rtl') ? '0 20px 20px 0' : '20px 0 0 20px'; ?>;
            color: var(--turkey-red);
            font-size: 1.2rem;
            padding: 0 20px;
            transition: var(--transition-smooth);
        }

        .input-group .form-control {
            border: 2px solid #f0f0f0;
            border-<?php echo ($direction == 'rtl') ? 'right' : 'left'; ?>: none;
            border-radius: <?php echo ($direction == 'rtl') ? '20px 0 0 20px' : '0 20px 20px 0'; ?>;
            padding: 20px 15px 10px 15px;
            height: auto;
            font-size: 1rem;
            transition: var(--transition-smooth);
            background: white;
        }

        .form-control:focus {
            border-color: var(--turkey-red);
            box-shadow: none;
            background: white;
        }

        .form-floating label {
            padding-<?php echo ($direction == 'rtl') ? 'right' : 'left'; ?>: 60px;
            color: #555;
            font-weight: 500;
        }

        .form-floating label i {
            color: var(--turkey-red);
            margin-<?php echo ($direction == 'rtl') ? 'left' : 'right'; ?>: 8px;
        }

        /* Password toggle button */
        .password-toggle {
            position: absolute;
            <?php echo ($direction == 'rtl') ? 'left' : 'right'; ?>: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #888;
            cursor: pointer;
            z-index: 10;
            font-size: 1.1rem;
            transition: var(--transition-smooth);
        }

        .password-toggle:hover {
            color: var(--turkey-red);
            transform: translateY(-50%) scale(1.1);
        }

        /* Password strength meter */
        .strength-meter {
            margin-top: 10px;
            height: 6px;
            background: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #ff6b6b, #ffd166, #06d6a0, #118ab2);
            border-radius: 10px;
            transition: width 0.3s ease;
        }

        .strength-text {
            font-size: 0.8rem;
            margin-top: 5px;
            color: #6c757d;
            text-align: <?php echo $direction == 'rtl' ? 'right' : 'left'; ?>;
        }

        /* Remember me checkbox */
        .remember-me {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0 15px;
            color: #555;
            font-weight: 500;
        }

        .remember-me input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: var(--turkey-red);
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        /* Buttons */
        .btn-login {
            background: var(--gradient-turkey);
            border: none;
            color: white;
            padding: 18px 25px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: 1px;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(227, 10, 23, 0.3);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .btn-login:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(227, 10, 23, 0.4);
        }

        .btn-login i {
            transition: var(--transition-smooth);
        }

        .btn-login:hover i {
            transform: translateX(<?php echo ($direction == 'rtl') ? '-5px' : '5px'; ?>);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.7s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-register {
            background: transparent;
            border: 3px solid var(--turkey-red);
            color: var(--turkey-red);
            padding: 16px 25px;
            border-radius: 30px;
            font-weight: 700;
            transition: var(--transition-smooth);
            width: 100%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 15px;
        }

        .btn-register:hover {
            background: var(--turkey-red);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(227, 10, 23, 0.25);
        }

        .forgot-password {
            text-align: center;
            margin-top: 25px;
        }

        .forgot-password a {
            color: var(--turkey-red);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition-smooth);
            border-bottom: 2px solid transparent;
            padding-bottom: 3px;
        }

        .forgot-password a:hover {
            border-bottom-color: var(--turkey-red);
            transform: translateY(-2px);
        }

        /* Demo credentials box */
        .demo-box {
            background: rgba(227, 10, 23, 0.08);
            border: 2px dashed var(--turkey-red);
            border-radius: 20px;
            padding: 15px 20px;
            margin: 25px 0 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            backdrop-filter: blur(5px);
            color: var(--turkey-red);
            font-weight: 600;
            animation: pulse 2s infinite;
        }

        .demo-box i {
            font-size: 1.5rem;
        }

        /* Social login */
        .social-login {
            margin-top: 35px;
            padding-top: 30px;
            border-top: 2px solid rgba(0,0,0,0.05);
            text-align: center;
        }

        .social-login p {
            color: #666;
            margin-bottom: 20px;
            font-weight: 500;
            position: relative;
        }

        .social-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .social-btn {
            width: 55px;
            height: 55px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            transition: var(--transition-smooth);
            text-decoration: none;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        .social-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(145deg, rgba(255,255,255,0.2), transparent);
        }

        .social-btn:hover {
            transform: translateY(-8px) rotate(5deg);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .facebook { background: #1877f2; }
        .twitter { background: #1da1f2; }
        .google { background: #db4437; }

        /* Footer */
        .login-footer {
            padding: 30px;
            text-align: center;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.6);
            color: #444;
            font-weight: 500;
        }

        .login-footer a {
            color: var(--turkey-red);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .login-footer a:hover {
            color: #B00808;
            text-decoration: underline;
        }

        /* Language switcher - premium */
        .language-wrapper {
            position: absolute;
            top: 25px;
            <?php echo ($direction == 'rtl') ? 'left: 25px;' : 'right: 25px;'; ?>
            z-index: 100;
        }

        .lang-btn {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.5);
            color: white;
            padding: 12px 25px;
            border-radius: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            transition: var(--transition-smooth);
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .lang-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: white;
            transform: scale(1.05);
        }

        .lang-dropdown {
            position: absolute;
            top: 120%;
            <?php echo ($direction == 'rtl') ? 'right: 0;' : 'left: 0;'; ?>
            background: white;
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
            min-width: 200px;
            display: none;
            overflow: hidden;
            border: 2px solid var(--turkey-red);
            animation: slideDown 0.3s;
        }

        .language-wrapper:hover .lang-dropdown {
            display: block;
        }

        .lang-dropdown a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 25px;
            text-decoration: none;
            color: #333;
            transition: var(--transition-smooth);
            border-bottom: 1px solid #f1f1f1;
            font-weight: 500;
        }

        .lang-dropdown a:hover {
            background: var(--gradient-turkey);
            color: white;
        }

        .lang-dropdown a i {
            width: 24px;
            text-align: center;
        }

        /* Back to home button */
        .back-wrapper {
            position: absolute;
            top: 25px;
            <?php echo ($direction == 'rtl') ? 'right: 25px;' : 'left: 25px;'; ?>
            z-index: 100;
        }

        .back-btn {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.5);
            color: white;
            padding: 12px 20px;
            border-radius: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: white;
            transform: translateX(<?php echo ($direction == 'rtl') ? '-5px' : '5px'; ?>);
            color: white;
        }

        /* Validation styles */
        .was-validated .form-control:invalid,
        .form-control.is-invalid {
            border-color: #dc3545;
            background-image: none;
        }

        .invalid-feedback {
            <?php echo ($direction == 'rtl') ? 'text-align: right;' : 'text-align: left;'; ?>
            font-size: 0.85rem;
            margin-top: 5px;
            color: #dc3545;
            font-weight: 500;
        }

        /* Loading animation */
        .loading-spinner {
            display: inline-block;
            width: 1.2rem;
            height: 1.2rem;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-wrapper {
                padding: 0 10px;
            }
            
            .login-header {
                padding: 35px 25px;
            }
            
            .login-body {
                padding: 35px 25px;
            }
            
            .logo-3d {
                width: 90px;
                height: 90px;
            }
            
            .logo-3d i {
                font-size: 45px;
            }
            
            .login-header h1 {
                font-size: 1.8rem;
            }
            
            .back-wrapper .back-btn span,
            .language-wrapper .lang-btn span {
                display: none;
            }
            
            .back-wrapper, .language-wrapper {
                top: 15px;
            }
            
            .back-btn, .lang-btn {
                padding: 12px 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Premium Animated Background -->
    <div class="premium-bg">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="star">★</div>
        <div class="star">★</div>
        <div class="star">★</div>
        <div class="star">★</div>
        <div class="star">★</div>
    </div>

    <!-- Back to Home Button -->
    <div class="back-wrapper">
        <a href="index.php" class="back-btn">
            <i class="fas fa-arrow-<?php echo ($direction == 'rtl') ? 'right' : 'left'; ?>"></i>
            <span><?php echo t('back_home'); ?></span>
        </a>
    </div>

    <!-- Language Switcher -->
    <div class="language-wrapper">
        <button class="lang-btn">
            <i class="fas fa-globe-asia"></i>
            <span>
                <?php 
                $language_names = [
                    'tr' => 'Türkçe',
                    'fa' => 'فارسی',
                    'en' => 'English',
                    'ar' => 'العربية'
                ];
                echo $language_names[$current_lang];
                ?>
            </span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <div class="lang-dropdown">
            <a href="?lang=tr"><i class="fas fa-flag-usa"></i> 🇹🇷 Türkçe</a>
            <a href="?lang=fa"><i class="fas fa-flag-usa"></i> 🇮🇷 فارسی</a>
            <a href="?lang=en"><i class="fas fa-flag-usa"></i> 🇬🇧 English</a>
            <a href="?lang=ar"><i class="fas fa-flag-usa"></i> 🇸🇦 العربية</a>
        </div>
    </div>

    <!-- Main Login Card -->
    <div class="login-wrapper">
        <div class="glass-card">
            <div class="login-header">
                <div class="logo-3d animate__animated animate__bounceIn">
                    <i class="fas fa-landmark"></i>
                </div>
                <h1 class="animate__animated animate__fadeInUp"><?php echo t('welcome_title'); ?></h1>
                <p class="animate__animated animate__fadeInUp animate__delay-0.2s"><?php echo t('welcome_subtitle'); ?></p>
            </div>

            <div class="login-body">
                <!-- Messages -->
                <?php if ($error): ?>
                    <div class="alert alert-danger animate__animated animate__headShake" role="alert">
                        <i class="fas fa-exclamation-circle fa-2x"></i>
                        <div><?php echo htmlspecialchars($error); ?></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" style="margin-<?php echo ($direction == 'rtl') ? 'right' : 'left'; ?>: auto;"></button>
                    </div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div class="alert alert-success animate__animated animate__bounceIn" role="alert">
                        <i class="fas fa-check-circle fa-2x"></i>
                        <div><?php echo htmlspecialchars($success); ?></div>
                        <div class="progress mt-2" style="height: 4px; width: 100%;">
                            <div class="progress-bar bg-success" style="width: 100%; animation: progress 2s linear;"></div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Demo Credentials Box -->
                

                <!-- Login Form -->
                <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    
                    <!-- Username Field -->
                    <div class="form-floating">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" 
                                   class="form-control" 
                                   id="username" 
                                   name="username" 
                                   placeholder="<?php echo t('username_placeholder'); ?>"
                                   required
                                   autocomplete="username"
                                   pattern="[A-Za-z0-9_]{3,20}"
                                   title="<?php echo t('invalid_username'); ?>"
                                   value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                            <label for="username">
                                <i class="fas fa-user"></i> <?php echo t('username'); ?>
                            </label>
                            <div class="invalid-feedback">
                                <?php echo t('invalid_username'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="form-floating">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" 
                                   class="form-control" 
                                   id="password" 
                                   name="password" 
                                   placeholder="<?php echo t('password_placeholder'); ?>"
                                   required
                                   autocomplete="current-password"
                                   minlength="8"
                                   title="<?php echo t('invalid_password'); ?>">
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye"></i>
                            </button>
                            <label for="password">
                                <i class="fas fa-key"></i> <?php echo t('password'); ?>
                            </label>
                            <div class="invalid-feedback">
                                <?php echo t('invalid_password'); ?>
                            </div>
                        </div>
                        <!-- Password Strength Meter -->
                        <div class="strength-meter">
                            <div class="strength-bar" id="strengthBar"></div>
                        </div>
                        <div class="strength-text" id="strengthText">نیروی رمز عبور: ضعیف</div>
                    </div>

                    <!-- Remember Me -->
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember"><?php echo t('remember_me'); ?></label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            name="login" 
                            class="btn btn-login"
                            id="btnLogin">
                        <i class="fas fa-sign-in-alt"></i> <?php echo t('login_button'); ?>
                    </button>

                    <!-- Register Button -->
                    <a href="register.php" class="btn btn-register">
                        <i class="fas fa-user-plus"></i> <?php echo t('register_button'); ?>
                    </a>

                    <!-- Forgot Password -->
                    

                    <!-- Social Login -->
                    <!--<div class="social-login">-->
                    <!--    <p><?php echo t('or_social'); ?></p>-->
                    <!--    <div class="social-buttons">-->
                    <!--        <a href="#" class="social-btn facebook">-->
                    <!--            <i class="fab fa-facebook-f"></i>-->
                    <!--        </a>-->
                    <!--        <a href="#" class="social-btn twitter">-->
                    <!--            <i class="fab fa-twitter"></i>-->
                    <!--        </a>-->
                    <!--        <a href="#" class="social-btn google">-->
                    <!--            <i class="fab fa-google"></i>-->
                    <!--        </a>-->
                    <!--    </div>-->
                    <!--</div>-->
                </form>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                © <?php echo date('Y'); ?> Istanbul Guide. <?php echo t('copyright'); ?> 🇹🇷
                <br>
                <a href="privacy.php"><?php echo t('privacy'); ?></a> | 
                <a href="terms.php"><?php echo t('terms'); ?></a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // ========== GLOBAL SCRIPT ==========
        (function() {
            "use strict";

            // ---------- Password Toggle ----------
            window.togglePassword = function() {
                const passwordField = document.getElementById('password');
                const eyeIcon = document.querySelector('.password-toggle i');
                
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            };

            // ---------- Password Strength Meter ----------
            function checkPasswordStrength(password) {
                let strength = 0;
                
                if (password.length >= 8) strength += 25;
                if (password.length >= 12) strength += 25;
                if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 25;
                if (/[0-9]/.test(password)) strength += 15;
                if (/[^A-Za-z0-9]/.test(password)) strength += 10;
                
                return Math.min(strength, 100);
            }

            function updateStrengthMeter(password) {
                const strength = checkPasswordStrength(password);
                const bar = document.getElementById('strengthBar');
                const text = document.getElementById('strengthText');
                
                bar.style.width = strength + '%';
                
                if (strength < 40) {
                    text.innerHTML = '<?php echo ($current_lang == 'fa') ? 'نیروی رمز عبور: ضعیف' : 'Password strength: Weak'; ?>';
                    bar.style.background = 'linear-gradient(90deg, #ff6b6b, #ff8787)';
                } else if (strength < 70) {
                    text.innerHTML = '<?php echo ($current_lang == 'fa') ? 'نیروی رمز عبور: متوسط' : 'Password strength: Medium'; ?>';
                    bar.style.background = 'linear-gradient(90deg, #ffd166, #ffe08c)';
                } else if (strength < 90) {
                    text.innerHTML = '<?php echo ($current_lang == 'fa') ? 'نیروی رمز عبور: قوی' : 'Password strength: Strong'; ?>';
                    bar.style.background = 'linear-gradient(90deg, #06d6a0, #00b894)';
                } else {
                    text.innerHTML = '<?php echo ($current_lang == 'fa') ? 'نیروی رمز عبور: بسیار قوی' : 'Password strength: Very Strong'; ?>';
                    bar.style.background = 'linear-gradient(90deg, #118ab2, #0077b6)';
                }
            }

            // ---------- Form Validation & Loading ----------
            const form = document.getElementById('loginForm');
            const passwordInput = document.getElementById('password');
            const btnLogin = document.getElementById('btnLogin');

            // Real-time password strength
            if (passwordInput) {
                passwordInput.addEventListener('input', function() {
                    updateStrengthMeter(this.value);
                });
                // Initial call in case of prefilled value
                updateStrengthMeter(passwordInput.value);
            }

            // Form submit handler
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                } else {
                    // Disable button and show loading
                    // btnLogin.disabled = true;
                    btnLogin.innerHTML = '<span class="loading-spinner"></span> <?php echo t('loading'); ?>';
                }
                form.classList.add('was-validated');
            }, false);

            // Real-time validation feedback
            const inputs = form.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    }
                });
            });

            // Auto-close alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    if (alert) {
                        const closeBtn = alert.querySelector('.btn-close');
                        if (closeBtn) closeBtn.click();
                    }
                }, 5000);
            });

            // Smooth language switch (prevent default anchor behavior)
            document.querySelectorAll('.lang-dropdown a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const lang = this.getAttribute('href').split('=')[1];
                    window.location.href = '?lang=' + lang;
                });
            });

            // Animate on scroll (simple)
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                    }
                });
            });

            document.querySelectorAll('.form-floating, .btn, .demo-box').forEach(el => observer.observe(el));

            // Console welcome message
            console.log('%c🌟 Istanbul Guide - Premium Login System 🌟', 'font-size: 16px; color: #E30A17;');
            console.log('%c🇹🇷 World-class design • Multi-language • CSRF Protected', 'font-size: 14px; color: #FFD700;');
        })();
    </script>
</body>
</html>