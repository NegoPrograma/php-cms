<?php

include_once("../utils/db-credentials.php");


class Model
{

    protected PDO $db;
    function __construct()
    {
        $this->initDatabase();
    }

    private function initDatabase()
    {
        global $dbHost, $dbName, $dbUsername, $dbPass;
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
