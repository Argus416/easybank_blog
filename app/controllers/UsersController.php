<?php

require_once 'app/models/UsersModel.php';

class UsersController{

    private $UsersModel;

    public function __construct(){
        $this->UsersModel = new UsersModel;
    }

   
    public function show($param){
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $prenom = $nom = $email = $password = $dateDeNaissance = '';
        $id = filter_var($param['id'], FILTER_VALIDATE_INT);

        $user = $this->UsersModel->getUser($id)[0];
       
        require_once 'views/my_profile.php';

    }

    public function edit($param){
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $prenom = $nom = $email = $password = $imgProfile = $dateDeNaissance = '';
        $id = filter_var($param['id'], FILTER_VALIDATE_INT);

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
            
            if(in_array($imgAcutalExt, $allowedExt)){
                if($imgProfileError === 0){
                    if($imgProfileSize < 300000){
                        $imgNewName = uniqid('', true) . '.' . $imgAcutalExt;
                        $serverDocumentRoot =  str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']) ;
                        $imgDestination = $serverDocumentRoot ."/upload/images";
                        dump(pathinfo($_FILES['photo_profile']['name']));
                        move_uploaded_file($imgProfileTmpName, $imgDestination);
                    }else{
                        echo "l'image est trop grande, il ne faut pas qu'elle dépasse 3mb";
                    }
                }
            }else{
                echo "vous ne pouvez pas mettre ce fichier comme img profile, veuillez uploader une img de type jpg, jpeg ou png ";
            }
            
            dump($imgAcutalExt);

            dump($_FILES['photo_profile']);
            // header('Location:'.$urlGenerator->generate('authorShow', ['id' => $_ENV['USER_ID']]));
            $this->UsersModel->update($id ,$nom, $prenom, $email, $password, $dateDeNaissance);

        }
        require_once 'views/profile-edit.php';
    }

   
}