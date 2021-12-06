<?php
namespace App\Controllers;
use App\Classes\PDOSignleton;
use App\Model\UsersModel;
use App\Helper\Helpers;
class ContactController{
    

    private $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel;
        $this->nbUtilisateur = $this->UsersModel->getCountUsers(PDOSignleton::getSingleton()::PDO_Init());
        $this->nbUtilisateur = filter_var($this->nbUtilisateur[0]->nbUsers, FILTER_VALIDATE_INT); 
    }

    public function contact($param){
        $urlGenerator = $param['urlGenerator'];
        Helpers::VerifyIfUserExist($this->nbUtilisateur, $urlGenerator);

        require_once 'views/contact.php';
    }
}