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

        $data = $this->UsersModel->getUsers();
        require_once 'views\login.php';
    }

    public function signup($param){
        $urlGenerator = $param['urlGenerator'];

        $data = $this->UsersModel->getUsers();
        require_once 'views\signup.php';
    }
}