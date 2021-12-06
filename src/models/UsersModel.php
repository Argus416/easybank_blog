<?php

namespace App\Model;
use App\Classes\PDOSignleton;
use PDO;
use PDOException;

class UsersModel{
    
    private $pdosingleton;
    private $pdo;

    public function __construct()
    {
        $this->pdosingleton = PDOSignleton::getSingleton();
        $this->pdo = $this->pdosingleton::PDO_Init();

    }

    public function getUsers($pdo){
        try{
            $query='SELECT 
                    users.id as authorID,
                    users.nom as authorNom,
                    users.prenom as authorPrenom,
                    users.email as authorEmail,
                    users.mdp as authorMDP,
                    users.img_profile as authorImg,
                    COUNT(articles.id_user) as nbArticle
                    FROM users 
                    LEFT JOIN articles ON users.id = articles.id_user
                    GROUP  BY users.id';
            $db = $pdo->prepare($query);
            $db->execute();
            $users = $db->fetchAll(PDO::FETCH_OBJ);
            return $users;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function getUser($pdo, $id){
        $query = 'SELECT * FROM users WHERE id=:id';
        $db = $pdo->prepare($query);
        $data=[
            ':id' => $id
        ];
        $db->execute($data);
        $user = $db->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }
    
    public function create(
        $pdo, STRING $nom, STRING $prenom, STRING $email,
        STRING $mdp
    ){
        $query='INSERT INTO users VALUES (NULL ,:nom, :prenom, :email, :mdp, NULL, NULL)';
        $stmt = $pdo->prepare($query);

        $date= [
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email'=> $email,
            ':mdp' => $mdp
        ];
        return $stmt->execute($date);
    }


    public function update(
        $pdo, INT $id, STRING $nom, STRING $prenom, STRING $email,
        $mdp, STRING $dateDeNaissance, STRING $imgName 
    ){
        try{
           
            $query='UPDATE users 
                    SET nom = :nom, 
                    prenom = :prenom, 
                    email = :email, 
                    date_de_naissance = :dateDeNaissance
            ';
    
            if(strlen($imgName)){
                $query .=", img_profile = :imgName \n";
                // $data[':imgURL'] = $imgName;
            }

            if(strlen($mdp)){
                $query .= ",mdp = :mdp ";
            }

            $query .="WHERE users.id = :id";
            
            $stmt = $pdo->prepare($query);
            
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':dateDeNaissance', $dateDeNaissance, PDO::PARAM_STR);

            if($mdp != Null){
                $stmt->bindParam(':mdp', $mdp, PDO::PARAM_STR);
            }
            
            if(strlen($imgName)){
                $stmt->bindValue(':imgName', $imgName, PDO::PARAM_STR);
            }
            return $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function delete($pdo ,$id){
        $query='UPDATE users 
                SET is_deleted = :isDeleted 
                WHERE users.id = :id
        ';
        $db = $pdo->prepare($query);
        
        $data = [
            ':id' => $id,
            ':isDeleted' => 1
        ];
        $db->execute($data);
    }

    // ! Count Methods

     public function getCountUsers($pdo){
        try{
            $query='SELECT count(*) as nbUsers  FROM users ';
            $db = $pdo->prepare($query);
            $db->execute();
            $users = $db->fetchAll(PDO::FETCH_OBJ);
            return $users;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    
    }

}