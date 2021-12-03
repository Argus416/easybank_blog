<?php

use function PHPSTORM_META\type;

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
        try{
            $query='SELECT
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
            $articles = $db->fetchAll(PDO::FETCH_OBJ);
            return $articles;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getArticlesWithPagintation($offset = 0){
        try{
            $query='SELECT
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
                    LIMIT 4 OFFSET :offsetTest
                ';
    
            $db = $this->pdo->prepare($query);
            $db->bindParam(':offsetTest', $offset, PDO::PARAM_INT);
            $db->execute();
            $articles = $db->fetchAll(PDO::FETCH_OBJ);
            return $articles;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getArticlesByCategories(Array $idsCategorie, INT $offset = 0){
        try{

            // $data = [];
            $query="SELECT
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
                    ";
            $i = 0;
            
            foreach($idsCategorie as $id){
                if($i == 0){
                    $query .= "AND articles.id_categorie = :idsCategorie$id\n";
                }else{
                    $query .= "OR articles.id_categorie = :idsCategorie$id\n";
                }
                // $data['idsCategorie'.$id] += $id;
                $i++;
            }

            $query.="ORDER BY articles.creation_date DESC
                    LIMIT 4 OFFSET :offsetTest
            ";

            $db = $this->pdo->prepare($query);

            foreach($idsCategorie as $id){
                $id = intval($id);
                $db->bindValue(":idsCategorie$id", $id, PDO::PARAM_INT);
            }
            
            $db->bindValue(':offsetTest', $offset, PDO::PARAM_INT);
            $db->execute();
            // $db->execute($data);
            $articlesByCategories = $db->fetchAll(PDO::FETCH_OBJ);
            return $articlesByCategories;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

       
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

    public function getLatesetArticle(){
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
                LIMIT 1
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
        $data = [
            ':id' => $id,
            'isDeleted' => 0
        ];
        $db->execute($data);
        $article = $db->fetchAll(PDO::FETCH_OBJ);
        return $article;
    }

    public function addArticle(STRING $title,STRING $body, STRING $idCategorie, INT $idUser ,INT $isDeleted = 0  ){ 
        try{
            $query = 'INSERT INTO articles VALUES(NULL, :title, :body, CURRENT_TIMESTAMP ,:isDeleted,:idUser, :idCategorie)';
            $db = $this->pdo->prepare($query);
            $data=[
                ':title'=> $title,
                ':body'=> $body,
                ':isDeleted'=> $isDeleted,
                ':idUser'=> $idUser,
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
   
    public function getCountArticle(){
        try{
            $query='SELECT count(articles.id) as nbArticles FROM articles 
                INNER JOIN users on articles.id_user = users.id
                INNER JOIN categorie on articles.id_categorie = categorie.id
                WHERE articles.is_deleted=0
                AND categorie.is_deleted=0
            ';
            $db = $this->pdo->prepare($query);
            $db->execute();
            $data = $db->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function getCountArticlesByCategories(Array $idsCategorie){
        try{
            $data = [];
            $query="SELECT
                    count(articles.id) as nbArticles
                    FROM articles 
                    INNER JOIN users on articles.id_user = users.id
                    INNER JOIN categorie on articles.id_categorie = categorie.id
                    WHERE articles.is_deleted=0
                    AND categorie.is_deleted=0
                    ";
                    
            $i = 0;
            foreach($idsCategorie as $id){
                if($i == 0){
                    $query .= "AND articles.id_categorie = :idsCategorie$id\n";
                }else{
                    $query .= "OR articles.id_categorie = :idsCategorie$id\n";
                }
                
                $data['idsCategorie'.$id] += $id;
                $i++;
            }

            $db = $this->pdo->prepare($query);
            
            $db->execute($data);
            $countArticlesByCategories = $db->fetchAll(PDO::FETCH_OBJ);
            return $countArticlesByCategories;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

       
    }


}