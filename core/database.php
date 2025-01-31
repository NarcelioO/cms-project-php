<?php
namespace core;

use PDO;
use PDOException;


class Database{
    private $config;
    private $connection;

    private static $instance = null;

    private function __construct()
    {
        try
        {
            $this->config = require '../config/config.php';
            $config = $this->config ['database'];
            $dsn = "mysql:" . http_build_query($config, '', ';');
            $this->connection = new PDO($dsn, $config['username'], $config['pass'],[
                PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC
            ]);
        }catch(PDOException $e){
            echo "Connection error" .$e->getMessage();
        }
       

    }
    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    public function query($query, $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public static function lastInsertId()
    {
        return self::getInstance()->connection->lastInsertId();
    }
            
}
