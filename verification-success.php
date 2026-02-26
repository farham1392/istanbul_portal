<?php
// verification-success.php
require_once 'includes/init.php';

if (!isset($_SESSION['verification_success'])) {
    redirect('index.php');
}

unset($_SESSION['verification_success']);
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ایمیل شما تأیید شد</title>
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            text-align: center;
            color: white;
        }
        
        .success-card {
            background: white;
            color: #1F2937;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 500px;
            animation: popIn 0.5s ease;
        }
        
        @keyframes popIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        
        .success-icon {
            font-size: 64px;
            color: #10B981;
            margin-bottom: 20px;
            animation: bounce 1s ease infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        h1 {
            margin-bottom: 15px;
            color: #065F46;
        }
        
        p {
            margin-bottom: 25px;
            line-height: 1.6;
            color: #6B7280;
        }
        
        .actions {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        
        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: #10B981;
            color: white;
        }
        
        .btn-secondary {
            background: #F3F4F6;
            color: #374151;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="success-card">
        <div class="success-icon">✅</div>
        <h1>تبریک! ایمیل شما تأیید شد</h1>
        <p>حساب کاربری شما با موفقیت فعال شد. اکنون می‌توانید از تمام امکانات راهنمای استانبول استفاده کنید.</p>
        <div class="actions">
            <a href="login.php" class="btn btn-primary">ورود به حساب</a>
            <a href="index.php" class="btn btn-secondary">برگشت به صفحه اصلی</a>
        </div>
    </div>
</body>
</html>