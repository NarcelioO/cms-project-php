<?php

namespace app\controllers\admin;

use app\models\User;
use core\Controller;

class AuthController{

    public function login()
    {
        if(isset($_SESSION['user_id'])){
            header('Location: /admin');
            exit;
        }
        return require Controller::view('/admin/auth/login.view.php');
    }

    public function register()
    {   
        return require Controller::view('/admin/auth/register.view.php');
    }

    public function logout()
    {
        session_destroy();
        header('Location: /admin/auth/login');
        exit();
    }

    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::where('email', $email)->first();

        if($user && password_verify($password, $user->password)){
            
            session_start();
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header('Location: /admin');
            exit();
        }

        header('Location: /admin/auth/login?error=invalid_credentials');
        exit();
    }

    public function store()
    {
        $user = new User;
        $data = [
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'email' => $_POST['email']
        ];
        $user->create($data);

        header('Location: admin/login');
    }
}