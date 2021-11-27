<?php

require_once 'app\models\UsersModel.php';

class UsersController{

    private $UsersModel;

    public function __construct(){
        $this->UsersModel = new UsersModel;
    }

   
    public function show($param){
        $urlGenerator = $param['urlGenerator'];
        $prenom = $nom = $email = $password = $dateDeNaissance = '';
        $id = filter_var($param['id'], FILTER_VALIDATE_INT);

        $user = $this->UsersModel->getUser($id)[0];
        
        if(isset($_POST['update-account'])){
            if(isset($_POST['prenom'])){
                $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
            }
            
            if(isset($_POST['nom'])){
                $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
            }

            if(isset($_POST['email'])){
                $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            }

            if(isset($_POST['date-de-naissance'])){
                $dateDeNaissance = filter_var($_POST['date-de-naissance'], FILTER_SANITIZE_STRING);
                $dateDeNaissance = date("Y-m-d", strtotime($dateDeNaissance));
            }

            if(isset($_POST['password'])){
                $mdp = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            }

            $this->UsersModel->update($id ,$nom, $prenom, $email, $mdp, $dateDeNaissance);
        }
        require_once 'views\my_profile.php';

    }

    public function edit($param){
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $prenom = $nom = $email = $password = $dateDeNaissance = '';
        $id = filter_var($param['id'], FILTER_VALIDATE_INT);

        $user = $this->UsersModel->getUser($id)[0];
        
        // TODO * Si le formulaire est soumis
        if(isset($_POST['update-account'])){
            if(isset($_POST['prenom'])){
                $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
            }
            
            if(isset($_POST['nom'])){
                $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
            }

            if(isset($_POST['email'])){
                $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            }

            if(isset($_POST['date-de-naissance'])){
                $dateDeNaissance = filter_var($_POST['date-de-naissance'], FILTER_SANITIZE_STRING);
                $dateDeNaissance = date("Y-m-d", strtotime($dateDeNaissance));
            }

            if(isset($_POST['password'])){
                $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            }

            header('Location:'.$urlGenerator->generate('authorShow', ['id' => $_ENV['USER_ID']]));
            $this->UsersModel->update($id ,$nom, $prenom, $email, $password, $dateDeNaissance);
        }
        
        require_once 'views\profile-edit.php';
    }

   
}