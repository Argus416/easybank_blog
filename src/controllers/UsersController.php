<?php

namespace App\Controllers;

use App\Model\UsersModel;
use App\Model\LogSystemModel;
use App\Controllers\LogSystemController;
use App\Helper\Helpers;
use Exception;

class UsersController{

    private $UsersModel;
    private $LogSystemModel;
    private $LogSystemController;

    public function __construct(){
        $this->UsersModel = new UsersModel;
        $this->LogSystemModel = new LogSystemModel;
        $this->LogSystemController = new LogSystemController;
    }

   
    public function show($param){
        $ConnexionController = $param['ConnexionSignleton'];
        $ConnexionController::isLoggedin();
        
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];  

        $prenom = $nom = $email = $password = $dateDeNaissance = '';
        $id = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
        $user = $this->UsersModel->getUser($pdoSignleton ,$id)[0];
        if(isset($_POST['download-logs'])){
            $this->LogSystemController->generateLogFile($pdoSignleton);
            $_SESSION['alert'] = 'download-logs';
        }
        require_once 'views/my_profile.php';
    }


    public function edit($param){
        $ConnexionController = $param['ConnexionSignleton'];
        $ConnexionController::isLoggedin();
        
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];  
        
        $prenom = $nom = $email = $password = $imgProfile = $dateDeNaissance = '';
        $id = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);

        $user = $this->UsersModel->getUser($pdoSignleton, $id)[0];
        $domain = $_ENV['DOMAIN'];
        $public = $_ENV['PUBLIC'];
        
        if(isset($_POST['update-account'])){
            

            $prenom = Helpers::sanitizeInput($_POST['prenom']);
            $nom = Helpers::sanitizeInput($_POST['nom']);
            $email = Helpers::sanitizeInput($_POST['email']);
            $dateDeNaissance = Helpers::sanitizeInput($_POST['date-de-naissance']);
            $dateDeNaissance = date("Y-m-d", strtotime($dateDeNaissance));
            
            $imgNewName = Helpers::uploadPhoto('photo_profile', 'public/upload/images');
            
            if(!empty($_POST['password'])){
                $password = Helpers::sanitizeInput($_POST['password']);
                $password = password_hash($password, PASSWORD_ARGON2I);
            }

            if($imgNewName){
                $_SESSION['authorImg'] = $imgNewName;
            }
            

            $_SESSION['authorPrenom'] = $prenom;
            $this->LogSystemModel->addToLog($pdoSignleton, $id, NULL, 'utilisateurModifiee');

            // Gestion de changement de mot de passe
            $updateUser = $this->UsersModel->update($pdoSignleton, $id ,$nom, $prenom, $email, '', $dateDeNaissance, $imgNewName);
            if(!empty($_POST['password'])){
                $updateUser = $this->UsersModel->update($pdoSignleton, $id ,$nom, $prenom, $email, $password, $dateDeNaissance, $imgNewName);
                // logout
                // TODO Uncomment here
                // session_destroy();
                
                // affichage alert vous êtes déconnectés
                session_start();
                $_SESSION['alert'] = 'ok';
            }
            
            // Gestion d'alert, si la bdd est mise à jour, alert success, sinon alert danger
            if($updateUser){
                $_SESSION['alert'] = 'ok';
            }else{
                $_SESSION['alert'] = 'err';
            }

            header('Location:'.$urlGenerator->generate('authorShow', ['id' =>$_SESSION['idAdmin']] ));
        }
        require_once 'views/profile-edit.php';
    }

   
}