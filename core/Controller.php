<?php


namespace core;
use app\classes\Uri;
use app\controllers\admin\AuthController;
use core\Model;
use app\exceptions\ControllerNotExistException;
use app\middleware\AuthMiddleware;

class Controller {

    private $uri;
    private $controller;
    private $namespace;
    private $folders = [
        'app\controllers\portal',
        'app\controllers\admin'
    ];

    public function __construct() {
        $this->uri = Uri::uri();

        if($this->isAdminRoute()){
            AuthMiddleware::checkAuth();
        }
    }

    public function load() {
        if ($this->isHome()) {
            return $this->controllerHome();
        }
        return $this->controllerNotHome();
    }

    private function isHome() {
        return $this->uri === '/';
    }

    private function controllerHome() {
      if(!$this->controllerExist('HomeController')){
            throw new ControllerNotExistException("Esse controller não existe");
      }
      return $this->instantiateController();
    }

    private function controllerNotHome() {
        $controller = $this->getControllerNotHome();
        //dd($controller)
        if(!$this->controllerExist($controller)){
            throw new ControllerNotExistException("Esse controller não existe");
        }else{
            return $this->instantiateController();
        } 
       
    }
    public function getControllerNotHome(){

        if(substr_count($this->uri,  '/') > 1){
            //dd(array_values(array_filter( explode('/', $this->uri))));
            $segments = array_values(array_filter( explode('/', $this->uri)));

            $controller = $segments[0] ?? 'home';
            $subController = $segments[1] ?? null;
            $method = $segments[2] ?? 'index';
            
            $controller = ucfirst($controller);
            if($subController){
                $controller = ucfirst($subController);
            }
            // dd($subController);
            return $controller.'Controller';
        } 
        return  ucfirst(ltrim($this->uri, '/')).'Controller';
    }

    private function controllerExist($controller){
        $controllerExist = false;

        

        foreach($this->folders as $folder){
            if(class_exists($folder.'\\'.$controller)){
                $controllerExist = true;
                $this->namespace = $folder;
                $this->controller = $controller;
            }
        }

        return $controllerExist;
        
    }
    private function instantiateController(){
        $controller = $this->namespace . '\\' .$this->controller;
        return new $controller;
    }

    public static function view($path, $data = []) {
        extract($data);
        return base_path('/views/'. ltrim($path));
    }

    protected function render($path, $data = []) {
        extract($data);
        return require base_path('/views/'. ltrim($path));
    }

    private function isAdminRoute()
    {
        $segments = array_values(array_filter(explode('/', $this->uri)));

        return isset($segments[0]) && $segments[0] === 'admin' && !$this->isAuthRoute();
    }

    private function isAuthRoute()
    {
        $segments = array_values(array_filter(explode('/', $this->uri)));
        return isset($segments[1]) &&
            $segments[0] === 'admin' &&
            $segments[1] === 'auth';
    }
    private static function verifyAuthentication()
    {
        session_start();

        if(!isset($_SESSION['user_id']))
        {
            header('Location: /admin/auth/login');
            exit();
        }

    }
}


