<?php

require_once 'app/models/UsersModel.php';
require_once 'app/models/LogSystemModel.php';
require_once 'app/controllers/LogSystemController.php';

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
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $prenom = $nom = $email = $password = $dateDeNaissance = '';
        $id = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
        $user = $this->UsersModel->getUser($id)[0];
        
        if(isset($_POST['download-logs'])){
            $this->LogSystemController->generateLogFile();
            $_SESSION['alert'] = 'download-logs';
        }
        require_once 'views/my_profile.php';
    }

    public function edit($param){
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $prenom = $nom = $email = $password = $imgProfile = $dateDeNaissance = '';
        $id = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);

        $user = $this->UsersModel->getUser($id)[0];
        $domain = $_ENV['DOMAIN'];
        $public = $_ENV['PUBLIC'];
        
        if(isset($_POST['update-account'])){
            
            $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
            $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $dateDeNaissance = filter_var($_POST['date-de-naissance'], FILTER_SANITIZE_STRING);
            $dateDeNaissance = date("Y-m-d", strtotime($dateDeNaissance));
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $imgProfileName = $_FILES['photo_profile']['name'];
            $imgProfileType = $_FILES['photo_profile']['type'];
            $imgProfileTmpName = $_FILES['photo_profile']['tmp_name'];
            $imgProfileError = $_FILES['photo_profile']['error'];
            $imgProfileSize = $_FILES['photo_profile']['size'];
            
            $imgExt = explode('.', $imgProfileName);
            $imgAcutalExt = strtolower(end($imgExt));
            $allowedExt = array('jpg', 'jpeg', 'png');
            $imgNewName = "" ; 
            
            if(in_array($imgAcutalExt, $allowedExt)){
                if($imgProfileError === 0){
                    if($imgProfileSize < 300000){
                        $imgNewName = str_replace('.','', uniqid('', true) ) . '.' . $imgAcutalExt;
                        $path = "public/uploaded/images/$imgNewName";

                        try{
                            move_uploaded_file($imgProfileTmpName, $path);
                        }catch(Exception $e){
                            echo $e->getMessage();
                        }
                       
                    }else{
                        echo "l'image est trop grande, il ne faut pas qu'elle dépasse 3mb";
                    }
                }
            }
            
            header('Location:'.$urlGenerator->generate('authorShow', ['id' =>$_SESSION['idAdmin']] ));
            
            $_SESSION['authorPrenom'] = $prenom;
            if($imgNewName){
                $_SESSION['authorImg'] = $imgNewName;
            }


            $this->LogSystemModel->addToLog($id, NULL, 'utilisateurModifiee');
            $this->UsersModel->update($id ,$nom, $prenom, $email, $password, $dateDeNaissance, $imgNewName);
            
            // Gestion d'alert, si la bdd est mise à jour, alert success, sinon alert danger
            if($this->UsersModel->update($id ,$nom, $prenom, $email, $password, $dateDeNaissance, $imgNewName)){
                $_SESSION['alert'] = 'ok';
            }else{
                $_SESSION['alert'] = 'err';
            }
        }
        require_once 'views/profile-edit.php';
    }

   
}