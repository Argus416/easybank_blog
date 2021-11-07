<?php

require_once 'app\classes\PDOSignleton.php';

class Users{
    private $pdosingleton;
    private $db;
    public function __construct()
    {
        $this->pdosingleton = PDOSignleton::getSingleton();
        $this->db = $this->pdosingleton::PDO_Init();
    }

    public function getUsers(){
        $row = [];
        foreach($this->db->query('SELECT * from users') as $row) {
            print_r($row);
        }

        return $row;
    }

}