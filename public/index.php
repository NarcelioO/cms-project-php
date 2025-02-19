<?php
require '../bootstrap.php';

use core\Controller;
use core\Method;
use core\Params;



try{

    $controller = new Controller;
    $controller = $controller->load();
    
    $method = new Method;
    $method = $method->load($controller);

    $params = new Params;
    $params = $params->load();
    
    $controller->$method($params);
   
}catch(Exception $e){
    header('Location: /erro/404');
    dd('Erro: ' .  $e->getMessage());

}


?>

