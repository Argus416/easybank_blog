<?php
namespace App\Controllers;

use App\Model\UsersModel;
use App\Helper\Helpers;

class ConnexionController{

    private $UsersModel;
    
    private static $_singleton;

    public function __construct(){
        $this->UsersModel = new UsersModel;
    }

    public static function getSingleton(): ConnexionController {
        if (is_null(self::$_singleton)) {
            self::$_singleton = new ConnexionController();
        }
        return self::$_singleton;
    }

    public function login($param){
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];  
        $err = "";
        
        if($_SESSION['isLoggedin'] != true){
            $users = $this->UsersModel->getUsers($pdoSignleton);
            $email = $password = '';
            
            if(isset($_POST['login'])){
                if(
                    isset($_POST['email-login']) && 
                    !empty($_POST['email-login']) &&
                    isset($_POST['password-login']) &&
                    !empty($_POST['password-login'])
                ){
            
                    $email = Helpers::sanitizeInput($_POST['email-login']);
                    $password = Helpers::sanitizeInput($_POST['password-login']);
                    // $hashed_password = password_hash($password, PASSWORD_ARGON2I);

                    $admin = $this->UsersModel->getUsers($pdoSignleton)[0];

                    if(
                        $email === $admin->authorEmail &&
                        password_verify($password, $admin->authorMDP)
                    ){
                        $_SESSION['isLoggedin'] = true;
                        $_SESSION['idAdmin'] = $admin->authorID;
                        $_SESSION['authorPrenom'] = $admin->authorPrenom;
                        $_SESSION['authorImg'] = $admin->authorImg;
                        header('Location:'.$urlGenerator->generate('accueil'));
                    }else{
                        $err = "<p class='text-danger err-text'>Votre email ou mot de passe n'est pas correct</p>";
                    }
                }
            }
            require_once 'views/login.php';
        }else{
            header('Location:'.$urlGenerator->generate('accueil'));
        }

    }

    public function signup($param){
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];  
        $prenom = $nom = $email = $password = '';
        
        if(isset($_POST['create-account'])){
            if(
                isset($_POST['prenom-signup']) &&
                isset($_POST['nom-signup']) &&
                isset($_POST['email-signup']) && 
                isset($_POST['password-signup'])
            ){
                $prenom = Helpers::sanitizeInput($_POST['prenom-signup']);
                $nom = Helpers::sanitizeInput($_POST['nom-signup']);
                $email = Helpers::sanitizeInput($_POST['email-signup']);
                $password = Helpers::sanitizeInput($_POST['password-login']);
                $password = password_hash($password, PASSWORD_ARGON2I);

                $this->UsersModel->create($pdoSignleton, $nom, $prenom, $email, $password);
            }
            
        }
        
        require_once 'views/signup.php';
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
    
    // public function usersManagement($param){
    //     $urlGenerator = $param['urlGenerator'];
    //     $users = $this->UsersModel->getUsers();

    //     if(isset($_POST['user-del'])){
    //         $id = filter_var($_POST['user-id'], FILTER_VALIDATE_INT);
    //         $this->UsersModel->delete($id);
    //     }
    //     require_once 'views/users_management.php';
    // }

}