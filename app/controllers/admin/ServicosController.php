<?php
namespace app\controllers\admin;

use app\middleware\AuthMiddleware;
use core\Controller;

class ServicosController{

    
    public function index()
    {
        $heading = "Serviços Page";
        
        require Controller::view('/admin/servicos/index.view.php',[
            'heading' => $heading
        ]);
    }
}