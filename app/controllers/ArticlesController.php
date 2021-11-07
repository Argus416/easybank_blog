<?php

require_once 'app\models\ArticlesModel.php';

class ArticlesController{

    private $ArticlesModel;

    public function __construct()
    {
        $this->ArticlesModel = new ArticlesModel;
    }

    public function index(){
        $data = $this->ArticlesModel->getLatesetArticles();
        require_once 'views\accueil.php';
    }
}