<?php

namespace core;

use PDO;
use PDOException;


class Database{
    private $config;
    private $connection;

    //a conexão é feita na intanciação e não em toda query
    public function __construct()
    {
        try
        {
            $this->config = require '../config/config.php';
            $config = $this->config['database'];
            $dsn = "mysql:" . http_build_query($config, '', ';');
            $this->connection = new PDO($dsn, $config['username'], $config['pass'],[
                PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC
            ]);
        }catch(PDOException $e){
            echo "Connection error" .$e->getMessage();
        }
       

    }

    public function query($query)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }
            
}
