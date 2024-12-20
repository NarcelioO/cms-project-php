<?php


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$routes = [ 
    '/' => '../app/controllers/portal/HomeController.php',
    '/admin'=>'../app/controllers/admin/AdminHomeController.php',
    '/admin/posts' => '../app/controllers/admin/AdminPostsController.php',
    '/voluntarios' => 'voluntarios.php'

];

function abort($code = 404){
    require "../app/views/{$code}.php";

    die();
}
if(array_key_exists($uri, $routes)){
     require $routes[$uri];
}else{
    abort(404);
}