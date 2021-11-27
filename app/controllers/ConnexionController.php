<?php

require_once 'app\models\UsersModel.php';

class ConnexionController{

    private $UsersModel;

    public function __construct(){
        $this->UsersModel = new UsersModel;
    }

    public function login($param){
        $urlGenerator = $param['urlGenerator'];
        $err = "";
        
        if($_SESSION['isLoggedin'] != true){
            $users = $this->UsersModel->getUsers();
            $email = $password = '';
            
            if(isset($_POST['login'])){
                if(
                    isset($_POST['email-login']) && 
                    !empty($_POST['email-login']) &&
                    isset($_POST['password-login']) &&
                    !empty($_POST['password-login'])
                ){
                    $email = filter_var($_POST['email-login']);
                    $password = filter_var($_POST['password-login']);
                    
                    $hashed_password = password_hash($password, PASSWORD_ARGON2I);

                    $admin = $this->UsersModel->getUser($_ENV['USER_ID'])[0];

                    if(
                        $email === $admin->email &&
                        password_verify($password, $admin->mdp)
                    ){
                        $_SESSION['isLoggedin'] = true;
                        header('Location:'.$urlGenerator->generate('accueil'));
                    }else{
                        $err = "<p class='text-danger err-text'>Votre email ou mot de passe n'est pas correct</p>";
                    }
                }
            }
            require_once 'views\login.php';
        }else{
            header('Location:'.$urlGenerator->generate('accueil'));
        }

    }

    public static function isLoggedin(){
        if(isset($_SESSION['isLoggedin'])){
            if($_SESSION['isLoggedin'] != true){
                return header('location:/');
            }
        }
    }

    public static function Deconnexion(){
        if(isset($_POST['deconnexion'])){
            if($_SESSION['isLoggedin'] == true){
                $_SESSION['isLoggedin'] = false;
                return header('location:/');
            }
        }
    }
    // public function signup($param){
    //     $urlGenerator = $param['urlGenerator'];
    //     $prenom = $nom = $email = $password = '';
        
    //     if(isset($_POST['create-account'])){
    //         if(
    //             isset($_POST['prenom-signup']) &&
    //             isset($_POST['nom-signup']) &&
    //             isset($_POST['email-signup']) && 
    //             isset($_POST['password-signup'])
    //         ){
    //             $prenom = filter_var($_POST['prenom-signup'], FILTER_SANITIZE_STRING);
    //             $nom = filter_var($_POST['nom-signup'], FILTER_SANITIZE_STRING);
    //             $email = filter_var($_POST['email-signup'], FILTER_SANITIZE_STRING);
    //             $password = filter_var($_POST['password-signup'], FILTER_SANITIZE_STRING);
    //             $password = password_hash($password, PASSWORD_ARGON2I);

    //             $this->UsersModel->create($nom, $prenom, $email, $password);
    //         }
            
    //     }
        
    //     require_once 'views\signup.php';
    // }

    // public function usersManagement($param){
    //     $urlGenerator = $param['urlGenerator'];
    //     $users = $this->UsersModel->getUsers();

    //     if(isset($_POST['user-del'])){
    //         $id = filter_var($_POST['user-id'], FILTER_VALIDATE_INT);
    //         $this->UsersModel->delete($id);
    //     }
    //     require_once 'views\users_management.php';
    // }

}