<?php

namespace App\Model;
use App\Classes\PDOSignleton;
use PDO;
use PDOException;

class ArticlesModel{

    
    public function getArticles($pdo){
        try{
            $query='SELECT
                    articles.id as articleID,
                    articles.title as articleTitle,
                    articles.body as articleBody,
                    articles.imgArticle as articleImg,
                    users.id as userID,
                    users.nom as userNom,
                    users.prenom as userPrenom
                    FROM articles 
                    INNER JOIN users on articles.id_user = users.id
                    WHERE articles.is_deleted=0
                    ORDER BY articles.creation_date DESC
                ';
    
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $articles = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $articles;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getArticlesWithPagintation($pdo , $offset = 0){
        try{
            $query='SELECT
                    articles.id as articleID,
                    articles.title as articleTitle,
                    articles.body as articleBody,
                    articles.imgArticle as articleImg,
                    users.id as userID,
                    users.nom as userNom,
                    users.prenom as userPrenom
                    FROM articles 
                    INNER JOIN users on articles.id_user = users.id
                    WHERE articles.is_deleted=0
                    ORDER BY articles.creation_date DESC
                    LIMIT 4 OFFSET :offsetTest
                ';
    
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':offsetTest', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $articles = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $articles;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getLatesetArticles($pdo){
        $query= 'SELECT
                articles.id as articleID,
                articles.title as articleTitle,
                articles.body as articleBody,
                articles.imgArticle as articleImg,
                users.id as userID,
                users.nom as userNom,
                users.prenom as userPrenom
                FROM articles 
                INNER JOIN users on articles.id_user = users.id
                WHERE articles.is_deleted=0
                ORDER BY articles.creation_date DESC
                LIMIT 4
        ';

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $lastestArticles = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }

    public function getLastArticle($pdo){
        $query= 'SELECT
                articles.id as articleID,
                articles.title as articleTitle,
                articles.body as articleBody,
                articles.imgArticle as articleImg,
                users.id as userID,
                users.nom as userNom,
                users.prenom as userPrenom
                FROM articles 
                INNER JOIN users on articles.id_user = users.id
                WHERE articles.is_deleted=0
                ORDER BY articles.creation_date DESC
                LIMIT 1
        ';
        $db = $pdo->prepare($query);
        $db->execute();
        $lastestArticles = $db->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }

    public function getLatesetArticlesExcept($pdo, $id){
        $query= 'SELECT
                articles.id as articleID,
                articles.title as articleTitle,
                articles.body as articleBody,
                articles.imgArticle as articleImg,
                users.id as userID,
                users.nom as userNom,
                users.prenom as userPrenom
                FROM articles 
                INNER JOIN users on articles.id_user = users.id
                WHERE articles.is_deleted=0
                AND articles.id != :id 
                ORDER BY articles.creation_date DESC 
                LIMIT 4
        ';

        $db = $pdo->prepare($query);
        
        $data = [
            ':id' => $id
        ];
        
        $db->execute($data);
        $lastestArticles = $db->fetchAll(PDO::FETCH_OBJ);
        return $lastestArticles;
    }

    public function getArticle($pdo, $id){
        $query = "SELECT
                  articles.id as articleID,
                  articles.title as articleTitle,
                  articles.body as articleBody,
                  articles.imgArticle as articleImg
                  FROM articles 
                  WHERE articles.id=:id 
                  "
        ;
        $db = $pdo->prepare($query);
        $data = [
            ':id' => $id
        ];
        $db->execute($data);
        $article = $db->fetchAll(PDO::FETCH_OBJ);
        return $article;
    }

    public function searchArticles($pdo, STRING $search, INT $offset = 0){
        
        $query="SELECT articles.id as articleID,
                articles.title as articleTitle,
                articles.body as articleBody
                from articles 
                WHERE (articles.title LIKE :search OR articles.body LIKE :search) AND articles.is_deleted = 0
                LIMIT 4 OFFSET :offsetTest
                ";
                
        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':offsetTest', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':search', "%$search%" , PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function addArticle($pdo, STRING $title,STRING $body, INT $idUser , $imgArticle = '', INT $isDeleted = 0  ){ 
        try{
            $query = 'INSERT INTO articles VALUES(NULL, :title, :body, CURRENT_TIMESTAMP ,';
            
            if(strlen($imgArticle)){
                $query .= ' :imgArticle, ';
            }

            $query .= ':isDeleted, :idUser)';
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $stmt->bindParam(':isDeleted', $isDeleted, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':body', $body, PDO::PARAM_STR);

            if(strlen($imgArticle)){
                $stmt->bindParam(':imgArticle', $imgArticle, PDO::PARAM_STR);
            }
            
            return $stmt->execute();
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function editArticle($pdo ,INT $id ,STRING $title,STRING $body, $imgArticle = ''){ 
        try{
            $query = 'UPDATE articles
                      SET 
                      title = :title,
                      body = :body
                      ';
                      
            if(strlen($imgArticle)){
                $query .= " , imgArticle = :imgArticle ";
            }
            
            $query .=" WHERE articles.id = :id";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':body', $body, PDO::PARAM_STR);
            
            if(strlen($imgArticle)){
                $stmt->bindParam(':imgArticle', $imgArticle, PDO::PARAM_STR);
            }
            
            return $stmt->execute();
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function deleteArticle($pdo, INT $id){
        try{
            $query = 'UPDATE articles
                      SET is_deleted = :isDeleted
                      WHERE articles.id = :id';
                      
            $stmt = $pdo->prepare($query);

            $data=[
                ':isDeleted'=> 1,
                ':id' => $id
            ];
            return $stmt->execute($data);
        }catch(PDOException $e){
            echo $e;
        }
    }
    
    // ! Count Methods
    public function getCountArticles($pdo){
        try{
            $query='SELECT count(articles.id) as nbArticles FROM articles 
                INNER JOIN users on articles.id_user = users.id
                WHERE articles.is_deleted=0
            ';
            $db = $pdo->prepare($query);
            $db->execute();
            $data = $db->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function getCountSearchArticles($pdo, STRING $search){
        
        $query="SELECT count(*) as nbArticles
                from articles 
                WHERE (articles.title LIKE :search 
                    OR articles.body LIKE :search)
                AND articles.is_deleted = 0
                ";
                
        $stmt = $pdo->prepare($query);

        $stmt->bindValue(':search', "%$search%" , PDO::PARAM_STR);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}