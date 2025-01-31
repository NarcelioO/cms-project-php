<?php
namespace app\controllers\portal;

use app\controllers\ContainerController;

class CursosController extends ContainerController{


    public function index()
    {
        $heading = "Cursos Home"; 
        require view('/portal/about.view.php',[
            'heading' => $heading,
        ]);
        
    }

}

