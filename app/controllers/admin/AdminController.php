<?php 
namespace app\controllers\admin;

use app\middleware\AuthMiddleware;
use core\Controller;

class AdminController extends Controller{
    
    public function __construct()
    {
       AuthMiddleware::checkAuth();
    }
    
    public function index()
    {
            
        $heading = "Admin Controller";
        return require Controller::view('admin/index.view.php',[
            'heading' => $heading
        ]);
    }
    
}
