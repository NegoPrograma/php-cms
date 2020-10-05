<?php
/**
* Para utilizar o banco neste App, renomeie primeiramente
* este arquivo para "DBConfig.php".
*
* Abaixo, basta utilizar as configurações referentes ao seu banco de dados criado em MySQL.
*/

namespace Utils;

class DBConfigExample
{
    public static function getDSN()
    {
        $dsn = array();
        $dsn['dbHost'] = "";
        $dsn['dbName'] = "";
        $dsn['dbUsername'] = "";
        $dsn['dbPass'] = "";
        return $dsn;
    }
}

?>