<?php

namespace App\Controllers;

use App\Model\UsersModel;
use App\Model\LogSystemModel;
use App\Controllers\LogSystemController;
use App\Helper\Helpers;
use Exception;

class UsersController{

    private $UsersModel;
    private $LogSystemController;
    private $LogSystemModel;
    public function __construct(){
        $this->UsersModel = new UsersModel;
        $this->LogSystemController = new LogSystemController;
        $this->LogSystemModel = new LogSystemModel;
    }

    public function show($param){
        $ConnexionController = $param['ConnexionSignleton'];
        $ConnexionController::isLoggedin();
        
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];  

        $prenom = $nom = $email = $password = $dateDeNaissance = '';
        if(isset($_SESSION['idAdmin'])){
            $id = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
        }
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
        
        if(isset($_SESSION['idAdmin'])){
            $id = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
        }

        $user = $this->UsersModel->getUser($pdoSignleton, $id)[0];
        $domain = $_ENV['DOMAIN'];
        $public = $_ENV['PUBLIC'];

        $token = Helpers::tokenGenerator();
        $tokenInput = filter_var($_POST['token-edit-profile'], FILTER_SANITIZE_STRING);
        
        
        if(isset($_POST['update-account']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            if (hash_equals($_SESSION['token'], $tokenInput)) {
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
                $this->LogSystemModel->addToLog($pdoSignleton, $id, NULL, 'utilisateurModifie');

                // Gestion de changement de mot de passe
                $updateUser = $this->UsersModel->update($pdoSignleton, $id ,$nom, $prenom, $email, '', $dateDeNaissance, $imgNewName);
                if(!empty($_POST['password'])){
                    $updateUser = $this->UsersModel->update($pdoSignleton, $id ,$nom, $prenom, $email, $password, $dateDeNaissance, $imgNewName);
                    // logout
                    // TODO Uncomment here
                    // session_destroy();
                    
                    // affichage alert vous êtes déconnectés
                    $_SESSION['alert'] = 'ok';
                }
                
                // Gestion d'alert, si la bdd est mise à jour, alert success, sinon alert danger
                if($updateUser){
                    $_SESSION['alert'] = 'ok';
                }else{
                    $_SESSION['alert'] = 'err';
                }

                header('Location:'.$urlGenerator->generate('authorShow', ['id' =>$_SESSION['idAdmin']] ));
            }else {
                header('Location:' . $urlGenerator->generate('err405'));
            }
        }
        require_once 'views/profile-edit.php';
    }

}