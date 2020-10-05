<?php

namespace Utils;

class DBConfig
{
    public static function getDSN()
    {
        $dsn = array();
        $dsn['dbHost'] = "localhost";
        $dsn['dbName'] = "cms-blog";
        $dsn['dbUsername'] = "root";
        $dsn['dbPass'] = "";
        return $dsn;
    }
}
