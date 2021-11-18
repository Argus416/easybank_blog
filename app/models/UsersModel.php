<?php

require_once 'app\classes\PDOSignleton.php';

class UsersModel{
    
    private $pdosingleton;
    private $pdo;

    public function __construct()
    {
        $this->pdosingleton = PDOSignleton::getSingleton();
        $this->pdo = $this->pdosingleton::PDO_Init();
    }

    public function getUsers(){
        $query = 'SELECT * FROM users WHERE is_deleted=0';
        $db = $this->pdo->prepare($query);
        $db->execute();
        $lastestArticles = $db->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }
}