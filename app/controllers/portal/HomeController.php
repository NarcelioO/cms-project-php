<?php
namespace app\controllers\portal;

use core\Controller;


class HomeController extends Controller
{
    public function index()
    {
        $heading = "Index Home"; 
        require view('/portal/index.view.php',[
            'heading' => $heading,
        ]);
     
    }
}


?>
