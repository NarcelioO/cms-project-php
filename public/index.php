<?php

use core\Controller;
use core\Database;

require '../bootstrap.php';
//require '../core/Router.php';


try{
    $controller = new Controller();
    $controller->load();
    dd($controller);
}catch(Exception $e){
    dd($e->getMessage());
}

// if($_SERVER['REQUEST_URI'] === '/login'){
//     require '../app/controllers/login/LoginController.php';
// }


?>

