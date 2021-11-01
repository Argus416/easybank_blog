<?php

class PDOSignleton{

    private $host = $_ENV['DB_HOST'];
    private $dbname = $_ENV['DB_NAME'];
    private $user = $_ENV['DB_USER'];
    private $mdp = $_ENV['DB_PWD'];
    private static $singleton;

    public static function getSingleton(): PDOSignleton
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new PDOSignleton();
        }
        return self::$singleton;
    }
    

    
}