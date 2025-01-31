<?php
namespace app\controllers\portal;

use core\Controller;


class HomeController extends Controller
{
    public function index()
    {
        $heading = "Index asdsadsa"; 
        require Controller::view('/portal/index.view.php',[
            'heading'=> $heading
        ]);
     
    }
}


?>
