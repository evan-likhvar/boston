<?php

class Connection
{
    public static function getPdo(): PDO
    {
        $host = "127.0.0.1";
        $user = "boston";
        $pass = "boston";
        $db_name = "boston";
        return new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    }

}