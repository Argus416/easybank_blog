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
                  articles.id as articleID,
                  articles.title as articleTitle,
                  articles.body as articleBody,
                  users.id as userID,
                  users.nom as userNom,
                  users.prenom as userPrenom,
                  categorie.type as categorieType
                  FROM articles 
                  INNER JOIN users on articles.id_user = users.id
                  INNER JOIN categorie on articles.id_categorie = categorie.id
                  WHERE articles.is_deleted=0
                  ';

        $db = $this->pdo->prepare($query);
        $db->execute();
        $lastestArticles = $db->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }

    public function getLatesetArticles(){
        $query = 'SELECT
                  articles.id as articleID,
                  articles.title as articleTitle,
                  articles.body as articleBody,
                  users.id as userID,
                  users.nom as userNom,
                  users.prenom as userPrenom
                  FROM articles 
                  INNER JOIN users on articles.id_user = users.id
                  WHERE users.is_deleted=0 
                  ORDER BY articles.creation_date ASC
                  LIMIT 4
                  '
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

    public function addArticle(STRING $title,STRING $body, STRING $idCategorie, INT $isDeleted = 0  ){ 
        try{
            $query = 'INSERT INTO Articles VALUES(NULL, :title, :body, :isDeleted,:idUser, :idCategorie)';
            $db = $this->pdo->prepare($query);
            $data=[
                ':title'=> $title,
                ':body'=> $body,
                ':isDeleted'=> $isDeleted,
                ':idUser'=> true,
                ':idCategorie'=> $idCategorie
            ];
            $db->execute($data);
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function editArticle(STRING $title,STRING $body, STRING $idCategorie){ 
        try{
            $query = 'UPDATE articles
                      SET title = :title,
                      SET body = :body,
                      SET id_categorie = :idCategorie,
                      WHERE articles.id = :id';
            $db = $this->pdo->prepare($query);

            $data=[
                ':title'=> $title,
                ':body'=> $body,
                ':idUser'=> true,
                ':idCategorie'=> $idCategorie
            ];
            $db->execute($data);
        }catch(PDOException $e){
            echo $e;
        }
    }
    

}