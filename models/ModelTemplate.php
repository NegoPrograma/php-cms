<?php

namespace Model;

use Utils\DBConfig;
use \PDO;
use \PDOException;

class ModelTemplate
{

    protected PDO $db;
    function __construct()
    {
        $this->initDatabase();
    }

    private function initDatabase()
    {
        $dsn = DBConfig::getDSN();
        $dbHost = $dsn['dbHost'];
        $dbName = $dsn['dbName'];
        $dbUsername = $dsn['dbUsername'];
        $dbPass = $dsn['dbPass'];
        try {
            //configurando o DSN para conexão ao banco.
            $this->db = new PDO(
                "mysql:host=$dbHost; dbname=$dbName",
                $dbUsername,
                $dbPass
            );
        } catch (PDOException $err) {
            echo $err;
        }
    }
}
