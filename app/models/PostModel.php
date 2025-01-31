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



    public static function all()
    {
        $instance = self::getInstance();
        $stmt = $instance->db->query("SELECT * from post");

        return $stmt->fetchAll();
    
    }

    public static function find($id)
    {

        $instance = self::getInstance();
        $stmt = $instance->db->query("select * from post where id = :id", 
        ['id' => $id]);

        return $stmt->fetch();  

    }

    public static function create(array $data):int
    {

        $instance = self::getInstance();
        $sql = "INSERT INTO post (title, image_path, status, content, slug) values (:title, :image_path, :status, :content, :slug)";
        $stmt = $instance->db->query($sql,[
            'title' => $data['title'],
            'slug'=>$data['slug'],
            'image_path' => $data['image_path'],
            'status' => $data['status'],
            //'user_id' => $data['user_id'],
            'content' => $data['content'],
            
        ] );
       
        return (int)$instance->db::lastInsertId();
        
    }

    public static function attachedCategoria($postId, $categoriaId)
    {
        $instance = self::getInstance();
        $sql = 'insert into post_categoria (post_id, categoria_id) values (:post_id, :categoria_id)';
        $stmt = $instance->db->query($sql, [
            'post_id' => $postId,
            'categoria_id' => $categoriaId
        ]);

        return $stmt->rowCount() > 0;

    }

    public static function update(int $id, array $data)
    {
        $instance = self::getInstance();
        $sql = "update posts set title = :title, category = :category, image_path = :image_path, status = :status, author = :author, content = :content, slug = :slug where id = :id";
        $stmt = $instance->db->query($sql,[
            'title' => $data['title'],
            'category' => $data['category'],
            'image_path' => $data['image_path'] ?? null, 
            'status' => $data['status'],
            'author'=>$data['author'],
            'content'=>$data['content'],
            'slug'=>$data['slug'],
            'id'=>$id
        ]);
        $sucess = $stmt->rowCount() > 0;

        return $sucess;

    
    }

    public static function delete($id)
    {
        $instance = self::getInstance();
        $sql = "delete from post where id = :id";
        $stmt = $instance->db->query($sql, [
            'id' => $id
        ]);
        
        $sucess = $stmt->rowCount() > 0;

        return $sucess;
    
    }

}