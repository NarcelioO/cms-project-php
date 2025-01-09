<?php

define('BASE_PATH', __DIR__ . '/../');
define('ASSETS_PATH', BASE_PATH . 'public/assets/imgs/');
define('ASSET_BASE_URL', '/public/');


function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";


    die();

}
function base_path($path)
{
    return BASE_PATH . ltrim($path, '/');
}

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function base_url($path=''){
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

    $host = $_SERVER['HTTP_HOST'];

    return $protocol . "://" . $host . "/" .ltrim($path, '/');
}

function asset($path){
    return base_url(). "/assets/" .  ltrim($path, '/');
}

function view($path, $data = []){   
        extract($data);
        return base_path('/views/'. ltrim($path));
}