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
        $categories= [];
        try{
            $query='SELECT * FROM categorie
                    WHERE
                    categorie.is_deleted = 0';
                    
            $db = $this->pdo->prepare($query);
            $db->execute();
            $categories = $db->fetchAll(PDO::FETCH_OBJ);
            return $categories;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
       
    }

    public function getCategorie($id){
        try{
            $query="SELECT * FROM categorie 
                    WHERE
                    categorie.id=:id AND
                    categorie.is_deleted = 0
                    "
            ;
            $db = $this->pdo->prepare($query);
            $db->bindParam(':id', $id, PDO::PARAM_INT);
            $db->execute();
            $categorie = $db->fetchAll(PDO::FETCH_OBJ);
            return $categorie;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function add(STRING $type){
        try{
            
            $query = "INSERT INTO categorie (id, type, is_deleted ) VALUES (NULL, :type, :isDeleted)";
            $db = $this->pdo->prepare($query);

            $data = [
                ':type' => $type,
                'isDeleted' => 0
            ];

            $db->execute($data);
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function edit(INT $id , STRING $type){
        try{
            
            $query = "UPDATE categorie
                      SET type = :type
                      WHERE categorie.id = :id
                      ";
            $db = $this->pdo->prepare($query);

            $data = [
                ':id' => $id,
                ':type' => $type
            ];

            $db->execute($data);
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function deleteCategorie(INT $id){
        try{
            $query = 'UPDATE categorie
                      SET is_deleted = :isDeleted
                      WHERE categorie.id = :id';
                      
            $db = $this->pdo->prepare($query);

            $data=[
                ':id' => $id,
                ':isDeleted'=> 1
            ];
            
            $db->execute($data);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
}