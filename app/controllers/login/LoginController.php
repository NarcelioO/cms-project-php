<?php

use core\Controller;

class LoginController extends Controller{

    public function index()
    {
        $heading = "Welcome to the Login Page";
        $this->view('login/index.view.php',[
            'heading' => $heading,
        ]);
    }
}