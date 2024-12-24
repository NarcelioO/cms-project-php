<?php

use core\Controller;
use core\Database;
use core\Method;

require '../bootstrap.php';
//require '../core/Router.php';


try{
    $controller = new Controller();
    $controller = $controller->load();

    $method = new Method();
    $method = $method->load($controller);

    $controller->$method();


}catch(Exception $e){
    dd($e->getMessage());
}

// if($_SERVER['REQUEST_URI'] === '/login'){
//     require '../app/controllers/login/LoginController.php';
// }


?>

