<?php

namespace app\core;
use core\Database;

class Model
{
    protected static $table;
    private static $instance;
    private $db;
    
    private function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }

        return self::$instance;
    }

    public static function all()
    {
         $instance = self::getInstance();
         $stmt = $instance->db->query('select * from ' . static::$table);
         return $stmt->fetchAll();
    }

    public function find($id)
    {
        $instance = self::getInstance();
        $stmt = $instance->db->query('select * from ' . static::$table . ' where id = :id',[
            'id'=>$id
        ]);
        return $stmt->fetch();
    }

    public function create()
    {
        var_dump('create');
    }

    public function update()
    {
        var_dump('update');
    }
    
    public function delete()
    {
        var_dump('delete');
    }
};