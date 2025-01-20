<?php

namespace app\models;
use app\core\Model;
use core\Database;

class PostModel
{  
    private static $instance = null;

    private $db;

    private function __construct()
    {   
        $this->db = Database::getInstance();
    }

    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }

        return self::$instance;
    }



    public static function findAll()
    {
        $instance = self::getInstance();

        $stmt = $instance->db->query("SELECT * from posts",[])->fetchAll();
 

        return $stmt;
    
    }

    public static function find($id)
    {

    
    }

    public static function create($data)
    {

      
        // $instance = self::getInstance();
        // $sql = "INSERT INTO posts (title, category, image, status, author, content) values (:title, :category, :image, :status, :author, :content)";
        // $stmt = $instance->db->query($sql,[
        //     'title' => $data['title'],
        //     'category' => $data['category'],
        //     'image' => $data['image'],
        //     'status' => $data['status'],
        //     'author' => $data['author'],
        //     'content' => $data['content']
        // ] );
        
        // return $stmt;
    }

    public static function update($id, $data)
    {

        
    
    }
    public static function delete($id)
    {

    
    
    }



    

}