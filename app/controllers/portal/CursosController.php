<?php
namespace app\controllers\portal;

use app\controllers\ContainerController;
use core\Controller;

class CursosController extends ContainerController{


    public function index()
    {
        $heading = "Cursos Home"; 
        require Controller::view('/portal/about.view.php',[
            'heading' => $heading,
        ]);
        
    }

}

