<?php

namespace app\models;
use app\core\Model;
use core\Database;

class Post 
{  
    private static $instance = null;

    private $db;

    private function __construct()
    {   
        $this->db = Database::getInstance();
    }

    static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function all()
    {
        $instance = self::getInstance();
        $stmt = $instance->db->query("SELECT * from posts")->fetchAll();

        return $stmt;
    
    }

    public static function find($id)
    {

    
    }

    public static function create($data)
    {

       
    
    }

    public static function update($id, $data)
    {

        
    
    }
    public static function delete($id)
    {

    
    
    }



    

}