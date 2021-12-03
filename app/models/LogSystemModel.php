<?php

use function PHPSTORM_META\type;

require_once 'app/classes/PDOSignleton.php';

class LogSystemModel{
    
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
            $db = $this->pdo->prepare($query);
            $db->execute();
            $logs = $db->fetchAll(PDO::FETCH_OBJ);
    
            return $logs;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function addToLog(INT $idUser, INT $idArticle, STRING $actionUtilisteur){
        try{
            $query="INSERT INTO `log_system` 
            (id, id_user, id_article, creation_date, action) 
            VALUES (NULL, :idUser, :idArticle, CURRENT_TIMESTAMP, :actionUtilisteur) 
            ";

            $stmt = $this->$pdo->prepare($query);
            $data = [
                ':idUser' => $idUser,
                ':idArticle' => $idArticle,
                ':actionUtilisteur' => $actionUtilisteur
            ];

            $stmt = $stmt->execute($data);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
}