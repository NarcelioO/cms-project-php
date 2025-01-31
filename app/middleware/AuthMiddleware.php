<?php

namespace app\middleware;

class AuthMiddleware{

    public static function checkAuth()
    {
        session_start();

        if(!isset($_SESSION['user_id'])){
            header('Location: /admin/auth/login');
            exit;
        }
    }
}