<?php 

namespace app\models;

use core\Database;

class Model{

    private static $table = null;
    private static $instance = null;
    private $db;

    private function __construct($table)
    {
        $this->db = Database::getInstance();
        self::$table = $table;
        
    }

    public static function getInstance($table):Model
    {
        if(self::$instance === null){
            self::$instance = new self($table);
        }

        return self::$instance;
    }

    public static function all():array
    {
        $instance = self::getInstance(self::$table);
        $stmt = $instance->db->query("select * from " . self::$table);
        return $stmt->fetchAll();
    }


    public static function find($id):array
    {
        $instance = self::getInstance(self::$table);
        $stmt = $instance->db->query("select * from ". self::$table . "where id = :id", ['id'=> $id]);
        return $stmt->fetch();
    }

    public static function create(array $data):int
    {
        $instance = self::getInstance(self::$table);
        $collumns = implode(',', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $stmt = $instance->db->query("insert into". self::$table . "({$collumns}) values ({$values})", $data);

        return $instance->db->lastInsertId();

    }

    public static function update(array $data, $id):int
    {
        $instance = self::getInstance(self::$table);
        $set = '';
        
        foreach($data as $key=>$value){
            $set .= "$key =: $value, ";
        }

        $set = rtrim($set, ', ');

        $stmt = $instance->db->query("update" . self::$table . "set {$set} where id = :id", ['id'=>$id]);

        $sucess = $stmt->rowCount() > 0;

        return $sucess;     
        
    }




}