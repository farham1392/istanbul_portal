<?php
// includes/models/User.php

/**
 * کلاس مدل کاربر
 */
class User {
    private $db;
    private $userData;
    
    public function __construct() {
        $this->db = getDB();
    }
    
    /**
     * پیدا کردن کاربر با ایمیل یا نام کاربری
     */
    public function findByEmailOrUsername($identifier) {
        $stmt = $this->db->prepare("
            SELECT id, username, email, password_hash, full_name, 
                   avatar_url, language, theme, is_active, is_verified,
                   created_at, updated_at
            FROM users 
            WHERE (username = :identifier OR email = :identifier)
            AND is_active = 1
        ");
        
        $stmt->execute([':identifier' => $identifier]);
        $this->userData = $stmt->fetch();
        
        return $this->userData;
    }
    
    /**
     * پیدا کردن کاربر با ID
     */
    public function findById($userId) {
        $stmt = $this->db->prepare("
            SELECT id, username, email, full_name, avatar_url, 
                   language, theme, is_active, is_verified,
                   created_at, updated_at
            FROM users 
            WHERE id = :user_id
            AND is_active = 1
        ");
        
        $stmt->execute([':user_id' => $userId]);
        $this->userData = $stmt->fetch();
        
        return $this->userData;
    }
    
    /**
     * ایجاد کاربر جدید
     */
    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO users (username, email, password_hash, full_name, 
                              language, theme, verification_token)
            VALUES (:username, :email, :password_hash, :full_name,
                    :language, :theme, :verification_token)
        ");
        
        $verificationToken = bin2hex(random_bytes(32));
        
        $result = $stmt->execute([
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':password_hash' => $data['password_hash'],
            ':full_name' => $data['full_name'] ?? '',
            ':language' => $data['language'] ?? 'fa',
            ':theme' => $data['theme'] ?? 'light',
            ':verification_token' => $verificationToken
        ]);
        
        if ($result) {
            $userId = $this->db->lastInsertId();
            
            // ایجاد پوشه کاربر
            $this->createUserDirectory($userId);
            
            return [
                'id' => $userId,
                'verification_token' => $verificationToken
            ];
        }
        
        return false;
    }
    
    /**
     * به‌روزرسانی پروفایل کاربر
     */
    public function update($userId, $data) {
        $fields = [];
        $params = [':user_id' => $userId];
        
        if (isset($data['full_name'])) {
            $fields[] = 'full_name = :full_name';
            $params[':full_name'] = $data['full_name'];
        }
        
        if (isset($data['avatar_url'])) {
            $fields[] = 'avatar_url = :avatar_url';
            $params[':avatar_url'] = $data['avatar_url'];
        }
        
        if (isset($data['language'])) {
            $fields[] = 'language = :language';
            $params[':language'] = $data['language'];
        }
        
        if (isset($data['theme'])) {
            $fields[] = 'theme = :theme';
            $params[':theme'] = $data['theme'];
        }
        
        if (isset($data['password_hash'])) {
            $fields[] = 'password_hash = :password_hash';
            $params[':password_hash'] = $data['password_hash'];
        }
        
        if (empty($fields)) {
            return false;
        }
        
        $sql = "UPDATE users SET " . implode(', ', $fields) . ", updated_at = NOW() WHERE id = :user_id";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute($params);
    }
    
    /**
     * فعال‌سازی حساب کاربری
     */
    public function verify($verificationToken) {
        $stmt = $this->db->prepare("
            UPDATE users 
            SET is_verified = 1, verification_token = NULL, updated_at = NOW()
            WHERE verification_token = :token
            AND is_verified = 0
        ");
        
        return $stmt->execute([':token' => $verificationToken]);
    }
    
    /**
     * بررسی اینکه آیا ایمیل یا نام کاربری وجود دارد
     */
    public function exists($identifier) {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) as count 
            FROM users 
            WHERE username = :identifier OR email = :identifier
        ");
        
        $stmt->execute([':identifier' => $identifier]);
        $result = $stmt->fetch();
        
        return $result['count'] > 0;
    }
    
    /**
     * ایجاد توکن بازنشانی رمز عبور
     */
    public function createPasswordResetToken($email) {
        $resetToken = bin2hex(random_bytes(32));
        $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $stmt = $this->db->prepare("
            UPDATE users 
            SET reset_token = :reset_token, 
                reset_token_expires = :expires_at
            WHERE email = :email
            AND is_active = 1
        ");
        
        $stmt->execute([
            ':reset_token' => $resetToken,
            ':expires_at' => $expiresAt,
            ':email' => $email
        ]);
        
        if ($stmt->rowCount() > 0) {
            return $resetToken;
        }
        
        return false;
    }
    
    /**
     * بازنشانی رمز عبور با توکن
     */
    public function resetPassword($token, $newPasswordHash) {
        $stmt = $this->db->prepare("
            UPDATE users 
            SET password_hash = :password_hash,
                reset_token = NULL,
                reset_token_expires = NULL,
                updated_at = NOW()
            WHERE reset_token = :token
            AND reset_token_expires > NOW()
            AND is_active = 1
        ");
        
        return $stmt->execute([
            ':password_hash' => $newPasswordHash,
            ':token' => $token
        ]);
    }
    
    /**
     * گرفتن آمار کاربر
     */
    public function getStats($userId) {
        $stats = [
            'favorites_count' => 0,
            'itineraries_count' => 0,
            'reviews_count' => 0,
            'photos_count' => 0
        ];
        
        try {
            // تعداد علاقه‌مندی‌ها
            $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM favorites WHERE user_id = :user_id");
            $stmt->execute([':user_id' => $userId]);
            $result = $stmt->fetch();
            $stats['favorites_count'] = $result['count'];
            
            // تعداد برنامه‌های سفر
            $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM itineraries WHERE user_id = :user_id");
            $stmt->execute([':user_id' => $userId]);
            $result = $stmt->fetch();
            $stats['itineraries_count'] = $result['count'];
            
        } catch (Exception $e) {
            error_log("Error getting user stats: " . $e->getMessage());
        }
        
        return $stats;
    }
    
    /**
     * ایجاد پوشه کاربر برای آپلودها
     */
    private function createUserDirectory($userId) {
        $userDir = ROOT_PATH . '/uploads/users/' . $userId;
        
        if (!file_exists($userDir)) {
            mkdir($userDir, 0755, true);
            mkdir($userDir . '/avatar', 0755, true);
            mkdir($userDir . '/photos', 0755, true);
            mkdir($userDir . '/documents', 0755, true);
        }
    }
    
    /**
     * دریافت داده کاربر
     */
    public function getData() {
        return $this->userData;
    }
}
?>