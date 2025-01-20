<?php
namespace app\controllers\admin;

use core\Controller;

class RegisterController extends Controller{

    public function index()
    {
        return require Controller::view('/admin/auth/register.view.php');
    }
}