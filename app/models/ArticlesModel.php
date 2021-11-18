<?php


require_once 'app\classes\PDOSignleton.php';

class ArticlesModel{
    
    private $pdosingleton;
    private $pdo;

    public function __construct()
    {
        $this->pdosingleton = PDOSignleton::getSingleton();
        $this->pdo = $this->pdosingleton::PDO_Init();
    }

    public function getArticles(){
        $query = 'SELECT
                  articles.id as articlesID,
                  articles.title as articleTitle,
                  articles.body as articleBody
                  FROM articles 
                  WHERE is_deleted=0';
        $db = $this->pdo->prepare($query);
        $db->execute();
        $lastestArticles = $db->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }

    public function getLatesetArticles(){
        $query = 'SELECT
                  articles.id as articlesID,
                  articles.title as articleTitle,
                  articles.body as articleBody,
                  users.id as userID,
                  users.nom as userNom,
                  users.prenom as userPrenom
                  FROM articles 
                  INNER JOIN users on articles.id_user = users.id
                  WHERE users.is_deleted=0 
                  LIMIT 4'
        ;
        $db = $this->pdo->prepare($query);
        $db->execute();
        $lastestArticles = $db->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }

    public function getArticle($id){
        $query = "SELECT * FROM articles 
                  INNER JOIN users on articles.id_user = users.id
                  WHERE articles.id=:id
                  LIMIT 4"
        ;
        $db = $this->pdo->prepare($query);
        $db->bindParam(':id', $id, PDO::PARAM_INT);
        $db->execute();
        $article = $db->fetchAll(PDO::FETCH_OBJ);
        return $article;
    }

    public function addArticle($title, $body, $idCategorie){ 
        $query = 'INSERT INTO Articles VALUES(NULL, :title, :body, :isDeleted,:idUser, :idCategorie)';
        $db = $this->pdo->prepare($query);
        $db->bindParam(':title', $title);
        $db->bindParam(':body', $body);
        $db->bindParam(':isDeleted', 0);
        $db->bindParam(':idUser', 1);
        $db->bindParam(':idCategorie', $idCategorie);
        $db->execute();

    }
    
}