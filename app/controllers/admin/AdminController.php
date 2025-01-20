<?php 
namespace app\controllers\admin;

use core\Controller;

class AdminController{
    
    public function index()
    {
            $heading = "Admin Controller";
        //    $posts = Post::all();
           //dd($posts);
        //    return require (base_path('../app/views/admin/index.view.php'));
           return require Controller::view('admin/index.view.php',[
              
           ]);
    }
    
}
