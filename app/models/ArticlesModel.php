<?php


require_once 'app/classes/PDOSignleton.php';

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
                  categorie.id as categorieID,
                  categorie.type as categorieType
                  FROM articles 
                  INNER JOIN users on articles.id_user = users.id
                  INNER JOIN categorie on articles.id_categorie = categorie.id
                  WHERE articles.is_deleted=0
                  AND categorie.is_deleted=0
                  ORDER BY articles.creation_date DESC
                  ';

        $db = $this->pdo->prepare($query);
        $db->execute();
        $lastestArticles = $db->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }

    public function getLatesetArticles(){
        $query= 'SELECT
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
                AND categorie.is_deleted=0
                ORDER BY articles.creation_date DESC
                LIMIT 4
        ';
        $db = $this->pdo->prepare($query);
        $db->execute();
        $lastestArticles = $db->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }

    public function getLatesetArticlesExcept($id){
        $query= 'SELECT
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
                AND categorie.is_deleted=0
                AND articles.id != :id
                ORDER BY articles.creation_date DESC
                LIMIT 4
        ';
        $db = $this->pdo->prepare($query);
        
        $data = [
            ':id' => $id
        ];
        
        $db->execute($data);
        $lastestArticles = $db->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }

    public function getArticle($id){
        $query = "SELECT
                  articles.id as articleID,
                  articles.title as articleTitle,
                  articles.body as articleBody,
                  categorie.id as categorieID,
                  categorie.type as categorieType
                  FROM articles 
                  INNER JOIN categorie on articles.id_categorie = categorie.id
                  WHERE articles.id=:id 
                  AND categorie.is_deleted = :isDeleted
                  "
        ;
        $db = $this->pdo->prepare($query);
        $db->bindParam(':id', $id, PDO::PARAM_INT);
        $data = [
            ':id' => $id,
            'isDeleted' => 0
        ];
        $db->execute($data);
        $article = $db->fetchAll(PDO::FETCH_OBJ);
        return $article;
    }

    public function addArticle(STRING $title,STRING $body, STRING $idCategorie, INT $isDeleted = 0  ){ 
        try{
            $query = 'INSERT INTO Articles VALUES(NULL, :title, :body, CURRENT_TIMESTAMP ,:isDeleted,:idUser, :idCategorie)';
            $db = $this->pdo->prepare($query);
            $data=[
                ':title'=> $title,
                ':body'=> $body,
                ':isDeleted'=> $isDeleted,
                ':idUser'=> 1,
                ':idCategorie'=> $idCategorie
            ];
            $db->execute($data);

        }catch(PDOException $e){
            echo $e;
        }
    }

    public function editArticle(INT $id ,STRING $title,STRING $body, $idCategorie){ 
        try{
            $query = 'UPDATE articles
                      SET title = :title,
                      body = :body,
                      id_categorie = :idCategorie
                      WHERE articles.id = :id';
                      
            $db = $this->pdo->prepare($query);

            $data=[
                ':title'=> $title,
                ':body'=> $body,
                ':idCategorie'=> $idCategorie,
                ':id' => $id
            ];
            $db->execute($data);
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function deleteArticle(INT $id){
        try{
            $query = 'UPDATE articles
                      SET is_deleted = :isDeleted
                      WHERE articles.id = :id';
                      
            $db = $this->pdo->prepare($query);

            $data=[
                ':isDeleted'=> 1,
                ':id' => $id
            ];
            $db->execute($data);
        }catch(PDOException $e){
            echo $e;
        }
    }
    

}