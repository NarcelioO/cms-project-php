<?php

namespace app\middleware;

class AuthMiddleware{

    public static function checkAuth()
    {
        if(!self::isAuthenticated()){
            header('Location: /admin/auth/login');
            exit;
        }
    }
    private static function isAuthenticated()
    {
        return isset($_SESSION['user_id']);
    }
}