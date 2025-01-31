<?php

namespace app\models;

use core\Database;

class CategoriaModel{

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
        $stmt = $instance->db->query('select * from categorias');
    }

    public static function find($id)
    {
        $instance = self::getInstance();
        $stmt = $instance->db->query('select * from categorias where id = :id', ['id'=>$id]);
        return $stmt->fetch();
    }


    public static function create(array $data):int
    {
        $instance = self::getInstance();
        $sql = 'insert into categorias (nome) values (:nome)';
        $stmt = $instance->db->query($sql, ['nome' => $data['nome']]);
        return $instance->db->lastInsertId();
        
    }

    public static function update(array $data, $id):int
    {
        $instance = self::getInstance();
        $sql = 'update categorias set nome = :nome where id = :id';
        $stmt = $instance->db->query($sql, ['nome' => $data['nome'], 'id' => $id]);
        return $stmt->rowCount();

    }

    public static function delete($id):int
    {
        $instance = self::getInstance();
        $sql = 'select * from categorias where id = :id';
        $stmt = $instance->db->query($sql, ['id' => $id]);
        return $stmt->rowCount();
    }
    
}
