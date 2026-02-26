<?php
// includes/controllers/AuthController.php

/**
 * کنترلر احراز هویت
 */
class AuthController {
    private $userModel;
    private $db;
    
    public function __construct() {
        $this->db = getDB();
        $this->userModel = new User();
    }
    
    /**
     * ثبت‌نام کاربر جدید
     */
    public function register($data) {
        $errors = [];
        
        // اعتبارسنجی داده‌ها
        if (empty($data['username'])) {
            $errors[] = 'نام کاربری الزامی است';
        } elseif (strlen($data['username']) < 3) {
            $errors[] = 'نام کاربری باید حداقل ۳ کاراکتر باشد';
        } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $data['username'])) {
            $errors[] = 'نام کاربری فقط می‌تواند شامل حروف انگلیسی، اعداد و زیرخط باشد';
        }
        
        if (empty($data['email'])) {
            $errors[] = 'ایمیل الزامی است';
        } elseif (!isValidEmail($data['email'])) {
            $errors[] = 'ایمیل معتبر نیست';
        }
        
        if (empty($data['password'])) {
            $errors[] = 'رمز عبور الزامی است';
        } elseif (strlen($data['password']) < 6) {
            $errors[] = 'رمز عبور باید حداقل ۶ کاراکتر باشد';
        } elseif ($data['password'] !== ($data['confirm_password'] ?? '')) {
            $errors[] = 'رمز عبور و تأیید رمز عبور مطابقت ندارند';
        }
        
        // بررسی وجود کاربر
        if ($this->userModel->exists($data['username'])) {
            $errors[] = 'نام کاربری قبلاً ثبت شده است';
        }
        
        if ($this->userModel->exists($data['email'])) {
            $errors[] = 'ایمیل قبلاً ثبت شده است';
        }
        
        // بررسی کپچا
        if (!isset($_SESSION['captcha']) || $data['captcha'] !== $_SESSION['captcha']) {
            $errors[] = 'کد امنیتی اشتباه است';
        }
        
        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }
        
        // ایجاد کاربر
        $userData = [
            'username' => sanitize($data['username']),
            'email' => sanitize($data['email']),
            'password_hash' => hashPassword($data['password']),
            'full_name' => sanitize($data['full_name'] ?? ''),
            'language' => $_SESSION['language'] ?? 'fa',
            'theme' => $_SESSION['theme'] ?? 'light'
        ];
        
        $result = $this->userModel->create($userData);
        
        if ($result) {
            // ارسال ایمیل تأیید
            $this->sendVerificationEmail($result['id'], $data['email'], $result['verification_token']);
            
            // لاگ فعالیت
            logActivity($result['id'], 'register', ['email' => $data['email']]);
            
            return [
                'success' => true,
                'message' => 'ثبت‌نام موفقیت‌آمیز بود. لطفاً ایمیل خود را تأیید کنید.',
                'user_id' => $result['id']
            ];
        }
        
        return [
            'success' => false,
            'errors' => ['خطا در ثبت‌نام']
        ];
    }
    
    /**
     * ورود کاربر
     */
    public function login($data) {
        $errors = [];
        
        // اعتبارسنجی
        if (empty($data['identifier'])) {
            $errors[] = 'نام کاربری یا ایمیل الزامی است';
        }
        
        if (empty($data['password'])) {
            $errors[] = 'رمز عبور الزامی است';
        }
        
        if (!empty($errors)) {
            return [
                'success' => false,
                'errors' => $errors
            ];
        }
        
        // یافتن کاربر
        $user = $this->userModel->findByEmailOrUsername($data['identifier']);
        
        if (!$user) {
            return [
                'success' => false,
                'errors' => ['کاربری با این مشخصات یافت نشد']
            ];
        }
        
        // بررسی رمز عبور
        if (!verifyPassword($data['password'], $user['password_hash'])) {
            // افزایش شمارنده تلاش‌های ناموفق
            $this->incrementFailedAttempts($user['id']);
            
            return [
                'success' => false,
                'errors' => ['رمز عبور اشتباه است']
            ];
        }
        
        // بررسی فعال بودن حساب
        if (!$user['is_active']) {
            return [
                'success' => false,
                'errors' => ['حساب کاربری شما غیرفعال شده است']
            ];
        }
        
        // بررسی تأیید ایمیل
        if (!$user['is_verified']) {
            return [
                'success' => false,
                'errors' => ['لطفاً ابتدا ایمیل خود را تأیید کنید'],
                'needs_verification' => true,
                'user_id' => $user['id']
            ];
        }
        
        // ایجاد سشن
        $this->createSession($user);
        
        // ایجاد توکن برای Remember Me
        if (isset($data['remember']) && $data['remember']) {
            $this->createRememberToken($user['id']);
        }
        
        // پاک کردن شمارنده تلاش‌های ناموفق
        $this->resetFailedAttempts($user['id']);
        
        // لاگ فعالیت
        logActivity($user['id'], 'login', [
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? ''
        ]);
        
        return [
            'success' => true,
            'message' => 'ورود موفقیت‌آمیز',
            'user' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'full_name' => $user['full_name'],
                'avatar_url' => $user['avatar_url'],
                'language' => $user['language'],
                'theme' => $user['theme']
            ]
        ];
    }
    
    /**
     * ایجاد سشن کاربر
     */
    private function createSession($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_data'] = [
            'username' => $user['username'],
            'email' => $user['email'],
            'full_name' => $user['full_name'],
            'avatar_url' => $user['avatar_url'],
            'language' => $user['language'],
            'theme' => $user['theme'],
            'is_verified' => $user['is_verified']
        ];
        $_SESSION['last_activity'] = time();
        
        // ایجاد توکن CSRF جدید
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    /**
     * ایجاد توکن Remember Me
     */
    private function createRememberToken($userId) {
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+30 days'));
        
        $stmt = $this->db->prepare("
            INSERT INTO remember_tokens (user_id, token, expires_at, user_agent, ip_address)
            VALUES (:user_id, :token, :expires_at, :user_agent, :ip_address)
        ");
        
        $stmt->execute([
            ':user_id' => $userId,
            ':token' => $token,
            ':expires_at' => $expires,
            ':user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
            ':ip_address' => $_SERVER['REMOTE_ADDR'] ?? ''
        ]);
        
        // ذخیره در کوکی
        setcookie('remember_token', $token, [
            'expires' => time() + (30 * 24 * 60 * 60),
            'path' => '/',
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => isset($_SERVER['HTTPS']),
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }
    
    /**
     * افزایش شمارنده تلاش‌های ناموفق
     */
    private function incrementFailedAttempts($userId) {
        $stmt = $this->db->prepare("
            UPDATE users 
            SET failed_attempts = failed_attempts + 1,
                last_failed_attempt = NOW()
            WHERE id = :user_id
        ");
        
        $stmt->execute([':user_id' => $userId]);
        
        // اگر تلاش‌ها بیشتر از ۵ بار بود، حساب را قفل کن
        $stmt = $this->db->prepare("
            UPDATE users 
            SET is_locked = 1, locked_until = DATE_ADD(NOW(), INTERVAL 30 MINUTE)
            WHERE id = :user_id 
            AND failed_attempts >= 5
        ");
        
        $stmt->execute([':user_id' => $userId]);
    }
    
    /**
     * ریست شمارنده تلاش‌های ناموفق
     */
    private function resetFailedAttempts($userId) {
        $stmt = $this->db->prepare("
            UPDATE users 
            SET failed_attempts = 0, 
                last_failed_attempt = NULL,
                is_locked = 0,
                locked_until = NULL
            WHERE id = :user_id
        ");
        
        $stmt->execute([':user_id' => $userId]);
    }
    
    /**
     * ارسال ایمیل تأیید
     */
    private function sendVerificationEmail($userId, $email, $token) {
        $verificationLink = FRONTEND_URL . "/verify.php?token=" . urlencode($token);
        
        $subject = "تأیید ایمیل - راهنمای استانبول";
        $body = "
            <div dir='rtl' style='font-family: Vazirmatn, Tahoma, sans-serif;'>
                <h2>خوش آمدید به راهنمای استانبول!</h2>
                <p>برای فعال‌سازی حساب کاربری خود، روی لینک زیر کلیک کنید:</p>
                <p style='text-align: center; margin: 30px 0;'>
                    <a href='{$verificationLink}' 
                       style='background: #4F46E5; color: white; padding: 12px 30px; 
                              text-decoration: none; border-radius: 8px; display: inline-block;'>
                        تأیید ایمیل
                    </a>
                </p>
                <p>اگر شما این درخواست را ندادید، این ایمیل را نادیده بگیرید.</p>
                <hr>
                <p style='color: #6B7280; font-size: 12px;'>
                    این ایمیل به صورت خودکار ارسال شده است. لطفاً پاسخ ندهید.
                </p>
            </div>
        ";
        
        sendEmail($email, $subject, $body);
    }
    
    /**
     * خروج کاربر
     */
    public function logout() {
        // حذف توکن Remember Me
        if (isset($_COOKIE['remember_token'])) {
            $this->deleteRememberToken($_COOKIE['remember_token']);
            setcookie('remember_token', '', time() - 3600, '/');
        }
        
        // لاگ فعالیت
        if (isset($_SESSION['user_id'])) {
            logActivity($_SESSION['user_id'], 'logout');
        }
        
        // پاک کردن سشن
        $_SESSION = [];
        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        session_destroy();
        
        return [
            'success' => true,
            'message' => 'خروج موفقیت‌آمیز بود'
        ];
    }
    
    /**
     * حذف توکن Remember Me
     */
    private function deleteRememberToken($token) {
        $stmt = $this->db->prepare("
            DELETE FROM remember_tokens 
            WHERE token = :token
        ");
        
        $stmt->execute([':token' => $token]);
    }
    
    /**
     * ورود با توکن Remember Me
     */
    public function loginWithRememberToken($token) {
        $stmt = $this->db->prepare("
            SELECT user_id, expires_at 
            FROM remember_tokens 
            WHERE token = :token 
            AND expires_at > NOW()
        ");
        
        $stmt->execute([':token' => $token]);
        $tokenData = $stmt->fetch();
        
        if (!$tokenData) {
            return false;
        }
        
        $user = $this->userModel->findById($tokenData['user_id']);
        
        if ($user && $user['is_active'] && $user['is_verified']) {
            $this->createSession($user);
            
            // تمدید توکن
            $this->renewRememberToken($token);
            
            return $user;
        }
        
        return false;
    }
    
    /**
     * تمدید توکن Remember Me
     */
    private function renewRememberToken($oldToken) {
        $newToken = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+30 days'));
        
        $stmt = $this->db->prepare("
            UPDATE remember_tokens 
            SET token = :new_token, 
                expires_at = :expires_at,
                renewed_at = NOW()
            WHERE token = :old_token
        ");
        
        $stmt->execute([
            ':new_token' => $newToken,
            ':expires_at' => $expires,
            ':old_token' => $oldToken
        ]);
        
        // آپدیت کوکی
        setcookie('remember_token', $newToken, [
            'expires' => time() + (30 * 24 * 60 * 60),
            'path' => '/',
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => isset($_SERVER['HTTPS']),
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }
    
    /**
     * درخواست بازنشانی رمز عبور
     */
    public function requestPasswordReset($email) {
        $user = $this->userModel->findByEmailOrUsername($email);
        
        if (!$user) {
            return [
                'success' => false,
                'message' => 'اگر ایمیل شما در سیستم وجود داشته باشد، لینک بازنشانی ارسال خواهد شد'
            ];
        }
        
        if (!$user['is_active']) {
            return [
                'success' => false,
                'errors' => ['حساب کاربری غیرفعال است']
            ];
        }
        
        $resetToken = $this->userModel->createPasswordResetToken($email);
        
        if ($resetToken) {
            $this->sendPasswordResetEmail($email, $resetToken);
            
            return [
                'success' => true,
                'message' => 'لینک بازنشانی رمز عبور به ایمیل شما ارسال شد'
            ];
        }
        
        return [
            'success' => false,
            'errors' => ['خطا در ایجاد لینک بازنشانی']
        ];
    }
    
    /**
     * ارسال ایمیل بازنشانی رمز عبور
     */
    private function sendPasswordResetEmail($email, $token) {
        $resetLink = FRONTEND_URL . "/reset-password.php?token=" . urlencode($token);
        
        $subject = "بازنشانی رمز عبور - راهنمای استانبول";
        $body = "
            <div dir='rtl' style='font-family: Vazirmatn, Tahoma, sans-serif;'>
                <h2>بازنشانی رمز عبور</h2>
                <p>برای بازنشانی رمز عبور خود، روی لینک زیر کلیک کنید:</p>
                <p style='text-align: center; margin: 30px 0;'>
                    <a href='{$resetLink}' 
                       style='background: #EF4444; color: white; padding: 12px 30px; 
                              text-decoration: none; border-radius: 8px; display: inline-block;'>
                        بازنشانی رمز عبور
                    </a>
                </p>
                <p>این لینک فقط برای ۱ ساعت معتبر است.</p>
                <p>اگر شما این درخواست را ندادید، این ایمیل را نادیده بگیرید.</p>
                <hr>
                <p style='color: #6B7280; font-size: 12px;'>
                    این ایمیل به صورت خودکار ارسال شده است. لطفاً پاسخ ندهید.
                </p>
            </div>
        ";
        
        sendEmail($email, $subject, $body);
    }
    
    /**
     * تغییر رمز عبور
     */
    public function changePassword($userId, $currentPassword, $newPassword) {
        $user = $this->userModel->findById($userId);
        
        if (!$user) {
            return [
                'success' => false,
                'errors' => ['کاربر یافت نشد']
            ];
        }
        
        // بررسی رمز عبور فعلی
        if (!verifyPassword($currentPassword, $user['password_hash'])) {
            return [
                'success' => false,
                'errors' => ['رمز عبور فعلی اشتباه است']
            ];
        }
        
        // تغییر رمز عبور
        $newPasswordHash = hashPassword($newPassword);
        $result = $this->userModel->update($userId, ['password_hash' => $newPasswordHash]);
        
        if ($result) {
            // لاگ فعالیت
            logActivity($userId, 'password_change');
            
            // خروج از تمام دستگاه‌ها
            $this->logoutFromAllDevices($userId);
            
            return [
                'success' => true,
                'message' => 'رمز عبور با موفقیت تغییر کرد'
            ];
        }
        
        return [
            'success' => false,
            'errors' => ['خطا در تغییر رمز عبور']
        ];
    }
    
    /**
     * خروج از تمام دستگاه‌ها
     */
    private function logoutFromAllDevices($userId) {
        // حذف تمام توکن‌های Remember Me
        $stmt = $this->db->prepare("
            DELETE FROM remember_tokens 
            WHERE user_id = :user_id
        ");
        
        $stmt->execute([':user_id' => $userId]);
        
        // حذف تمام سشن‌ها (در یک سیستم واقعی، سشن‌ها در دیتابیس ذخیره می‌شوند)
        // اینجا فقط کوکی‌های مربوطه را پاک می‌کنیم
    }
}
?>