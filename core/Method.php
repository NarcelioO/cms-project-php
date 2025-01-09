<?php
namespace core;

use app\classes\Uri;
use exceptions\MethodNotExistException;

class Method{
    private $uri;
    
    public function __construct()
    {
        $this->uri = Uri::uri();
    }

    public function load($controller)
    {
        $method = $this->getMethod();

        if(!method_exists($controller, $method))
        {
            throw new MethodNotExistException("Esse método não existe: {$method}");
        }   

        return $method;
    }

    private function getMethod()
    {
        if(substr_count($this->uri, '/')>1)
        {
            $segments = array_values(array_filter( explode('/', $this->uri)));

            $controller = $segments[0] ?? 'home';
            $subController = $segments[1] ?? null;
            $method = $segments[2] ?? 'index';
            
            return $method;
        }
        
        return 'index';
    }
}