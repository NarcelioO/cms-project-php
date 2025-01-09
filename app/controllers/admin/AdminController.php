<?php 
namespace app\controllers\admin;

class AdminController{
    
    public function index()
    {
            $heading = "Home";
        //    $posts = Post::all();
           //dd($posts);
           require view('admin/index.view.php',[
              'heading'=>$heading,
           ]);
    }
    
}
