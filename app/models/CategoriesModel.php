<?php


require_once 'app/classes/PDOSignleton.php';

class CategoriesModel{
    
    private $pdosingleton;
    private $pdo;

    public function __construct()
    {
        $this->pdosingleton = PDOSignleton::getSingleton();
        $this->pdo = $this->pdosingleton::PDO_Init();
    }

    public function getCategories(){
        $query = 'SELECT * FROM categorie';
        $db = $this->pdo->prepare($query);
        $db->execute();
        $categories = $db->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    public function getCategorie($id){
        $query = "SELECT * FROM categorie 
                  WHERE articles.id=:id
                  "
        ;
        $db = $this->pdo->prepare($query);
        $db->bindParam(':id', $id, PDO::PARAM_INT);
        $db->execute();
        $article = $db->fetchAll(PDO::FETCH_OBJ);
        return $article;
    }

   
    
}