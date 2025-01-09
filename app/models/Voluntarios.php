<?php
namespace app\models;

use core\Database;

class Voluntarios{
    public static function all()
    {

        $db = new Database;
        $stmt = $db->query("SELECT * from voluntarios")->fetchAll();

        return $stmt;
    
    }

}