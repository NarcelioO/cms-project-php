<?php
require '../bootstrap.php';

use core\Controller;
use core\Method;
use core\Params;

try{

    $controller = (new Controller)->load();
    
    $method = (new Method)->load($controller);

    $params = (new Params)->load();
    
    $controller->$method($params);
   
}catch(Exception $e){
    error_log($e->getMessage());
    header('Location: /erro/404');
    exit;

}


?>

