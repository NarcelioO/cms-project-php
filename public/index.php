<?php

use core\Controller;
use core\Method;
use core\Params;

require '../bootstrap.php';
//require '../core/Router.php';]
try{
    
    $controller = new Controller;
    $controller = $controller->load();
    
    $method = new Method;
    $method = $method->load($controller);

    $params = new Params;
    $params = $params->load();

    $controller->$method($params);


}catch(Exception $e){
    dd($e->getMessage());
}



// if($_SERVER['REQUEST_URI'] === '/login'){
//     require '../app/controllers/login/LoginController.php';
// }


?>

