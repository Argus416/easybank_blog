<?php

require_once 'app/classes/PDOSignleton.php';

class UsersModel{
    
    private $pdosingleton;
    private $pdo;

    public function __construct()
    {
        $this->pdosingleton = PDOSignleton::getSingleton();
        $this->pdo = $this->pdosingleton::PDO_Init();
    }

    public function getUsers(){
        try{
            $query='SELECT 
                    users.id as authorID,
                    users.nom as authorNom,
                    users.prenom as authorPrenom,
                    users.email as authorEmail,
                    users.mdp as authorMDP,
                    COUNT(articles.id_user) as nbArticle
                    FROM users 
                    LEFT JOIN articles ON users.id = articles.id_user
                    GROUP  BY users.id';
            $db = $this->pdo->prepare($query);
            $db->execute();
            $users = $db->fetchAll(PDO::FETCH_OBJ);
            return $users;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    public function getUser($id){
        $query = 'SELECT * FROM users WHERE id=:id';
        $db = $this->pdo->prepare($query);
        $data=[
            ':id' => $id
        ];
        $db->execute($data);
        $user = $db->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }
    
    // public function create(
    //     STRING $nom, STRING $prenom, STRING $email,
    //     STRING $mdp
    // ){
    //     $query='INSERT INTO users VALUES (NULL ,:nom, :prenom, :email, :mdp, NULL, NULL, 0)';
    //     $db = $this->pdo->prepare($query);

    //     $date= [
    //         ':nom' => $nom,
    //         ':prenom' => $prenom,
    //         ':email'=> $email,
    //         ':mdp' => $mdp
    //     ];
    //     $db->execute($date);
    // }


    public function update(
        INT $id, STRING $nom, STRING $prenom, STRING $email,
        STRING $mdp, STRING $dateDeNaissance
    ){
        $query='UPDATE users 
                SET nom = :nom, 
                prenom = :prenom, 
                email = :email, 
                mdp = :mdp,
                date_de_naissance = :dateDeNaissance
                WHERE users.id = :id
        ';

        $db = $this->pdo->prepare($query);

        $date= [
            ':id' => $id,
            ':nom'=> $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':mdp' => $mdp,
            ':dateDeNaissance' => $dateDeNaissance
        ];
        $db->execute($date);
    }

    
    public function delete($id){
        $query='UPDATE users 
                SET is_deleted = :isDeleted 
                WHERE users.id = :id
        ';
        $db = $this->pdo->prepare($query);
        
        $data = [
            ':id' => $id,
            ':isDeleted' => 1
        ];
        
        $db->execute($data);
    }

}