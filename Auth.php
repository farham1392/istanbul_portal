<?php
// includes/auth.php

session_start();
require_once 'config/database.php';

class Auth {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // ثبت‌نام کاربر
    public function register($userData) {
        $username = $this->db->sanitize($userData['username']);
        $email = $this->db->sanitize($userData['email']);
        $password = password_hash($userData['password'], PASSWORD_BCRYPT);
        
        $query = "INSERT INTO users 
                  (username, email, password_hash, full_name, phone, language, theme) 
                  VALUES (:username, :email, :password, :full_name, :phone, :language, :theme)";
        
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':full_name', $userData['full_name']);
        $stmt->bindParam(':phone', $userData['phone']);
        $stmt->bindParam(':language', $userData['language'] ?? 'fa');
        $stmt->bindParam(':theme', $userData['theme'] ?? 'light');
        
        if($stmt->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    // ورود کاربر
    public function login($username, $password) {
        $query = "SELECT id, username, email, password_hash, full_name, language, theme 
                  FROM users WHERE username = :username OR email = :username";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            if(password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['language'] = $user['language'];
                $_SESSION['theme'] = $user['theme'];
                
                return [
                    'status' => 'success',
                    'user' => $user
                ];
            }
        }
        return ['status' => 'error', 'message' => 'نام کاربری یا رمز عبور اشتباه است'];
    }

    // بررسی لاگین بودن کاربر
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // دریافت اطلاعات کاربر
    public function getUser($userId = null) {
        $userId = $userId ?? $_SESSION['user_id'];
        
        $query = "SELECT id, username, email, full_name, phone, avatar_url, language, theme, 
                         created_at 
                  FROM users WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        
        return $stmt->fetch();
    }

    // خروج کاربر
    public function logout() {
        session_destroy();
        return true;
    }
}