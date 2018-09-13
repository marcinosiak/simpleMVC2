<?php

class Database
{
    public static $host = 'localhost';
    public static $dbName = 'yih98459_sarakatulska';
    public static $userName = 'yih98459_sara';
    public static $pass = 'JSQ-V3u*HFoV5';

    private static function connect()
    {
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$userName, self::$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array())
    {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);

        $queryExplode = explode(' ', $query);

        if ($queryExplode[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        }
    }
}
