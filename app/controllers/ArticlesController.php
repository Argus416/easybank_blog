<?php

require_once 'app\models\ArticlesModel.php';

class ArticlesController{

    private $ArticlesModel;

    public function __construct()
    {
        $this->ArticlesModel = new ArticlesModel;

    }

    public function index($param){
        $urlGenerator = $param['urlGenerator'];

        $data = $this->ArticlesModel->getLatesetArticles();
        require_once 'views\accueil.php';
    }

    public function blog($param){
        $urlGenerator = $param['urlGenerator'];

        $data = $this->ArticlesModel->getArticles();
        require_once 'views\blog.php';
    }

    public function show($param){
        $urlGenerator = $param['urlGenerator'];

        $id = $param['id'];
        $article = $this->ArticlesModel->getArticle($id);
        $data = $this->ArticlesModel->getLatesetArticles();
        require_once 'views\article.php';
    }
}