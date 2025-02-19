<?php
namespace app\models;

use core\Database;

class Voluntarios
{
    private static $instance = null;

    private $db;

    private function __construct()
    {
        $this->db = Database::getInstance();
    }

    static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self;
        }

        return self::$instance;
    } 

    public static function all()
    {
        $instance = self::getInstance();
        $stmt = $instance->db->query("select * from voluntario")->fetchAll();

        return $stmt;
    
    }

}