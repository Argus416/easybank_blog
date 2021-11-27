<?php

require_once 'app\models\ArticlesModel.php';
require_once 'app\models\CategoriesModel.php';

class ArticlesController{

    private $ArticlesModel;
    private $CategoriesModel;

    public function __construct()
    {
        $this->ArticlesModel = new ArticlesModel;
        $this->CategoriesModel = new CategoriesModel;

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
    
    // public function stat($param){
    //     $urlGenerator = $param['urlGenerator'];
    
    //     require_once 'views\dashboard.php';
    // }

    public function articlesManagement($param){
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $allCategories = $this->CategoriesModel->getCategories();
        $articles = $this->ArticlesModel->getArticles();

        if(isset($_POST['article-del'])){
            $idArticle = filter_var($_POST['article-id'], FILTER_VALIDATE_INT);
            $this->ArticlesModel->deleteArticle($idArticle);
            // Reactualiser  la page
            header('Refresh:0');
        }

        require_once 'views\articles_management.php';
    }

    public function add($param){
        ConnexionController::isLoggedin();
        
        $urlGenerator = $param['urlGenerator'];
        $allCategories = $this->CategoriesModel->getCategories();
        $title = $body = '';
        $categorie = 0;
        
        // TODO * Si le formulaire est soumis
        if(isset($_POST['add-article'])){
            if(isset($_POST['artilce-bannier'])){
                $bannier = filter_var($_POST['artilce-bannier'], FILTER_SANITIZE_STRING);
            }
            
            if(isset($_POST['artilce-title'])){
                $title = filter_var($_POST['artilce-title'], FILTER_SANITIZE_STRING);
            }

            if(isset($_POST['artilce-categorie'])){
                $categorie = filter_var($_POST['artilce-categorie'], FILTER_VALIDATE_INT);
            }

            if(isset($_POST['artilce-body'])){
                $body = filter_var($_POST['artilce-body'], FILTER_SANITIZE_STRING);
            }

            header('Location:' . $urlGenerator->generate('management'));
            $this->ArticlesModel->addArticle($title, $body, $categorie );
        }
        require_once 'views\form_add_article.php';
    }

    public function edit($param){
        ConnexionController::isLoggedin();
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $id = $param['id'];
        $title = $body = '';
        $categorie = 0;

        $getArticle = $this->ArticlesModel->getArticle($id)[0];
        $allCategories = $this->CategoriesModel->getCategories();


        // TODO * Si le formulaire est soumis
        if(isset($_POST['edit-article'])){
            if(isset($_POST['artilce-bannier'])){
                $bannier = filter_var($_POST['artilce-bannier'], FILTER_SANITIZE_STRING);
            }
            
            if(isset($_POST['artilce-title'])){
                $title = filter_var($_POST['artilce-title'], FILTER_SANITIZE_STRING);
            }

            if(isset($_POST['artilce-categorie'])){
                $categorie = filter_var($_POST['artilce-categorie'], FILTER_VALIDATE_INT);
            }

            if(isset($_POST['artilce-body'])){
                $body = filter_var($_POST['artilce-body'], FILTER_SANITIZE_STRING);
            }
            header('Refresh:0');
            $this->ArticlesModel->editArticle($id ,$title, $body, $categorie );
        }
        require_once 'views\form_edit_article.php';
    }
}