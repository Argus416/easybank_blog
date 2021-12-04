<?php

use function PHPSTORM_META\type;

require_once 'app/classes/PDOSignleton.php';

class LogSystemModel{
    
    private $pdosingleton;
    private $pdo;

    public function __construct()
    {
        $this->pdosingleton = PDOSignleton::getSingleton();
        $this->pdo = $this->pdosingleton::PDO_Init();
    }

    public function getLog(){
        try{
            $query="SELECT 
                    log_system.id as logID,
                    users.id as userID,
                    CONCAT(users.nom , ' ', users.prenom) as userIden,
                    articles.id as articleID,
                    articles.title as articleTitle,
                    log_system.creation_date as actionDate,
                    log_system.actionUtilisateur as actionUtilisateur
                    from log_system
                    INNER JOIN users on log_system.id_user = users.id
                    LEFT JOIN articles on log_system.id_article = articles.id
                    ";
            $db = $this->pdo->prepare($query);
            $db->execute();
            $logs = $db->fetchAll(PDO::FETCH_ASSOC);
            return $logs;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function addToLog(INT $idUser,  $idArticle , STRING $actionUtilisateur){
        try{
            $query="INSERT INTO log_system (id, id_user, id_article, creation_date, actionUtilisateur) 
                    VALUES (NULL, :idUser, :idArticle, CURRENT_TIMESTAMP, :actionUtilisateur) 
            ";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            if($idArticle === NULL){
                $stmt->bindValue(':idArticle', NULL, PDO::PARAM_NULL);
            }else{
                $stmt->bindValue(':idArticle', $idArticle, PDO::PARAM_INT);
            }

            switch($actionUtilisateur){
                case "articleCree": 
                    $actionUtilisateur = "un nouveau article a été créé";
                    break;
                case "articleModifie": 
                    $actionUtilisateur = "l'article a été modifié";
                    break;
                case "utilisateurCree": 
                    $actionUtilisateur = "un nouveau utilisateur a été créé";
                    break;
                case "utilisateurModifiee": 
                    $actionUtilisateur = "l'utilisateur a été mis à jour";
                    break;
                default:
                    $actionUtilisateur = "action non trouvé";
            }

            $data = [
                ':idUser' => $idUser,
                ':idArticle' => $idArticle,
                ':actionUtilisateur' => $actionUtilisateur
            ];
            
            $stmt->bindParam(':actionUtilisateur', $actionUtilisateur, PDO::PARAM_STR);
            return $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
}