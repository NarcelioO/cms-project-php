<?php

namespace app\models;
use core\Database;

class User 
{  
    protected static $table = 'user';
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
        $stmt = $instance->db->query("select * from user");
        return $stmt->fetchAll();
    }

    public static function find($id)
    {
        $instance = self::getInstance();
        $stmt = $instance->db->query("select * from user where id = :id", ['id' => $id]);
        return $stmt->fetch();
    }
    
    public static function create(array $data):int
    {
        $instance = self::getInstance();
        $sql = "insert into user (name, email, password) values (:name, :email, :password)";
        $stmt = $instance->db->query($sql, [
            'name'=> $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        return $instance->db::lastInsertId();
    }

    public static function update($id, array $data)
    {
        $instance = self::getInstance();
        $sql = "update user set name = :name, email = :email, password = :password where id = :id";
        $stmt = $instance->db->query($sql, [
            'id' => $id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        
        return $stmt->rowcount();
    }

    public static function delete($id)
    {
        $instance = self::getInstance();
        $sql = 'delete from user where id = :id';
        $stmt = $instance->db->query($sql, ['id'=> $id]);
        return $stmt->rowcount();
    }



    public static function where($column, $value)
    {
        $instance = self::getInstance();
        $stmt = $instance->db->query("select * from user where $column = :value", 
        [
            'value' => $value
        ]);
        return $stmt->fetch();
    }

}