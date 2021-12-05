<?php

namespace App\Controllers;

use App\Model\ArticlesModel;
use App\Model\UsersModel;
use App\Model\LogSystemModel;
use App\Helper\Helpers;

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
        $this->UsersModel = new UsersModel;
        $this->LogSystemModel = new LogSystemModel;
        $this->idUser = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
        
        $this->nbElementParPage = 4;
    }

    public function index($param){
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];
        $articles = $this->ArticlesModel->getLatesetArticles($pdoSignleton);
        require_once 'views/accueil.php';
    }

    public function blog($param){
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];

        $nbArticles = 0;
        $pageNumber = 0;

        // récuperer tous les articles 
        $articles = $this->ArticlesModel->getArticlesWithPagintation($pdoSignleton, $pageNumber);
        $nbArticles = $this->ArticlesModel->getCountArticles($pdoSignleton)[0]->nbArticles;       
        $query = '?pagination=';
        if(isset($_GET['pagination']) && !empty($_GET['pagination'])){
            $pageNumber = (intval($_GET['pagination']) - 1) * $this->nbElementParPage;
            $articles = $this->ArticlesModel->getArticlesWithPagintation($pdoSignleton, $pageNumber);
            $query = '?pagination=';
        }
        
        if(isset($_GET['search-articles']) && !empty($_GET['search-articles'])){
            $search = htmlentities(trim($_GET['search-articles']));
            $articles = $this->ArticlesModel->searchArticles($pdoSignleton, $search);
            $nbArticles = filter_var($this->ArticlesModel->getCountSearchArticles($pdoSignleton, $search)[0]->nbArticles, FILTER_VALIDATE_INT);
            $query = "?search-articles=".$_GET['search-articles']."&pagination=";
        }
        
        $pagintation = Helpers::Pagination($this->nbElementParPage, $nbArticles, $query );
        require_once 'views/blog.php';
    }

    public function show($param){
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];

        $id = $param['id'];
        $article = $this->ArticlesModel->getArticle($pdoSignleton, $id);
        $articles = $this->ArticlesModel->getLatesetArticlesExcept($pdoSignleton, $id);
        require_once 'views/article.php';
    }

    public function articlesManagement($param){
        $ConnexionController = $param['ConnexionSignleton'];
        $ConnexionController::isLoggedin();
        
        $pdoSignleton = $param['PDOSignleton'];
        $urlGenerator = $param['urlGenerator'];
        
        $articles = $this->ArticlesModel->getArticles($pdoSignleton);

        if(isset($_POST['article-del'])){
            $idArticle = filter_var($_POST['article-id'], FILTER_VALIDATE_INT);

            if($this->ArticlesModel->deleteArticle($pdoSignleton, $idArticle)){
                $_SESSION['alert'] = 'del-article';
            }
            // else{
                // $_SESSION['alert'] = 'err';
            // }
            
           // Reactualiser  la page
           header('Refresh:1');
        }

        require_once 'views/articles_management.php';
    }

    public function add($param){
        $ConnexionController = $param['ConnexionSignleton'];
        $ConnexionController::isLoggedin();
        
        $pdoSignleton = $param['PDOSignleton'];  
        $urlGenerator = $param['urlGenerator'];
        $title = $body = '';
        $categorie = 0;
        
        if(isset($_POST['add-article'])){
            
            $bannier = filter_var($_POST['artilce-bannier'], FILTER_SANITIZE_STRING);

            $title = Helpers::sanitizeInput($_POST['artilce-title']);
            $body = Helpers::sanitizeInput($_POST['artilce-body']);

            $this->idUser = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
            
            $idArticle = $this->ArticlesModel->getLastArticle($pdoSignleton)[0]->articleID;
            $idArticle = filter_var($idArticle, FILTER_VALIDATE_INT);

            $this->LogSystemModel->addToLog($pdoSignleton, $this->idUser, $idArticle, 'articleCree');

            if($this->ArticlesModel->addArticle($pdoSignleton, $title, $body, $this->idUser)){
                $_SESSION['alert'] = 'add-article';
            }
            // else{
                // $_SESSION['alert'] = 'err';
            // }
            header('Location:' . $urlGenerator->generate('articlesManagement'));
        }
        require_once 'views/form_add_article.php';
    }

    public function edit($param){
        $ConnexionController = $param['ConnexionSignleton'];
        $ConnexionController::isLoggedin();
        
        $pdoSignleton = $param['PDOSignleton'];
        $urlGenerator = $param['urlGenerator'];
        $id = $param['id'];
        $title = $body = '';

        $getArticle = $this->ArticlesModel->getArticle($pdoSignleton, $id)[0];

        if(isset($_POST['edit-article'])){
            $imgArticle = Helpers::uploadPhoto('imgArticle', 'public/upload/post-img');
            $title = Helpers::sanitizeInput($_POST['artilce-title']);
            $body = Helpers::sanitizeInput($_POST['artilce-body']);

            $this->LogSystemModel->addToLog($pdoSignleton, $this->idUser, $id, 'articleModifie');

            if($this->ArticlesModel->editArticle($pdoSignleton, $id ,$title, $body, $imgArticle)){
                $_SESSION['alert'] = 'go';
            }else{
                $_SESSION['alert'] = 'err';
            }
            
            header('location:'. $urlGenerator->generate('article', ['id' => $id]));
        }
        require_once 'views/form_edit_article.php';
    }

}