<?php

namespace app\controllers;

abstract class Controller{


    public static function view($path, $data = []) {
        extract($data);

        return base_path('/views/'. ltrim($path));
    }

}