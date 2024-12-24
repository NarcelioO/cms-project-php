<?php

namespace app\core;
use core\Database;

class Model
{
    protected static $table;

    public static function all()
    {
         $db = new Database();
         $stmt = $db->query('select * from ' . static::$table);
         return $stmt->fetchAll();
    }

    public function find($id)
    {
        $db = new Database();
        $stmt = $db->query('select * from ' . static::$table . ' where id = :id');
        $stmt->bindParam(':id', $id);
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