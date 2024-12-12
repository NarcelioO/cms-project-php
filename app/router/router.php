<?php

function routes(){
    return require 'routes.php';
}
 
function exactMatchUriInArrayRoutes($uri, $routes){
    if(array_key_exists($uri, $routes)){
         return [];
    }
    return [];
}

function router(){
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $routes = routes();
    
    array_filter($routes, function ($value){
        var_dump($value);
    }, ARRAY_FILTER_USE_KEY);
    //$matchedUri = exactMatchUriInArrayRoutes($uri, $routes);
    
}
