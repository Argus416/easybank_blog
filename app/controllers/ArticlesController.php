<?php

require_once 'app/models/ArticlesModel.php';
require_once 'app/models/CategoriesModel.php';
require_once 'app/models/UsersModel.php';
require_once 'app/models/LogSystemModel.php';


class ArticlesController{

    private $ArticlesModel;
    private $CategoriesModel;
    private $UsersModel;
    private $LogSystemModel;
    
    private $nbElementParPage;

    private $idUser;

    public function __construct()
    {
        $this->ArticlesModel = new ArticlesModel;
        $this->CategoriesModel = new CategoriesModel;
        $this->UsersModel = new UsersModel;
        $this->LogSystemModel = new LogSystemModel;
        $this->idUser = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
        
        $this->nbElementParPage = 4;
    }

    public function index($param){
        $urlGenerator = $param['urlGenerator'];

        $articles = $this->ArticlesModel->getLatesetArticles();
        require_once 'views/accueil.php';
    }

    public function blog($param){
        $urlGenerator = $param['urlGenerator'];
        $nbArticles = 0;
        $categoriesSelections = [];
        
        // Si aucun catégorie n'est selectionné => afficher tous les articles
        if(!isset($_GET['categories-selected']) || empty($_GET['categories-selected']) ){
            
            $articles = $this->ArticlesModel->getArticlesWithPagintation();
            
            // gestion de la pagination
            if(isset($_GET['pagination']) && !empty($_GET['pagination'])){
                $pageNumber = (intval($_GET['pagination']) - 1) * $this->nbElementParPage;
                $articles = $this->ArticlesModel->getArticlesWithPagintation($pageNumber);
            }

            $nbArticles = $this->ArticlesModel->getCountArticle()[0]->nbArticles;
            unset($_GET['categories-selected']);
        }else{
            //si aucun catégorie est selectionne, afficher tous les articles
            unset($_GET['categories-selected']);

            // récuperer tous les id de catégories selectionnées
            $categoriesSelections = $_GET;

            // récuperer tous les articles de catégorie
            $articles = $this->ArticlesModel->getArticlesByCategories($categoriesSelections);
            $nbArticles = $this->ArticlesModel->getCountArticlesByCategories($categoriesSelections)[0]->nbArticles;

        }
        $categories = $this->CategoriesModel->getCategories();
        $urlBlog = $urlGenerator->generate('blog');

        $cats = '';
        $i = 1;

        foreach($categoriesSelections as $index => $cat){
            if($i == count($categoriesSelections)){
                $cats .="$index=$cat"; 
            }else{
                $cats .="$index=$cat&"; 
            }
            $i++;
        }
        
        $pagintation = Helpers::Pagination($this->nbElementParPage, $nbArticles, "$urlBlog?$cats&pagination=" );
        require_once 'views/blog.php';
    }


    public function show($param){
        $urlGenerator = $param['urlGenerator'];

        $id = $param['id'];
        $article = $this->ArticlesModel->getArticle($id);
        $articles = $this->ArticlesModel->getLatesetArticlesExcept($id);
        require_once 'views/article.php';
    }
    
    // public function stat($param){
    //     $urlGenerator = $param['urlGenerator'];
    
    //     require_once 'views/dashboard.php';
    // }

    public function articlesManagement($param){
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $allCategories = $this->CategoriesModel->getCategories();
        $articles = $this->ArticlesModel->getArticles();

        if(isset($_POST['article-del'])){
            $idArticle = filter_var($_POST['article-id'], FILTER_VALIDATE_INT);
            $this->ArticlesModel->deleteArticle($idArticle);
           
            if($this->ArticlesModel->deleteArticle($idArticle)){
                $_SESSION['alert'] = 'del-article';
            }else{
                $_SESSION['alert'] = 'err';
            }
            
           // Reactualiser  la page
           header('Refresh:1');
        }

        require_once 'views/articles_management.php';
    }

    public function add($param){
        ConnexionController::isLoggedin();
        
        $urlGenerator = $param['urlGenerator'];
        $allCategories = $this->CategoriesModel->getCategories();
        $title = $body = '';
        $categorie = 0;
        
        // TODO * Si le formulaire est soumis
        if(isset($_POST['add-article'])){
            $bannier = filter_var($_POST['artilce-bannier'], FILTER_SANITIZE_STRING);
            $title = filter_var($_POST['artilce-title'], FILTER_SANITIZE_STRING);
            $categorie = filter_var($_POST['artilce-categorie'], FILTER_VALIDATE_INT);
            $body = filter_var($_POST['artilce-body'], FILTER_SANITIZE_STRING);
            $this->idUser = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
            $idArticle = $this->ArticlesModel->getLatesetArticle()[0]->articleID;
            $idArticle = filter_var($idArticle, FILTER_VALIDATE_INT);

            
            $this->ArticlesModel->addArticle($title, $body, $categorie,$this->idUser );
            $this->LogSystemModel->addToLog($this->idUser, $idArticle, 'articleCree');

            if($this->ArticlesModel->addArticle($title, $body, $categorie,$this->idUser )){
                $_SESSION['alert'] = 'add-article';
            }else{
                $_SESSION['alert'] = 'err';
            }

            header('Location:' . $urlGenerator->generate('articlesManagement'));
        }
        require_once 'views/form_add_article.php';
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


        if(isset($_POST['edit-article'])){
            $bannier = filter_var($_POST['artilce-bannier'], FILTER_SANITIZE_STRING);
            $title = filter_var($_POST['artilce-title'], FILTER_SANITIZE_STRING);
            $categorie = filter_var($_POST['artilce-categorie'], FILTER_VALIDATE_INT);
            $body = filter_var($_POST['artilce-body'], FILTER_SANITIZE_STRING);

            
            $this->LogSystemModel->addToLog($this->idUser, $id, 'articleModifie');

            $this->ArticlesModel->editArticle($id ,$title, $body, $categorie );
            if($this->ArticlesModel->editArticle($id ,$title, $body, $categorie)){
                $_SESSION['alert'] = 'go';
            }else{
                $_SESSION['alert'] = 'err';
            }
            header('location:'. $urlGenerator->generate('article', ['id' => $id]));
        }
        require_once 'views/form_edit_article.php';
    }

}