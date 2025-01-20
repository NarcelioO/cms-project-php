<?php
namespace app\controllers\admin;

use core\Controller;

class LoginController extends Controller{

    public function index()
    {
        return require Controller::view('/admin/auth/login.view.php');
    }
}