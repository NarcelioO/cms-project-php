<?php
namespace core;
use app\classes\Uri;
use core\Model;

class Controller {

    private $uri;
    private $model;
    public function __construct() {
        $this->uri = Uri::uri();
    }

    public static function view($view, $data = []) {
        extract($data);
        require "../app/views/{$view}.php";
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
        echo 'Home Page';
    }

    private function controllerNotHome() {
        echo 'Not Home Page';
    }
}


