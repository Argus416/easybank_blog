<?php

namespace App\Controllers;

use App\Model\ArticlesModel;
use App\Model\UsersModel;
use App\Model\LogSystemModel;
use App\Helper\Helpers;
use App\Classes\PDOSignleton;

class ArticlesController{

    private $ArticlesModel;
    private $UsersModel;
    private $LogSystemModel;
    
    private $nbElementParPage;
    private $nbUtilisateur;

    private $idUser;


    public function __construct(){
        $this->ArticlesModel = new ArticlesModel;
        $this->UsersModel = new UsersModel;
        $this->LogSystemModel = new LogSystemModel;
        
        if(isset($_SESSION['idAdmin'])){
            $this->idUser = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
        }
        
        $this->nbElementParPage = 4;

        $this->nbUtilisateur = $this->UsersModel->getCountUsers(PDOSignleton::getSingleton()::PDO_Init());
        $this->nbUtilisateur = filter_var($this->nbUtilisateur[0]->nbUsers, FILTER_VALIDATE_INT); 
    }

    public function index($param){
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];
        
        
        Helpers::VerifyIfUserExist($this->nbUtilisateur, $urlGenerator);
        
        $articles = $this->ArticlesModel->getLatesetArticles($pdoSignleton);
        require_once 'views/accueil.php';
    }

    public function blog($param){
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];
        
        Helpers::VerifyIfUserExist($this->nbUtilisateur, $urlGenerator);

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
            $articles = $this->ArticlesModel->searchArticles($pdoSignleton, $search, $pageNumber);
            $nbArticles = filter_var($this->ArticlesModel->getCountSearchArticles($pdoSignleton, $search)[0]->nbArticles, FILTER_VALIDATE_INT);
            $query = "?search-articles=".$_GET['search-articles']."&pagination=";
        }
        
        $pagintation = Helpers::Pagination($this->nbElementParPage, $nbArticles, $query );
        require_once 'views/blog.php';
    }

    public function show($param){
        $urlGenerator = $param['urlGenerator'];
        $pdoSignleton = $param['PDOSignleton'];
      
        Helpers::VerifyIfUserExist($this->nbUtilisateur, $urlGenerator);

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
        
        $token = Helpers::tokenGenerator();
        $tokenInput = filter_var($_POST['article-del-token'], FILTER_SANITIZE_STRING);

        if(isset($_POST['article-del']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

            $idArticle = filter_var($_POST['article-id'], FILTER_VALIDATE_INT);
            if (hash_equals($_SESSION['token'], $tokenInput)) {
                if($this->ArticlesModel->deleteArticle($pdoSignleton, $idArticle)){
                    $_SESSION['alert'] = 'del-article';
                }// else{
                 // $_SESSION['alert'] = 'err';
                // }
            }else{
                header('Location:' . $urlGenerator->generate('err405'));
            }
            
            
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
       
        $token = Helpers::tokenGenerator();
        $tokenInput = filter_var($_POST['token-add-article'], FILTER_SANITIZE_STRING);
        
        if(isset($_POST['add-article']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $imgArticle = Helpers::uploadPhoto('imgArticle', 'public/upload/post-img');
            $title = Helpers::sanitizeInput($_POST['artilce-title']);
            $body = Helpers::sanitizeInput($_POST['artilce-body']);

            // Protection contre CSRF
            if (!empty($_POST['token-add-article'])) {
                if (hash_equals($_SESSION['token'], $tokenInput)) {
                        echo "yes";
                        if(isset($_SESSION['idAdmin'])){
                            $this->idUser = filter_var($_SESSION['idAdmin'], FILTER_VALIDATE_INT);
                        }
                        $idArticle = $this->ArticlesModel->getLastArticle($pdoSignleton)[0]->articleID;
                        $idArticle = filter_var($idArticle, FILTER_VALIDATE_INT);
        
                        $this->LogSystemModel->addToLog($pdoSignleton, $this->idUser, $idArticle, 'articleCree');
        
                        if($this->ArticlesModel->addArticle($pdoSignleton, $title, $body, $this->idUser, $imgArticle)){
                            $_SESSION['alert'] = 'add-article';
                        }
                        // else{
                        //     $_SESSION['alert'] = 'err';
                        // }
                        header('Location:' . $urlGenerator->generate('articlesManagement'));
                } else {
                    header('Location:' . $urlGenerator->generate('err405'));
                }
            }
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

        $token = Helpers::tokenGenerator();
        $tokenInput = filter_var($_POST['token-edit-article'], FILTER_SANITIZE_STRING);
        

        if(isset($_POST['edit-article']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            if (hash_equals($_SESSION['token'], $tokenInput)) {

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
            }else {
                header('Location:' . $urlGenerator->generate('err405'));
            }
        }
        require_once 'views/form_edit_article.php';
    }

}