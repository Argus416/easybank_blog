<?php

use function PHPSTORM_META\type;

require_once 'app/classes/PDOSignleton.php';

class LogSystem{
    
    private $pdosingleton;
    private $pdo;

    public function __construct()
    {
        $this->pdosingleton = PDOSignleton::getSingleton();
        $this->pdo = $this->pdosingleton::PDO_Init();
    }

    public function getloc(){
        try{
            $query = "SELECT * from log_system";
            $db = $pdo->prepare($query);
            $db->execute();
            $logs = $db->fetchAll(PDO::FETCH_OBJ);
    
            return $logs;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function addToLog(){
        // $query = 
    }
    
}