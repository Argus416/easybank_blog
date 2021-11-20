<?php

require_once 'app\models\UsersModel.php';

class UsersController{

    private $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel;
    }

    public function login($param){
        $urlGenerator = $param['urlGenerator'];
        require_once 'views\login.php';
    }

    public function usersManagement($param){
        $urlGenerator = $param['urlGenerator'];
        $users = $this->UsersModel->getUsers();

        require_once 'views\users_management.php';
    }

    public function signup($param){
        $urlGenerator = $param['urlGenerator'];
        $prenom = $nom = $email = $password = '';
        
        // TODO * Si le formulaire est soumis
        if(isset($_POST['create-account'])){
            if(isset($_POST['prenom-signup'])){
                $prenom = filter_var($_POST['prenom-signup'], FILTER_SANITIZE_STRING);
            }
            
            if(isset($_POST['nom-signup'])){
                $nom = filter_var($_POST['nom-signup'], FILTER_SANITIZE_STRING);
            }

            if(isset($_POST['email-signup'])){
                $email = filter_var($_POST['email-signup'], FILTER_SANITIZE_STRING);
            }

            if(isset($_POST['password-signup'])){
                $password = filter_var($_POST['password-signup'], FILTER_SANITIZE_STRING);
            }

            $this->UsersModel->create($nom, $prenom, $email, $password);
        }
        
        require_once 'views\signup.php';
    }

    public function show($param){
        $urlGenerator = $param['urlGenerator'];
        
        require_once 'views\my_profile.php';
    }

    public function edit($param){
        $urlGenerator = $param['urlGenerator'];
        $prenom = $nom = $email = $password = $dateDeNaissance = '';
        $id = filter_var($param['id'], FILTER_VALIDATE_INT);

        $user = $this->UsersModel->getUser($id)[0];
        dump($user);
        
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
                $mdp = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            }
            dump($dateDeNaissance);
            dump($_POST);
            
            $this->UsersModel->update($id ,$nom, $prenom, $email, $mdp, $dateDeNaissance);
        }
        
        require_once 'views\profile-edit.php';
    }
}