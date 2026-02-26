<?php
error_reporting(0);  
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    file_put_contents('debug_post.txt', print_r($_POST, true) . PHP_EOL, FILE_APPEND);
    file_put_contents('debug_post.txt', 'register key: ' . (isset($_POST['register']) ? 'YES' : 'NO') . PHP_EOL, FILE_APPEND);
}


// ========== 1. تنظیمات دیتابیس (مقادیر را با اطلاعات خودت جایگزین کن) ==========
define('DB_HOST', 'localhost');      // میزبان دیتابیس
define('DB_NAME', 'farhamza_istanbul_guide');  // نام دیتابیس
define('DB_USER', 'farhamza_farham'); // نام کاربری دیتابیس
define('DB_PASS', 'fz1392@@'); // رمز عبور دیتابیس

// ========== 2. اتصال به دیتابیس با PDO ==========
try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db_connected = true;
} catch (PDOException $e) {
    $errors[] = 'خطای دیتابیس: ' . $e->getMessage();  // ← این خطا رو به کاربر نشون بده
    error_log('Registration insert error: ' . $e->getMessage());
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

// ========== 5. تنظیمات چندزبانه ==========
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

// ========== 6. دیکشنری ترجمه‌ها ==========
$translations = [
    'tr' => [
        'page_title' => 'Kayıt Ol | İstanbul Rehberi 🇹🇷',
        'welcome_title' => 'İstanbul Rehberine Kayıt Ol',
        'welcome_subtitle' => 'İstanbul çevrimiçi topluluğumuza katılın ve kültür ile teknolojinin güzelliğinin tadını çıkarın',
        'first_name' => 'Ad',
        'last_name' => 'Soyad',
        'username' => 'Kullanıcı Adı',
        'email' => 'E-posta',
        'phone' => 'Telefon',
        'password' => 'Şifre',
        'confirm_password' => 'Şifreyi Onayla',
        'agree_terms' => 'Kabul ediyorum',
        'register_button' => 'Kayıt Ol ve Hesap Oluştur',
        'login_button' => 'Zaten bir hesabınız var mı? Giriş Yapın',
        'or_social' => 'Veya sosyal hesaplarla kayıt olun',
        'privacy' => 'Gizlilik',
        'terms' => 'Kullanım Şartları',
        'contact' => 'Bize Ulaşın',
        'about' => 'Hakkımızda',
        'back_home' => 'Ana Sayfa',
        'change_language' => 'Dili Değiştir',
        'registration_steps' => 'Kayıt Adımları',
        'personal_info' => 'Kişisel Bilgiler',
        'personal_info_desc' => 'Adınızı, soyadınızı ve iletişim bilgilerinizi girin',
        'account_security' => 'Hesap Güvenliği',
        'account_security_desc' => 'Güçlü ve benzersiz bir şifre seçin',
        'final_confirmation' => 'Son Onay',
        'final_confirmation_desc' => 'Şartları okuyun ve onaylayın',
        'account_activated' => 'Hesabınız Etkinleştirildi!',
        'account_activated_desc' => 'Artık tüm özellikleri kullanabilirsiniz',
        'membership_benefits' => 'Üyelik Avantajları:',
        'benefit1' => 'Tam İstanbul rehberine erişim',
        'benefit2' => 'İstanbul sanal turları',
        'benefit3' => 'Türkçe 7/24 destek',
        'benefit4' => 'Otel ve restoranlarda özel indirimler',
        'benefit5' => 'Türk kültürü ve gelenekleri rehberi',
        'username_hint' => 'Sadece İngilizce harfler, sayılar ve alt çizgi izin verilir',
        'password_strength' => 'Şifre gücü: ',
        'password_weak' => 'Zayıf',
        'password_medium' => 'Orta',
        'password_strong' => 'Güçlü',
        'password_very_strong' => 'Çok Güçlü',
        'password_match' => 'Şifre eşleşiyor',
        'password_no_match' => 'Şifre eşleşmiyor',
        'invalid_token' => 'Geçersiz güvenlik tokenı.',
        'success_message' => 'Kaydınız başarıyla tamamlandı! Onay e-postası gönderildi.',
        'loading' => 'Kayıt olunuyor...',
        'error_title' => 'Lütfen aşağıdaki hataları düzeltin:',
        'first_name_required' => 'Ad zorunludur.',
        'last_name_required' => 'Soyad zorunludur.',
        'username_required' => 'Kullanıcı adı zorunludur.',
        'email_required' => 'Geçerli bir e-posta adresi zorunludur.',
        'phone_required' => 'Geçerli bir telefon numarası zorunludur.',
        'password_length' => 'Şifre en az 8 karakter olmalıdır.',
        'password_uppercase' => 'Şifre en az bir büyük harf içermelidir.',
        'password_lowercase' => 'Şifre en az bir küçük harf içermelidir.',
        'password_number' => 'Şifre en az bir rakam içermelidir.',
        'password_match_error' => 'Şifreler eşleşmiyor.',
        'terms_required' => 'Şartları kabul etmelisiniz.',
    ],
    'fa' => [
        'page_title' => 'ثبت نام | راهنمای استانبول',
        'welcome_title' => 'ثبت نام در Istanbul Guide',
        'welcome_subtitle' => 'به جامعه استانبول آنلاین ما بپیوندید و از زیبایی‌های ترکیب فرهنگ و تکنولوژی لذت ببرید',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'username' => 'نام کاربری',
        'email' => 'ایمیل',
        'phone' => 'شماره تلفن',
        'password' => 'رمز عبور',
        'confirm_password' => 'تأیید رمز عبور',
        'agree_terms' => 'موافقم',
        'register_button' => 'ثبت نام و ایجاد حساب',
        'login_button' => 'قبلاً حساب دارید؟ وارد شوید',
        'or_social' => 'یا با حساب‌های اجتماعی ثبت نام کنید',
        'privacy' => 'حریم خصوصی',
        'terms' => 'قوانین استفاده',
        'contact' => 'تماس با ما',
        'about' => 'درباره ما',
        'back_home' => 'بازگشت به خانه',
        'change_language' => 'تغییر زبان',
        'registration_steps' => 'مراحل ثبت نام',
        'personal_info' => 'اطلاعات شخصی',
        'personal_info_desc' => 'نام، نام خانوادگی و اطلاعات تماس خود را وارد کنید',
        'account_security' => 'امنیت حساب',
        'account_security_desc' => 'یک رمز عبور قوی و منحصربه‌فرد انتخاب کنید',
        'final_confirmation' => 'تأیید نهایی',
        'final_confirmation_desc' => 'قوانین را مطالعه و تأیید کنید',
        'account_activated' => 'حساب شما فعال شد!',
        'account_activated_desc' => 'اکنون می‌توانید از تمام امکانات استفاده کنید',
        'membership_benefits' => 'مزایای عضویت:',
        'benefit1' => 'دسترسی به راهنمای کامل استانبول',
        'benefit2' => 'تورهای مجازی شهر استانبول',
        'benefit3' => 'پشتیبانی ۲۴ ساعته به زبان ترکی',
        'benefit4' => 'تخفیف‌های ویژه هتل‌ها و رستوران‌ها',
        'benefit5' => 'راهنمای فرهنگ و آداب ترکیه',
        'username_hint' => 'فقط حروف انگلیسی، اعداد و زیرخط مجاز است',
        'password_strength' => 'قدرت رمز: ',
        'password_weak' => 'ضعیف',
        'password_medium' => 'متوسط',
        'password_strong' => 'قوی',
        'password_very_strong' => 'بسیار قوی',
        'password_match' => 'رمز عبور مطابقت دارد',
        'password_no_match' => 'رمز عبور مطابقت ندارد',
        'invalid_token' => 'توکن امنیتی نامعتبر است.',
        'success_message' => 'ثبت نام شما با موفقیت انجام شد! ایمیل تأیید برای شما ارسال شد.',
        'loading' => 'در حال ثبت نام...',
        'error_title' => 'لطفا خطاهای زیر را اصلاح کنید:',
        'first_name_required' => 'نام الزامی است.',
        'last_name_required' => 'نام خانوادگی الزامی است.',
        'username_required' => 'نام کاربری الزامی است.',
        'email_required' => 'ایمیل معتبر الزامی است.',
        'phone_required' => 'شماره تلفن معتبر الزامی است.',
        'password_length' => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
        'password_uppercase' => 'رمز عبور باید حداقل یک حرف بزرگ داشته باشد.',
        'password_lowercase' => 'رمز عبور باید حداقل یک حرف کوچک داشته باشد.',
        'password_number' => 'رمز عبور باید حداقل یک عدد داشته باشد.',
        'password_match_error' => 'رمز عبور و تأیید آن مطابقت ندارند.',
        'terms_required' => 'باید با قوانین موافقت کنید.',
    ],
    'en' => [
        'page_title' => 'Register | Istanbul Guide',
        'welcome_title' => 'Register in Istanbul Guide',
        'welcome_subtitle' => 'Join our Istanbul online community and enjoy the beauty of culture and technology',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'username' => 'Username',
        'email' => 'Email',
        'phone' => 'Phone',
        'password' => 'Password',
        'confirm_password' => 'Confirm Password',
        'agree_terms' => 'I agree',
        'register_button' => 'Register and Create Account',
        'login_button' => 'Already have an account? Login',
        'or_social' => 'Or register with social accounts',
        'privacy' => 'Privacy',
        'terms' => 'Terms of Use',
        'contact' => 'Contact Us',
        'about' => 'About Us',
        'back_home' => 'Back to Home',
        'change_language' => 'Change Language',
        'registration_steps' => 'Registration Steps',
        'personal_info' => 'Personal Information',
        'personal_info_desc' => 'Enter your first name, last name and contact information',
        'account_security' => 'Account Security',
        'account_security_desc' => 'Choose a strong and unique password',
        'final_confirmation' => 'Final Confirmation',
        'final_confirmation_desc' => 'Read and confirm the terms',
        'account_activated' => 'Your Account is Activated!',
        'account_activated_desc' => 'You can now use all features',
        'membership_benefits' => 'Membership Benefits:',
        'benefit1' => 'Access to the complete Istanbul guide',
        'benefit2' => 'Virtual tours of Istanbul',
        'benefit3' => '24/7 support in Turkish',
        'benefit4' => 'Special discounts on hotels and restaurants',
        'benefit5' => 'Guide to Turkish culture and customs',
        'username_hint' => 'Only English letters, numbers and underscore are allowed',
        'password_strength' => 'Password strength: ',
        'password_weak' => 'Weak',
        'password_medium' => 'Medium',
        'password_strong' => 'Strong',
        'password_very_strong' => 'Very Strong',
        'password_match' => 'Password matches',
        'password_no_match' => 'Password does not match',
        'invalid_token' => 'Invalid security token.',
        'success_message' => 'Your registration was successful! Confirmation email has been sent.',
        'loading' => 'Registering...',
        'error_title' => 'Please correct the following errors:',
        'first_name_required' => 'First name is required.',
        'last_name_required' => 'Last name is required.',
        'username_required' => 'Username is required.',
        'email_required' => 'Valid email is required.',
        'phone_required' => 'Valid phone number is required.',
        'password_length' => 'Password must be at least 8 characters.',
        'password_uppercase' => 'Password must contain at least one uppercase letter.',
        'password_lowercase' => 'Password must contain at least one lowercase letter.',
        'password_number' => 'Password must contain at least one number.',
        'password_match_error' => 'Password and confirmation do not match.',
        'terms_required' => 'You must agree to the terms.',
    ],
    'ar' => [
        'page_title' => 'التسجيل | دليل إسطنبول',
        'welcome_title' => 'التسجيل في دليل إسطنبول',
        'welcome_subtitle' => 'انضم إلى مجتمعنا الإسطنبولي عبر الإنترنت واستمتع بجمال الثقافة والتكنولوجيا',
        'first_name' => 'الاسم الأول',
        'last_name' => 'اسم العائلة',
        'username' => 'اسم المستخدم',
        'email' => 'البريد الإلكتروني',
        'phone' => 'الهاتف',
        'password' => 'كلمة المرور',
        'confirm_password' => 'تأكيد كلمة المرور',
        'agree_terms' => 'أوافق',
        'register_button' => 'التسجيل وإنشاء حساب',
        'login_button' => 'هل لديك حساب بالفعل؟ سجل الدخول',
        'or_social' => 'أو التسجيل باستخدام الحسابات الاجتماعية',
        'privacy' => 'الخصوصية',
        'terms' => 'شروط الاستخدام',
        'contact' => 'اتصل بنا',
        'about' => 'من نحن',
        'back_home' => 'العودة إلى الرئيسية',
        'change_language' => 'تغيير اللغة',
        'registration_steps' => 'خطوات التسجيل',
        'personal_info' => 'المعلومات الشخصية',
        'personal_info_desc' => 'أدخل اسمك الأول واسم العائلة ومعلومات الاتصال',
        'account_security' => 'أمان الحساب',
        'account_security_desc' => 'اختر كلمة مرور قوية وفريدة',
        'final_confirmation' => 'التأكيد النهائي',
        'final_confirmation_desc' => 'اقرأ الشروط وأكدها',
        'account_activated' => 'تم تفعيل حسابك!',
        'account_activated_desc' => 'يمكنك الآن استخدام جميع الميزات',
        'membership_benefits' => 'فوائد العضوية:',
        'benefit1' => 'الوصول إلى دليل إسطنبول الكامل',
        'benefit2' => 'جولات افتراضية في إسطنبول',
        'benefit3' => 'دعم على مدار الساعة باللغة التركية',
        'benefit4' => 'خصومات خاصة على الفنادق والمطاعم',
        'benefit5' => 'دليل الثقافة والعادات التركية',
        'username_hint' => 'يسمح فقط بالأحرف الإنجليزية والأرقام والشرطة السفلية',
        'password_strength' => 'قوة كلمة المرور: ',
        'password_weak' => 'ضعيف',
        'password_medium' => 'متوسط',
        'password_strong' => 'قوي',
        'password_very_strong' => 'قوي جدًا',
        'password_match' => 'كلمة المرور متطابقة',
        'password_no_match' => 'كلمة المرور غير متطابقة',
        'invalid_token' => 'رمز الأمان غير صالح.',
        'success_message' => 'تم التسجيل بنجاح! تم إرسال بريد التأكيد.',
        'loading' => 'جارٍ التسجيل...',
        'error_title' => 'يرجى تصحيح الأخطاء التالية:',
        'first_name_required' => 'الاسم الأول مطلوب.',
        'last_name_required' => 'اسم العائلة مطلوب.',
        'username_required' => 'اسم المستخدم مطلوب.',
        'email_required' => 'البريد الإلكتروني الصحيح مطلوب.',
        'phone_required' => 'رقم هاتف صحيح مطلوب.',
        'password_length' => 'يجب أن تكون كلمة المرور 8 أحرف على الأقل.',
        'password_uppercase' => 'يجب أن تحتوي كلمة المرور على حرف كبير واحد على الأقل.',
        'password_lowercase' => 'يجب أن تحتوي كلمة المرور على حرف صغير واحد على الأقل.',
        'password_number' => 'يجب أن تحتوي كلمة المرور على رقم واحد على الأقل.',
        'password_match_error' => 'كلمة المرور والتأكيد غير متطابقين.',
        'terms_required' => 'يجب أن توافق على الشروط.',
    ]
];

// تابع ترجمه
function t($key) {
    global $translations, $current_lang;
    return isset($translations[$current_lang][$key]) ? $translations[$current_lang][$key] : $translations['en'][$key];
}

// تنظیم جهت صفحه بر اساس زبان
$direction = ($current_lang == 'fa' || $current_lang == 'ar') ? 'rtl' : 'ltr';
$text_align = ($current_lang == 'fa' || $current_lang == 'ar') ? 'right' : 'left';

// ========== 7. مدیریت فرم ثبت نام ==========
$errors = [];
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // بررسی CSRF Token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $errors[] = t('invalid_token');
    } else {
        // دریافت و پاک‌سازی داده‌ها
        $first_name = trim(htmlspecialchars($_POST['first_name'] ?? '', ENT_QUOTES, 'UTF-8'));
        $last_name  = trim(htmlspecialchars($_POST['last_name'] ?? '', ENT_QUOTES, 'UTF-8'));
        $username   = trim(htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES, 'UTF-8'));
        $phone      = trim(htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES, 'UTF-8'));
        $email      = trim(filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL));
        // $phone      = trim(filter_var($_POST['phone'] ?? '', FILTER_SANITIZE_STRING));
        $password   = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        $agree_terms = isset($_POST['agree_terms']);

        // ===== اعتبارسنجی اولیه =====
        if (empty($first_name)) $errors[] = t('first_name_required');
        if (empty($last_name)) $errors[] = t('last_name_required');
        if (empty($username)) $errors[] = t('username_required');
        elseif (!preg_match('/^[A-Za-z0-9_]{3,20}$/', $username)) $errors[] = t('invalid_username');
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = t('email_required');
        if (empty($phone) || !preg_match('/^[0-9]{10,11}$/', $phone)) $errors[] = t('phone_required');
        if (strlen($password) < 8) $errors[] = t('password_length');
        if (!preg_match('/[A-Z]/', $password)) $errors[] = t('password_uppercase');
        if (!preg_match('/[a-z]/', $password)) $errors[] = t('password_lowercase');
        if (!preg_match('/[0-9]/', $password)) $errors[] = t('password_number');
        if ($password !== $confirm_password) $errors[] = t('password_match_error');
        if (!$agree_terms) $errors[] = t('terms_required');

        // ===== بررسی اتصال به دیتابیس =====
        if (empty($errors) && !$db_connected) {
            $errors[] = 'مشکل در اتصال به پایگاه داده، لطفاً بعداً تلاش کنید.';
            error_log('Registration attempted while DB not connected');
        }

        // ===== بررسی یکتا بودن نام کاربری و ایمیل =====
        if (empty($errors) && $db_connected) {
            try {
                // بررسی نام کاربری
                $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username LIMIT 1");
                $stmt->execute([':username' => $username]);
                if ($stmt->fetch()) {
                    $errors[] = t('username_exists');
                }

                // بررسی ایمیل
                $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
                $stmt->execute([':email' => $email]);
                if ($stmt->fetch()) {
                    $errors[] = t('email_exists');
                }
            } catch (PDOException $e) {
                $errors[] = 'خطای داخلی، لطفاً بعداً تلاش کنید.';
                error_log('Registration check error: ' . $e->getMessage());
            }
        }

        // ===== ذخیره در دیتابیس =====
        if (empty($errors) && $db_connected) {
            try {
                // هش کردن رمز عبور
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // درج کاربر جدید
                $sql = "INSERT INTO users (first_name, last_name, username, email, phone, password, created_at) 
                        VALUES (:first_name, :last_name, :username, :email, :phone, :password, NOW())";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':first_name' => $first_name,
                    ':last_name'  => $last_name,
                    ':username'   => $username,
                    ':email'      => $email,
                    ':phone'      => $phone,
                    ':password'   => $hashed_password
                ]);

                // پیام موفقیت
                $success = t('success_message');
                
                // پاک کردن مقادیر POST از فرم
                $_POST = [];
                
                // هدایت به صفحه ورود بعد از 3 ثانیه
                header('refresh:3;url=login.php');
                
            } catch (PDOException $e) {
                $errors[] = 'خطا در ذخیره اطلاعات، لطفاً دوباره تلاش کنید.';
                error_log('Registration insert error: ' . $e->getMessage());
            }
        }
    }
}
?>
<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Register in istanbul guide">
    <meta name="keywords" content="register, membership, CMS, Istanbul">
    <title><?php echo t('page_title'); ?></title>
    
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        /* ========== تمام استایل‌های CSS قبلی دقیقاً به همین صورت باقی می‌ماند ========== */
        :root {
            --turkey-red: #E30A17;
            --turkey-white: #FFFFFF;
            --turkey-dark-red: #C40814;
            --turkey-light-red: #FF4D5A;
            --turkey-star: #FFD700;
            --gradient-primary: linear-gradient(135deg, #E30A17 0%, #C40814 100%);
            --gradient-secondary: linear-gradient(135deg, #FF4D5A 0%, #E30A17 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: <?php echo ($current_lang == 'fa' || $current_lang == 'ar') ? "'Vazirmatn', sans-serif" : "'Inter', sans-serif"; ?>;
            background: var(--turkey-white);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(255, 77, 90, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(227, 10, 23, 0.1) 0%, transparent 20%);
        }
        
        /* پس‌زمینه با نماد هلال و ستاره */
        .turkey-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
            opacity: 0.1;
        }
        
        .crescent {
            position: absolute;
            width: 300px;
            height: 300px;
            background: var(--turkey-red);
            border-radius: 50%;
            top: -150px;
            <?php echo ($direction == 'rtl') ? 'left: -150px;' : 'right: -150px;'; ?>
        }
        
        .crescent::before {
            content: '';
            position: absolute;
            width: 280px;
            height: 280px;
            background: var(--turkey-white);
            border-radius: 50%;
            top: 10px;
            <?php echo ($direction == 'rtl') ? 'right: 120px;' : 'left: 120px;'; ?>
        }
        
        .star {
            position: absolute;
            color: var(--turkey-star);
            font-size: 60px;
            top: 60px;
            <?php echo ($direction == 'rtl') ? 'right: 250px;' : 'left: 250px;'; ?>
            transform: rotate(15deg);
        }
        
        .crescent-2 {
            position: absolute;
            width: 200px;
            height: 200px;
            background: var(--turkey-red);
            border-radius: 50%;
            bottom: -100px;
            <?php echo ($direction == 'rtl') ? 'right: -100px;' : 'left: -100px;'; ?>
        }
        
        .crescent-2::before {
            content: '';
            position: absolute;
            width: 180px;
            height: 180px;
            background: var(--turkey-white);
            border-radius: 50%;
            top: 10px;
            <?php echo ($direction == 'rtl') ? 'left: 120px;' : 'right: 120px;'; ?>
        }
        
        .star-2 {
            position: absolute;
            color: var(--turkey-star);
            font-size: 40px;
            bottom: 40px;
            <?php echo ($direction == 'rtl') ? 'left: 160px;' : 'right: 160px;'; ?>
            transform: rotate(-15deg);
        }
        
        .register-container {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 25px;
            box-shadow: 0 20px 50px rgba(227, 10, 23, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.8s ease-out;
            border: 2px solid rgba(227, 10, 23, 0.1);
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .register-header {
            background: var(--gradient-primary);
            color: white;
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .register-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(255, 215, 0, 0.1) 0%, transparent 50%);
        }
        
        .logo-container {
            position: relative;
            z-index: 1;
        }
        
        .logo {
            width: 100px;
            height: 100px;
            background: var(--turkey-white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .logo-crescent {
            position: absolute;
            width: 80px;
            height: 80px;
            background: var(--turkey-red);
            border-radius: 50%;
        }
        
        .logo-crescent::before {
            content: '';
            position: absolute;
            width: 70px;
            height: 70px;
            background: var(--turkey-white);
            border-radius: 50%;
            top: 5px;
            <?php echo ($direction == 'rtl') ? 'right: 40px;' : 'left: 40px;'; ?>
        }
        
        .logo-star {
            position: absolute;
            color: var(--turkey-star);
            font-size: 30px;
            top: 25px;
            <?php echo ($direction == 'rtl') ? 'right: 25px;' : 'left: 25px;'; ?>
            z-index: 2;
        }
        
        .logo:hover .logo-crescent {
            animation: crescentRotate 2s linear infinite;
        }
        
        @keyframes crescentRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .register-header h1 {
            font-weight: 800;
            margin-bottom: 10px;
            font-size: 2.2rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to right, #FFFFFF, #FFD700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .register-header p {
            opacity: 0.95;
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.95);
        }
        
        .register-body {
            padding: 40px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        
        .form-section {
            flex: 1;
            min-width: 300px;
        }
        
        .progress-section {
            flex: 1;
            min-width: 300px;
            padding: 20px;
            background: linear-gradient(135deg, #FFF5F5 0%, #FFEBEB 100%);
            border-radius: 15px;
            border: 2px solid rgba(227, 10, 23, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .progress-section::before {
            content: '';
            position: absolute;
            top: 0;
            <?php echo ($direction == 'rtl') ? 'left: 0;' : 'right: 0;'; ?>
            width: 100px;
            height: 100px;
            background: var(--turkey-red);
            border-radius: <?php echo ($direction == 'rtl') ? '0 0 100% 0;' : '0 0 0 100%;'; ?>;
            opacity: 0.05;
        }
        
        .form-floating {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-control {
            border-radius: 12px;
            padding: 20px 15px 10px 15px;
            border: 2px solid #FFE5E5;
            transition: all 0.3s ease;
            font-size: 1rem;
            height: auto;
            background: rgba(255, 255, 255, 0.9);
            <?php echo ($direction == 'rtl') ? 'text-align: right;' : 'text-align: left;'; ?>
        }
        
        .form-control:focus {
            border-color: var(--turkey-red);
            box-shadow: 0 0 0 4px rgba(227, 10, 23, 0.15);
            background: white;
        }
        
        .form-label {
            font-weight: 600;
            color: #721C24;
        }
        
        .input-group-text {
            background-color: transparent;
            border: 2px solid #FFE5E5;
            <?php echo ($direction == 'rtl') ? 'border-right: none;' : 'border-left: none;'; ?>
            cursor: pointer;
            color: var(--turkey-red);
        }
        
        .password-strength {
            margin-top: 10px;
        }
        
        .strength-meter {
            height: 8px;
            border-radius: 4px;
            background: #FFE5E5;
            overflow: hidden;
            margin-bottom: 5px;
        }
        
        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 4px;
            transition: width 0.3s ease, background 0.3s ease;
        }
        
        .strength-text {
            font-size: 0.85rem;
            color: #721C24;
        }
        
        .btn-register {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 18px;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.4s ease;
            width: 100%;
            font-size: 1.1rem;
            position: relative;
            overflow: hidden;
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(227, 10, 23, 0.4);
            background: var(--gradient-secondary);
        }
        
        .btn-register:active {
            transform: translateY(-1px);
        }
        
        .btn-register::after {
            content: '✭';
            position: absolute;
            top: 50%;
            <?php echo ($direction == 'rtl') ? 'right: 20px;' : 'left: 20px;'; ?>
            transform: translateY(-50%);
            color: var(--turkey-star);
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .btn-register:hover::after {
            opacity: 1;
            <?php echo ($direction == 'rtl') ? 'right: 30px;' : 'left: 30px;'; ?>
        }
        
        .btn-login {
            background: #FFF5F5;
            border: 2px solid var(--turkey-red);
            color: var(--turkey-red);
            padding: 15px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 15px;
        }
        
        .btn-login:hover {
            background: var(--turkey-red);
            color: white;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            padding: 20px;
            margin-bottom: 25px;
            animation: slideInDown 0.5s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: <?php echo $direction == 'rtl' ? 'right' : 'left'; ?>;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #F8D7DA 0%, #F5C6CB 100%);
            color: #721C24;
            <?php echo ($direction == 'rtl') ? 'border-right' : 'border-left'; ?>: 5px solid #E30A17;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #D4EDDA 0%, #C3E6CB 100%);
            color: #155724;
            <?php echo ($direction == 'rtl') ? 'border-right' : 'border-left'; ?>: 5px solid #28A745;
        }
        
        .form-check {
            margin-bottom: 20px;
            <?php echo ($direction == 'rtl') ? 'padding-right: 35px;' : 'padding-left: 35px;'; ?>
        }
        
        .form-check-input {
            width: 22px;
            height: 22px;
            <?php echo ($direction == 'rtl') ? 'margin-right: -35px;' : 'margin-left: -35px;'; ?>
            margin-top: 0.2rem;
            cursor: pointer;
        }
        
        .form-check-input:checked {
            background-color: var(--turkey-red);
            border-color: var(--turkey-red);
        }
        
        .form-check-label {
            cursor: pointer;
            user-select: none;
            color: #721C24;
        }
        
        .progress-step {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding: 15px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 5px 15px rgba(227, 10, 23, 0.08);
            transition: all 0.3s ease;
            <?php echo ($direction == 'rtl') ? 'border-right' : 'border-left'; ?>: 4px solid var(--turkey-red);
        }
        
        .progress-step:hover {
            transform: translateX(<?php echo $direction == 'rtl' ? '-5px' : '5px'; ?>);
            box-shadow: 0 8px 20px rgba(227, 10, 23, 0.15);
        }
        
        .step-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            <?php echo ($direction == 'rtl') ? 'margin-left: 15px;' : 'margin-right: 15px;'; ?>
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
            position: relative;
        }
        
        .step-icon::after {
            content: '✭';
            position: absolute;
            top: -5px;
            <?php echo ($direction == 'rtl') ? 'right: -5px;' : 'left: -5px;'; ?>
            color: var(--turkey-star);
            font-size: 14px;
        }
        
        .step-content h5 {
            margin-bottom: 5px;
            color: #721C24;
            font-weight: 700;
            text-align: <?php echo $direction == 'rtl' ? 'right' : 'left'; ?>;
        }
        
        .step-content p {
            color: #856404;
            font-size: 0.9rem;
            margin: 0;
            text-align: <?php echo $direction == 'rtl' ? 'right' : 'left'; ?>;
        }
        
        .register-footer {
            text-align: center;
            padding: 25px;
            border-top: 1px solid #FFE5E5;
            font-size: 0.9rem;
            color: #721C24;
            background: #FFF5F5;
        }
        
        .register-footer a {
            color: var(--turkey-red);
            text-decoration: none;
            font-weight: 600;
        }
        
        .register-footer a:hover {
            text-decoration: underline;
            color: var(--turkey-dark-red);
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .social-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .facebook {
            background: #3b5998;
        }
        
        .twitter {
            background: #1da1f2;
        }
        
        .google {
            background: #db4437;
        }
        
        .github {
            background: #333;
        }
        
        /* دکمه بازگشت */
        .back-to-home {
            position: absolute;
            top: 20px;
            <?php echo ($direction == 'rtl') ? 'right: 20px;' : 'left: 20px'; ?>;
            z-index: 100;
        }
        
        .back-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(<?php echo $direction == 'rtl' ? '-5px' : '5px'; ?>);
        }
        
        /* دکمه زبان */
        .language-switcher {
            position: absolute;
            top: 20px;
            <?php echo ($direction == 'rtl') ? 'left: 20px;' : 'right: 20px'; ?>;
            z-index: 100;
        }
        
        .language-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            font-weight: 600;
            cursor: pointer;
        }
        
        .language-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .language-dropdown {
            position: absolute;
            top: 100%;
            <?php echo ($direction == 'rtl') ? 'right: 0;' : 'left: 0'; ?>;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 50px rgba(227, 10, 23, 0.2);
            min-width: 150px;
            display: none;
            overflow: hidden;
            z-index: 1000;
            border: 2px solid var(--turkey-red);
        }
        
        .language-switcher:hover .language-dropdown {
            display: block;
        }
        
        .language-dropdown a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            border-bottom: 1px solid #f1f1f1;
            text-align: <?php echo $direction == 'rtl' ? 'right' : 'left'; ?>;
        }
        
        .language-dropdown a:hover {
            background: var(--turkey-red);
            color: white;
        }
        
        @media (max-width: 768px) {
            .register-body {
                flex-direction: column;
                padding: 30px 20px;
            }
            
            .register-header {
                padding: 30px 20px;
            }
            
            .register-header h1 {
                font-size: 1.8rem;
            }
            
            .turkey-bg {
                display: none;
            }
        }
        
        /* انیمیشن برای تایپ کردن */
        .typing-animation {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            <?php echo ($direction == 'rtl') ? 'border-left' : 'border-right'; ?>: 3px solid #FFD700;
            animation: typing 3.5s steps(30, end), blink-caret 0.75s step-end infinite;
        }
        
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #FFD700 }
        }
        
        /* استایل برای پسورد قوی */
        .strength-weak { background: #E30A17; width: 25%; }
        .strength-medium { background: #FF8C00; width: 50%; }
        .strength-strong { background: #FFD700; width: 75%; }
        .strength-very-strong { background: #32CD32; width: 100%; }
        
        /* انیمیشن ستاره‌ها */
        .star-animation {
            animation: starTwinkle 2s infinite alternate;
        }
        
        @keyframes starTwinkle {
            0% { opacity: 0.7; transform: scale(1); }
            100% { opacity: 1; transform: scale(1.1); }
        }
        
        /* حالت تاریک */
        @media (prefers-color-scheme: dark) {
            body {
                background: #121212;
                background-image: 
                    radial-gradient(circle at 10% 20%, rgba(255, 77, 90, 0.05) 0%, transparent 20%),
                    radial-gradient(circle at 90% 80%, rgba(227, 10, 23, 0.05) 0%, transparent 20%);
            }
            
            .register-container {
                background: rgba(30, 30, 30, 0.95);
                border-color: #444;
            }
            
            .register-body,
            .register-footer {
                background: #222;
                color: #ddd;
            }
            
            .form-control {
                background: #333;
                border-color: #444;
                color: #ddd;
            }
            
            .form-control:focus {
                background: #444;
                color: white;
            }
            
            .input-group-text {
                background: #333;
                border-color: #444;
                color: #999;
            }
            
            .btn-login {
                background: #222;
                color: var(--turkey-red);
                border-color: var(--turkey-red);
            }
            
            .btn-login:hover {
                background: var(--turkey-red);
                color: white;
            }
            
            .progress-section {
                background: linear-gradient(135deg, #333 0%, #222 100%);
                border-color: #555;
            }
            
            .progress-step {
                background: #333;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }
            
            .step-content h5 {
                color: #ddd;
            }
            
            .step-content p {
                color: #aaa;
            }
            
            .language-dropdown {
                background: #333;
                border-color: #555;
            }
            
            .language-dropdown a {
                color: #ddd;
                border-bottom-color: #444;
            }
            
            .language-dropdown a:hover {
                background: var(--turkey-red);
                color: white;
            }
        }
    </style>
</head>
<body>
    <!-- پس‌زمینه با نماد هلال و ستاره -->
    <div class="turkey-bg">
        <div class="crescent"></div>
        <div class="star star-animation">✭</div>
        <div class="crescent-2"></div>
        <div class="star-2 star-animation">✭</div>
    </div>
    
    <!-- دکمه بازگشت -->
    <div class="back-to-home">
        <a href="index.php" class="back-btn">
            <?php if($direction == 'rtl'): ?>
                <i class="fas fa-arrow-right"></i>
            <?php else: ?>
                <i class="fas fa-arrow-left"></i>
            <?php endif; ?>
            <span><?php echo t('back_home'); ?></span>
        </a>
    </div>
    
    <!-- دکمه زبان -->
    <div class="language-switcher">
        <button class="language-btn">
            <i class="fas fa-globe"></i>
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
            <i class="fas fa-chevron-<?php echo $direction == 'rtl' ? 'up' : 'down'; ?>"></i>
        </button>
        <div class="language-dropdown">
            <a href="?lang=tr"><span style="margin-<?php echo $direction == 'rtl' ? 'right' : 'left'; ?>: 8px;">🇹🇷</span> Türkçe</a>
            <a href="?lang=fa"><span style="margin-<?php echo $direction == 'rtl' ? 'right' : 'left'; ?>: 8px;">🇮🇷</span> فارسی</a>
            <a href="?lang=en"><span style="margin-<?php echo $direction == 'rtl' ? 'right' : 'left'; ?>: 8px;">🇬🇧</span> English</a>
            <a href="?lang=ar"><span style="margin-<?php echo $direction == 'rtl' ? 'right' : 'left'; ?>: 8px;">🇸🇦</span> العربية</a>
        </div>
    </div>
    
    <div class="register-container">
        <div class="register-header">
            <div class="logo-container">
                <div class="logo">
                    <div class="logo-crescent"></div>
                    <div class="logo-star star-animation">✭</div>
                </div>
                <h1 class="typing-animation"><?php echo t('welcome_title'); ?></h1>
                <p><?php echo t('welcome_subtitle'); ?></p>
            </div>
        </div>
        
        <div class="register-body">
            <div class="form-section">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong><?php echo t('error_title'); ?></strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?php echo htmlspecialchars($success); ?>
                        <div class="progress mt-3">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%; background-color: #E30A17;"></div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <form id="registerForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" 
                                       class="form-control" 
                                       id="first_name" 
                                       name="first_name" 
                                       placeholder="<?php echo t('first_name'); ?>"
                                       required
                                       value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>">
                                <label for="first_name">
                                    <i class="fas fa-user me-2" style="color: #E30A17;"></i><?php echo t('first_name'); ?>
                                </label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" 
                                       class="form-control" 
                                       id="last_name" 
                                       name="last_name" 
                                       placeholder="<?php echo t('last_name'); ?>"
                                       required
                                       value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>">
                                <label for="last_name">
                                    <i class="fas fa-user me-2" style="color: #E30A17;"></i><?php echo t('last_name'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-floating">
                        <input type="text" 
                               class="form-control" 
                               id="username" 
                               name="username" 
                               placeholder="<?php echo t('username'); ?>"
                               required
                               value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                        <label for="username">
                            <i class="fas fa-at me-2" style="color: #E30A17;"></i><?php echo t('username'); ?>
                        </label>
                        <small class="text-muted"><?php echo t('username_hint'); ?></small>
                    </div>
                    
                    <div class="form-floating">
                        <input type="email" 
                               class="form-control" 
                               id="email" 
                               name="email" 
                               placeholder="<?php echo t('email'); ?>"
                               required
                               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <label for="email">
                            <i class="fas fa-envelope me-2" style="color: #E30A17;"></i><?php echo t('email'); ?>
                        </label>
                    </div>
                    
                    <div class="form-floating">
                        <input type="tel" 
                               class="form-control" 
                               id="phone" 
                               name="phone" 
                               placeholder="<?php echo t('phone'); ?>"
                               required
                               value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                        <label for="phone">
                            <i class="fas fa-phone me-2" style="color: #E30A17;"></i><?php echo t('phone'); ?>
                        </label>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <div class="input-group">
                                    <input type="password" 
                                           class="form-control" 
                                           id="password" 
                                           name="password" 
                                           placeholder="<?php echo t('password'); ?>"
                                           required>
                                    <span class="input-group-text password-toggle" onclick="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <label for="password">
                                        <i class="fas fa-key me-2" style="color: #E30A17;"></i><?php echo t('password'); ?>
                                    </label>
                                </div>
                                <div class="password-strength">
                                    <div class="strength-meter">
                                        <div class="strength-fill" id="password-strength-meter"></div>
                                    </div>
                                    <div class="strength-text" id="password-strength-text"><?php echo t('password_strength'); ?>-</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <div class="input-group">
                                    <input type="password" 
                                           class="form-control" 
                                           id="confirm_password" 
                                           name="confirm_password" 
                                           placeholder="<?php echo t('confirm_password'); ?>"
                                           required>
                                    <span class="input-group-text password-toggle" onclick="togglePassword('confirm_password')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <label for="confirm_password">
                                        <i class="fas fa-key me-2" style="color: #E30A17;"></i><?php echo t('confirm_password'); ?>
                                    </label>
                                </div>
                                <div class="mt-2" id="password-match"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agree_terms" name="agree_terms" required>
                        <label class="form-check-label" for="agree_terms">
                            <?php echo t('agree_terms'); ?> <a href="terms.php" target="_blank" style="color: #E30A17;"><?php echo t('terms'); ?></a> <?php echo $current_lang == 'fa' ? 'و' : 'and'; ?> <a href="privacy.php" target="_blank" style="color: #E30A17;"><?php echo t('privacy'); ?></a>
                        </label>
                    </div>
                    
                    <div class="mb-4">
                        <button type="submit" 
                                name="register" 
                                class="btn btn-register"
                                id="btnRegister">
                            <i class="fas fa-user-plus me-2"></i><?php echo t('register_button'); ?>
                        </button>
                    </div>
                    
                    <div class="mb-3">
                        <a href="login.php" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i><?php echo t('login_button'); ?>
                        </a>
                    </div>
                    
                    
                </form>
            </div>
            
            <div class="progress-section">
                <h4 class="mb-4 text-center" style="color: #E30A17;">
                    <i class="fas fa-tasks me-2"></i><?php echo t('registration_steps'); ?>
                </h4>
                
                <div class="progress-step">
                    <div class="step-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="step-content">
                        <h5><?php echo t('personal_info'); ?></h5>
                        <p><?php echo t('personal_info_desc'); ?></p>
                    </div>
                </div>
                
                <div class="progress-step">
                    <div class="step-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="step-content">
                        <h5><?php echo t('account_security'); ?></h5>
                        <p><?php echo t('account_security_desc'); ?></p>
                    </div>
                </div>
                
                <div class="progress-step">
                    <div class="step-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="step-content">
                        <h5><?php echo t('final_confirmation'); ?></h5>
                        <p><?php echo t('final_confirmation_desc'); ?></p>
                    </div>
                </div>
                
                <div class="progress-step">
                    <div class="step-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="step-content">
                        <h5><?php echo t('account_activated'); ?></h5>
                        <p><?php echo t('account_activated_desc'); ?></p>
                    </div>
                </div>
                
                <div class="mt-5">
                    <h5 class="mb-3" style="color: #E30A17;"><i class="fas fa-star me-2"></i><?php echo t('membership_benefits'); ?></h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check me-2" style="color: #E30A17;"></i><?php echo t('benefit1'); ?></li>
                        <li class="mb-2"><i class="fas fa-check me-2" style="color: #E30A17;"></i><?php echo t('benefit2'); ?></li>
                        <li class="mb-2"><i class="fas fa-check me-2" style="color: #E30A17;"></i><?php echo t('benefit3'); ?></li>
                        <li class="mb-2"><i class="fas fa-check me-2" style="color: #E30A17;"></i><?php echo t('benefit4'); ?></li>
                        <li class="mb-2"><i class="fas fa-check me-2" style="color: #E30A17;"></i><?php echo t('benefit5'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="register-footer">
            © <?php echo date('Y'); ?> Istanbul Guide. <?php echo $current_lang == 'fa' ? 'تمامی حقوق محفوظ است.' : t('copyright'); ?>
            <br>
            <a href="privacy.php"><?php echo t('privacy'); ?></a> | 
            <a href="terms.php"><?php echo t('terms'); ?></a> | 
            <a href="contact.php"><?php echo t('contact'); ?></a> | 
            <a href="about.php"><?php echo t('about'); ?></a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // نمایش/مخفی کردن رمز عبور
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const eyeIcon = document.querySelector(`#${fieldId} + .input-group-text i`);
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
        
        // بررسی قدرت رمز عبور
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const meter = document.getElementById('password-strength-meter');
            const text = document.getElementById('password-strength-text');
            
            // بررسی قدرت رمز
            let strength = 0;
            
            // طول رمز
            if (password.length >= 8) strength += 25;
            
            // حروف کوچک
            if (/[a-z]/.test(password)) strength += 25;
            
            // حروف بزرگ
            if (/[A-Z]/.test(password)) strength += 25;
            
            // اعداد و کاراکترهای خاص
            if (/[0-9]/.test(password)) strength += 15;
            if (/[^A-Za-z0-9]/.test(password)) strength += 10;
            
            // به روزرسانی نوار قدرت
            meter.className = 'strength-fill';
            meter.style.width = strength + '%';
            
            // متن وضعیت
            if (strength < 30) {
                meter.classList.add('strength-weak');
                text.textContent = '<?php echo t('password_strength'); ?><?php echo t('password_weak'); ?>';
                text.style.color = '#E30A17';
            } else if (strength < 60) {
                meter.classList.add('strength-medium');
                text.textContent = '<?php echo t('password_strength'); ?><?php echo t('password_medium'); ?>';
                text.style.color = '#FF8C00';
            } else if (strength < 85) {
                meter.classList.add('strength-strong');
                text.textContent = '<?php echo t('password_strength'); ?><?php echo t('password_strong'); ?>';
                text.style.color = '#FFD700';
            } else {
                meter.classList.add('strength-very-strong');
                text.textContent = '<?php echo t('password_strength'); ?><?php echo t('password_very_strong'); ?>';
                text.style.color = '#32CD32';
            }
        });
        
        // بررسی مطابقت رمز عبور
        document.getElementById('confirm_password').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            const matchDiv = document.getElementById('password-match');
            
            if (confirmPassword === '') {
                matchDiv.innerHTML = '';
            } else if (password === confirmPassword) {
                matchDiv.innerHTML = '<span style="color: #32CD32;"><i class="fas fa-check-circle me-1"></i><?php echo t('password_match'); ?></span>';
            } else {
                matchDiv.innerHTML = '<span style="color: #E30A17;"><i class="fas fa-times-circle me-1"></i><?php echo t('password_no_match'); ?></span>';
            }
        });
        
        document.getElementById('registerForm').addEventListener('submit', function(e) {
                const btn = document.getElementById('btnRegister');
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm_password').value;
                const agreeTerms = document.getElementById('agree_terms').checked;
                
                if (password !== confirmPassword) {
                    e.preventDefault();
                    alert('<?php echo t('password_match_error'); ?>');
                    return false;
                }
                
                if (!agreeTerms) {
                    e.preventDefault();
                    alert('<?php echo t('terms_required'); ?>');
                    return false;
                }
                
                // ✅ غیرفعال کردن دکمه با یه تأخیر بسیار کوتاه، تا مقدار POST ثبت بشه
                setTimeout(() => {
                    btn.disabled = true;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i><?php echo t('loading'); ?>';
                }, 50);
                
                return true;
        });
        
        // انیمیشن‌های ورودی‌ها
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach((input, index) => {
                input.style.animationDelay = `${index * 0.1}s`;
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('animate__animated', 'animate__pulse');
                });
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('animate__animated', 'animate__pulse');
                });
            });
            
            // انیمیشن مراحل
            const steps = document.querySelectorAll('.progress-step');
            steps.forEach((step, index) => {
                step.style.animationDelay = `${index * 0.2}s`;
                step.classList.add('animate__animated', 'animate__fadeInRight');
            });
            
            // انیمیشن ستاره‌ها
            const stars = document.querySelectorAll('.star-animation');
            stars.forEach((star, index) => {
                star.style.animationDelay = `${index * 0.5}s`;
            });
            
            // پیام خوش‌آمد در کنسول
            console.log('🌟 Istanbul Guide - <?php echo t('welcome_title'); ?> 🌟');
            console.log('🌐 Current Language: <?php echo $current_lang; ?>');
        });
        
        // تابع تغییر زبان
        function changeLanguage(lang) {
            console.log('Changing language to:', lang);
            window.location.href = '?lang=' + lang;
        }
        
        // مدیریت دکمه‌های زبان
        document.querySelectorAll('.language-dropdown a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const lang = this.getAttribute('href').split('=')[1];
                changeLanguage(lang);
            });
        });
    </script>
</body>
</html>