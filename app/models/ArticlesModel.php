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
        try{
            $query='SELECT
                    articles.id as articleID,
                    articles.title as articleTitle,
                    articles.body as articleBody,
                    users.id as userID,
                    users.nom as userNom,
                    users.prenom as userPrenom
                    FROM articles 
                    INNER JOIN users on articles.id_user = users.id
                    WHERE articles.is_deleted=0
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
                    users.prenom as userPrenom
                    FROM articles 
                    INNER JOIN users on articles.id_user = users.id
                    WHERE articles.is_deleted=0
                    ORDER BY articles.creation_date DESC
                    LIMIT 4 OFFSET :offsetTest
                ';
    
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':offsetTest', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $articles = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $articles;
            
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
                users.prenom as userPrenom
                FROM articles 
                INNER JOIN users on articles.id_user = users.id
                WHERE articles.is_deleted=0
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
                users.prenom as userPrenom
                FROM articles 
                INNER JOIN users on articles.id_user = users.id
                WHERE articles.is_deleted=0
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
                users.prenom as userPrenom
                FROM articles 
                INNER JOIN users on articles.id_user = users.id
                WHERE articles.is_deleted=0
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
                  articles.body as articleBody
                  FROM articles 
                  WHERE articles.id=:id 
                  "
        ;
        $db = $this->pdo->prepare($query);
        $data = [
            ':id' => $id
        ];
        $db->execute($data);
        $article = $db->fetchAll(PDO::FETCH_OBJ);
        return $article;
    }

    public function searchArticles(STRING $search, INT $offset = 0){
        
        $query="SELECT articles.id as articleID,
                articles.title as articleTitle,
                articles.body as articleBody
                from articles 
                WHERE (articles.title LIKE :search OR articles.body LIKE :search) AND articles.is_deleted = 0
                LIMIT 4 OFFSET :offsetTest
                ";
                
        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':offsetTest', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':search', "%$search%" , PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function addArticle(STRING $title,STRING $body, INT $idUser ,INT $isDeleted = 0  ){ 
        try{
            $query = 'INSERT INTO articles VALUES(NULL, :title, :body, CURRENT_TIMESTAMP , :isDeleted, :idUser)';
            $stmt = $this->pdo->prepare($query);
            $data=[
                ':title'=> $title,
                ':body'=> $body,
                ':isDeleted'=> $isDeleted,
                ':idUser'=> $idUser
            ];

            return $stmt->execute($data);
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function editArticle(INT $id ,STRING $title,STRING $body){ 
        try{
            $query = 'UPDATE articles
                      SET title = :title,
                      body = :body
                      WHERE articles.id = :id';
                      
            $stmt = $this->pdo->prepare($query);

            $data=[
                ':title'=> $title,
                ':body'=> $body,
                ':id' => $id
            ];
            return $stmt->execute($data);
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function deleteArticle(INT $id){
        try{
            $query = 'UPDATE articles
                      SET is_deleted = :isDeleted
                      WHERE articles.id = :id';
                      
            $stmt = $this->pdo->prepare($query);

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
    public function getCountArticles(){
        try{
            $query='SELECT count(articles.id) as nbArticles FROM articles 
                INNER JOIN users on articles.id_user = users.id
                WHERE articles.is_deleted=0
            ';
            $db = $this->pdo->prepare($query);
            $db->execute();
            $data = $db->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function getCountSearchArticles(STRING $search){
        
        $query="SELECT count(*) as nbArticles
                from articles 
                WHERE (articles.title LIKE :search 
                    OR articles.body LIKE :search)
                AND articles.is_deleted = 0
                ";
                
        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':search', "%$search%" , PDO::PARAM_STR);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}