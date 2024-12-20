<?php
define('BASE_PATH', '/');
define('ASSETS_PATH', BASE_PATH . 'public/assets/imgs/');
define('ASSET_BASE_URL', '/public/');
function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";


    die();

}
function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function base_url($path=''){
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

    $host = $_SERVER['HTTP_HOST'];

    return $protocol . "://" . $host . "/" .ltrim($path, '/');
}