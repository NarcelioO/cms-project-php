<?php

namespace app\controllers\admin;

use app\middleware\AuthMiddleware;
use app\models\User;
use app\services\Sanitizer;
use app\services\Validator;
use core\Controller;

class AuthController extends Controller{

    
    public function login()
    {
        if(isset($_SESSION['user_id'])){
            header('Location: /admin');
            exit;
        }
         require Controller::view('/admin/auth/login.view.php');
    }

    public function register()
    {   
        if(!isset($_SESSION['user_id'])){
            header('Location: /admin/auth/login');
            exit;
        }
        
         require Controller::view('/admin/auth/register.view.php');
    }

    public function logout()
    {
        session_destroy();
        header('Location: /admin/auth/login');
        exit;
    }

    public function authenticate()
    {
        
        $email = Sanitizer::email($_POST['email']) ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::where('email', $email);
        if($user && password_verify($password, $user['password'])){
            
            //session_start();
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header('Location: /admin');
            exit;
        }

        header('Location: /admin/auth/login?error=invalid_credentials');
        exit;
    }

    public function store()
    {

        $data = [
            'name' => Sanitizer::string($_POST['name']),
            'email' => Sanitizer::email($_POST['email']),
            'password' => $_POST['password']
        ];

        $errors = [];

        if(!Validator::string($data['name'], 3, 50)){
            $errors['name'] = 'O nome deve ter entre 3 e 50 caracteres.';
        }

        if(!Validator::email($data['email'])){
            $errors['email'] = 'O email fornecido não é valido.';
        }

        if(!Validator::password($data['password'])){
            $errors['password'] = 'A senha deve ter pelo menos 8 caracteres.';
        }

        $user = User::where('email', $_POST['email']);

        if($user){
           $erros['email'] = 'Este e-mail já está em uso.';
            // header('Location: /admin/auth/register');
            // exit();
        }

        if(empty($errors)){
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);


            User::create($data);

            header('Location: /admin');
            exit;
        }

        $this->render('/admin/auth/register.view.php',[
            'errors' => $errors,
            'data' => $data
        ]);
        // require Controller::view('/admin/auth/register.view.php', 
        // [
        //     'errors' => $errors,
        //     'data' => $data
        // ]);

    }
}