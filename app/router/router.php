<?php

$routes =  [ 
    'GET' =>[
        '/'=>"Home@index",
        '/about' => 'About@index',
        '/servicos' => 'Services@index',
        '/solicitacoes' => 'About@index',
        '/empreenda' => 'Empreenda@index',
        '/cursos' => 'Cursos@index',
        '/blog' => 'Blog@index',
        '/parceiros' => 'Parceiros@index',
        '/voluntarios' => 'Voluntarios@index',
        '/contato' => 'About@index',
        '/admin' => 'Admin@index',
        '/login' => 'Login@index',
    ],
    'POST' => [],
    ];

 
function exactMatchUriInArrayRoutes($uri, $routes){
    if(array_key_exists($uri, $routes)){
         return [];
    }
    return [];
}

// function router(){
//     $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//     $routes = routes();
    
//     array_filter($routes, function ($value){
//         var_dump($value);
//     }, ARRAY_FILTER_USE_KEY);
    
// }
