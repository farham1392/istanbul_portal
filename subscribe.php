<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$email = $_POST['email'] ?? '';

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'ایمیل معتبر وارد کنید']);
    exit;
}

// Save to file (in production, save to database)
$file = 'newsletter_subscribers.txt';
$entry = date('Y-m-d H:i:s') . " | " . $email . PHP_EOL;
file_put_contents($file, $entry, FILE_APPEND);

echo json_encode([
    'success' => true,
    'message' => 'عضویت در خبرنامه با موفقیت انجام شد'
], JSON_UNESCAPED_UNICODE);
?>