<?php

namespace App\Classes;
use PDO;
use PDOException;

class PDOSignleton{

    private $id;
    private static $_singleton;
    
    private function __construct()
    {
        $this->id = uniqid();
    }

    public static function getSingleton(): PDOSignleton
    {
        if (is_null(self::$_singleton)) {
            self::$_singleton = new PDOSignleton();
        }
        return self::$_singleton;
    }


    public static function PDO_Init()
    {
        $dbh = "";
        
        try{

            $host = $_ENV['DB_HOST'];
            $db_name = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PWD'];
            $type = $_ENV['DB_TYPE'];

            $options = array (
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
            );
            
            $dbh = new PDO("$type:host=$host;dbname=$db_name", $user, $pass, $options);
            $dbh->exec("SET CHARACTER SET utf8");

        }catch (PDOException $e) {
            $dbh =  "Error!: " . $e->getMessage() . "<br/>";
            print $dbh;
            die();
        }
        
        return $dbh;
    }

  
    

    
}