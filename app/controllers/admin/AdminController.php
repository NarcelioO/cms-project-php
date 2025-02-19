<?php 
namespace app\controllers\admin;

use app\middleware\AuthMiddleware;
use core\Controller;

class AdminController extends Controller{
    
   
    
    public function index()
    {
            
        $heading = "Admin Controller";

        $this->render('/admin/index.view.php',[
            'heading' => $heading,
        ]);
    }
    
}
