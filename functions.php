<?php
require_once 'config/database.php';

/**
 * تابع اتصال به دیتابیس
 */
function getDB() {
    $database = new Database();
    return $database->getConnection();
}

/**
 * تابع هش کردن پسورد
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

/**
 * تابع بررسی پسورد
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * تولید توکن JWT ساده
 */
function generateToken($userId) {
    $payload = [
        'user_id' => $userId,
        'iat' => time(),
        'exp' => time() + JWT_EXPIRE
    ];
    
    $base64UrlHeader = base64_encode(json_encode(['alg' => 'HS256', 'typ' => 'JWT']));
    $base64UrlPayload = base64_encode(json_encode($payload));
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, SECRET_KEY, true);
    $base64UrlSignature = base64_encode($signature);
    
    return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
}

/**
 * بررسی اعتبار توکن
 */
function validateToken($token) {
    $parts = explode('.', $token);
    if (count($parts) !== 3) return false;
    
    list($header, $payload, $signature) = $parts;
    
    $validSignature = hash_hmac('sha256', $header . "." . $payload, SECRET_KEY, true);
    if (base64_encode($validSignature) !== $signature) return false;
    
    $data = json_decode(base64_decode($payload), true);
    if ($data['exp'] < time()) return false;
    
    return $data;
}

/**
 * تابع دریافت کاربر جاری از توکن
 */
function getCurrentUser() {
    $headers = getallheaders();
    if (!isset($headers['Authorization'])) return null;
    
    $authHeader = $headers['Authorization'];
    if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
        $token = $matches[1];
        $userData = validateToken($token);
        return $userData ? $userData['user_id'] : null;
    }
    
    return null;
}

/**
 * تابع پاسخ JSON
 */
function jsonResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit();
}

/**
 * تابع بررسی درخواست POST
 */
function isPost() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * تابع بررسی درخواست GET
 */
function isGet() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

/**
 * تابع دریافت ورودی POST
 */
function getPost($key, $default = null) {
    return isset($_POST[$key]) ? trim($_POST[$key]) : $default;
}

/**
 * تابع دریافت ورودی GET
 */
function getQuery($key, $default = null) {
    return isset($_GET[$key]) ? trim($_GET[$key]) : $default;
}

/**
 * تابع اعتبارسنجی ایمیل
 */
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * تابع آپلود فایل
 */
function uploadFile($file, $type = 'image') {
    $uploadDir = UPLOAD_DIR . $type . '/';
    
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    $fileName = uniqid() . '_' . basename($file['name']);
    $targetPath = $uploadDir . $fileName;
    
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return SITE_URL . '/' . $targetPath;
    }
    
    return false;
}

/**
 * تابع ایجاد دسته‌بندی‌های متنوع برای مکان‌ها
 */
function getCategoryInfo($category) {
    $categories = [
        'historical' => ['name_fa' => 'تاریخی', 'icon' => 'fas fa-landmark', 'color' => '#7c3aed'],
        'museum' => ['name_fa' => 'موزه', 'icon' => 'fas fa-university', 'color' => '#10b981'],
        'mosque' => ['name_fa' => 'مسجد', 'icon' => 'fas fa-mosque', 'color' => '#0ea5e9'],
        'palace' => ['name_fa' => 'کاخ', 'icon' => 'fas fa-crown', 'color' => '#f59e0b'],
        'bazaar' => ['name_fa' => 'بازار', 'icon' => 'fas fa-shopping-bag', 'color' => '#ef4444'],
        'park' => ['name_fa' => 'پارک', 'icon' => 'fas fa-tree', 'color' => '#22c55e'],
        'cistern' => ['name_fa' => 'آب انبار', 'icon' => 'fas fa-water', 'color' => '#3b82f6'],
        'tower' => ['name_fa' => 'برج', 'icon' => 'fas fa-tower', 'color' => '#8b5cf6']
    ];
    
    return isset($categories[$category]) ? $categories[$category] : 
           ['name_fa' => $category, 'icon' => 'fas fa-map-marker-alt', 'color' => '#64748b'];
}

/**
 * تابع محاسبه فاصله بین دو مختصات جغرافیایی
 */
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // شعاع زمین به کیلومتر
    
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    
    $a = sin($dLat/2) * sin($dLat/2) +
         cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
         sin($dLon/2) * sin($dLon/2);
    
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    
    return round($earthRadius * $c, 2); // فاصله به کیلومتر
}

/**
 * تابع تبدیل محدوده قیمت به متن
 */
function getPriceRangeText($range) {
    $ranges = [
        'free' => 'رایگان',
        'low' => 'اقتصادی (تا 50 لیر)',
        'medium' => 'متوسط (50-150 لیر)',
        'high' => 'گران (150+ لیر)'
    ];
    
    return isset($ranges[$range]) ? $ranges[$range] : $range;
}

/**
 * تابع تولید ستاره‌های امتیاز
 */
function generateStars($rating) {
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars) >= 0.5;
    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
    
    $stars = str_repeat('<i class="fas fa-star"></i>', $fullStars);
    $stars .= $halfStar ? '<i class="fas fa-star-half-alt"></i>' : '';
    $stars .= str_repeat('<i class="far fa-star"></i>', $emptyStars);
    
    return $stars;
}

/**
 * تابع ایجاد برنامه سفر هوشمند
 */
function generateSmartItinerary($days, $interests, $budget) {
    $itinerary = [];
    
    $places = [
        ['name' => 'ایاصوفیه', 'category' => 'historical', 'duration' => 2, 'price' => 'medium'],
        ['name' => 'کاخ توپکاپی', 'category' => 'historical', 'duration' => 3, 'price' => 'medium'],
        ['name' => 'مسجد آبی', 'category' => 'mosque', 'duration' => 1, 'price' => 'free'],
        ['name' => 'بازار بزرگ', 'category' => 'bazaar', 'duration' => 2, 'price' => 'low'],
        ['name' => 'برج گالاتا', 'category' => 'tower', 'duration' => 1, 'price' => 'medium'],
        ['name' => 'کاخ دلما‌باغچه', 'category' => 'palace', 'duration' => 2, 'price' => 'high'],
        ['name' => 'آب انبار باسیلیکا', 'category' => 'cistern', 'duration' => 1, 'price' => 'medium'],
        ['name' => 'پارک گولهانه', 'category' => 'park', 'duration' => 1, 'price' => 'free']
    ];
    
    // فیلتر کردن مکان‌ها بر اساس علاقه‌مندی‌ها
    $filteredPlaces = array_filter($places, function($place) use ($interests) {
        if (empty($interests)) return true;
        return in_array($place['category'], $interests);
    });
    
    // فیلتر بر اساس بودجه
    if ($budget === 'low') {
        $filteredPlaces = array_filter($filteredPlaces, function($place) {
            return $place['price'] === 'free' || $place['price'] === 'low';
        });
    } elseif ($budget === 'medium') {
        $filteredPlaces = array_filter($filteredPlaces, function($place) {
            return $place['price'] !== 'high';
        });
    }
    
    $filteredPlaces = array_values($filteredPlaces);
    
    // ایجاد برنامه روزانه
    $currentDay = 1;
    $currentTime = 9; // شروع از 9 صبح
    $dayPlaces = [];
    
    foreach ($filteredPlaces as $place) {
        if ($currentTime + $place['duration'] <= 18) { // تا ساعت 6 عصر
            $dayPlaces[] = [
                'time' => $currentTime . ':00',
                'name' => $place['name'],
                'duration' => $place['duration']
            ];
            $currentTime += $place['duration'] + 1; // +1 برای استراحت
        }
        
        if ($currentTime >= 18 || count($dayPlaces) >= 4) {
            $itinerary[] = [
                'day' => $currentDay,
                'places' => $dayPlaces
            ];
            
            $currentDay++;
            $currentTime = 9;
            $dayPlaces = [];
            
            if ($currentDay > $days) break;
        }
    }
    
    // اگر روزها تمام نشده، برنامه را کامل کن
    while ($currentDay <= $days && !empty($dayPlaces)) {
        $itinerary[] = [
            'day' => $currentDay,
            'places' => $dayPlaces
        ];
        $currentDay++;
        $dayPlaces = [];
    }
    
    return $itinerary;
}
?>