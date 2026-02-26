<?php
// includes/ApiResponse.php

class ApiResponse {
    public static function success($data = null, $message = null, $code = 200) {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data,
            'timestamp' => time(),
            'version' => '1.0'
        ];
        
        http_response_code($code);
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
    
    public static function error($message, $code = 400, $errors = null) {
        $response = [
            'success' => false,
            'message' => $message,
            'errors' => $errors,
            'timestamp' => time(),
            'version' => '1.0'
        ];
        
        http_response_code($code);
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
    
    public static function notFound($message = 'منبع مورد نظر یافت نشد') {
        self::error($message, 404);
    }
    
    public static function unauthorized($message = 'دسترسی غیرمجاز') {
        self::error($message, 401);
    }
    
    public static function forbidden($message = 'شما دسترسی ندارید') {
        self::error($message, 403);
    }
    
    public static function validationError($errors, $message = 'خطا در اعتبارسنجی داده‌ها') {
        self::error($message, 422, $errors);
    }
    
    public static function serverError($message = 'خطای داخلی سرور') {
        self::error($message, 500);
    }
    
    public static function paginated($data, $total, $page, $perPage, $message = null) {
        $totalPages = ceil($total / $perPage);
        
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data,
            'pagination' => [
                'total' => $total,
                'count' => count($data),
                'per_page' => $perPage,
                'current_page' => $page,
                'total_pages' => $totalPages,
                'has_more' => $page < $totalPages
            ],
            'timestamp' => time()
        ];
        
        http_response_code(200);
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit();
    }
}
?>