<?php

namespace core;

use app\classes\Uri;

class Params{

    private $uri;

    public function __construct()
    {
        $this->uri = Uri::uri();
    }
    public function load()
    {
        return $this->getParams();
    }

    private function getParams()
    {
        if(substr_count($this->uri, '/')>3){
            
            $params = array_values(array_filter(explode('/', $this->uri)));
            return (object)[ 
                'params' => htmlspecialchars($params[3], ENT_QUOTES, 'UTF-8'),
                'next' => htmlspecialchars($this->getNextParam(2), ENT_QUOTES, 'UTF-8'),
            ];
        }  
    }

    private function getNextParam($current)
    {
        $params = array_values(array_filter(explode('/', $this->uri)));
        
        return $params[$current + 1] ?? $params[$current];

    }

}

