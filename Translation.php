<?php
class Translation {
    private $language = 'fa';
    private $translations = [];
    
    public function __construct() {
        $this->detectLanguage();
        $this->loadTranslations();
    }
    
    public function detectLanguage() {
        if (isset($_SESSION['language'])) {
            $this->language = $_SESSION['language'];
        } elseif (isset($_GET['lang'])) {
            $this->language = $_GET['lang'];
            $_SESSION['language'] = $this->language;
        } else {
            // Detect from browser
            $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            $allowed = ['fa', 'tr', 'en'];
            $this->language = in_array($browserLang, $allowed) ? $browserLang : 'fa';
        }
        
        // Set RTL for Arabic and Persian
        if (in_array($this->language, ['fa', 'ar'])) {
            $this->isRTL = true;
        } else {
            $this->isRTL = false;
        }
        
        return $this->language;
    }
    
    public function setLanguage($lang) {
        $allowed = ['fa', 'tr', 'en'];
        if (in_array($lang, $allowed)) {
            $this->language = $lang;
            $_SESSION['language'] = $lang;
            $this->loadTranslations();
        }
    }
    
    public function getLanguage() {
        return $this->language;
    }
    
    public function isRTL() {
        return in_array($this->language, ['fa', 'ar']);
    }
    
    private function loadTranslations() {
        $file = __DIR__ . '/languages/' . $this->language . '.php';
        
        if (file_exists($file)) {
            $this->translations = require $file;
        } else {
            // Fallback to English
            $this->translations = require __DIR__ . '/languages/en.php';
        }
    }
    
    public function get($key, $default = '') {
        return isset($this->translations[$key]) ? $this->translations[$key] : $default;
    }
    
    public function getAll() {
        return $this->translations;
    }
}
?>