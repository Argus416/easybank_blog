<?php

require_once 'app/models/ArticlesModel.php';
require_once 'app/models/CategoriesModel.php';

class ArticlesController{

    private $ArticlesModel;
    private $CategoriesModel;

    // Attribue pour la pagination
    private $nbElementParPage;
    public function __construct()
    {
        $this->ArticlesModel = new ArticlesModel;
        $this->CategoriesModel = new CategoriesModel;
        
        $this->nbElementParPage = 4;
    }

    public function index($param){
        $urlGenerator = $param['urlGenerator'];

        $data = $this->ArticlesModel->getLatesetArticles();
        require_once 'views/accueil.php';
    }

    public function blog($param){
        $urlGenerator = $param['urlGenerator'];
        $nbPages = 0;
        
        // Si aucun catégorie n'est selectionné => afficher tous les articles
        if(!isset($_POST['categories-selected']) || empty($_POST['categories-selected']) ){
            
            $data = $this->ArticlesModel->getArticles();
            
            // gestion de la pagination
            if(isset($_GET['pagination']) && !empty($_GET['pagination'])){
                $pageNumber = (intval($_GET['pagination']) - 1) * $this->nbElementParPage;
                $data = $this->ArticlesModel->getArticles($pageNumber);
            }

            $nbPages = $this->ArticlesModel->getCountArticle()[0]->nbArticles;
            $nbPages = intval(ceil($nbPages / $this->nbElementParPage));
    
            
        }else{
            unset($_POST['categories-selected']);
            $categories = [];
            foreach($_POST as $categorie){
                array_push($categories, $categorie);
            }
            $data = $this->ArticlesModel->getArticlesByCategories($categories);

            $nbPages = $this->ArticlesModel->getCountArticlesByCategories($categories)[0]->nbArticles;
            $nbPages = intval(ceil($nbPages / $this->nbElementParPage));
            dump( $this->ArticlesModel->getCountArticlesByCategories($categories));
        }
        
        $articles = $data;
        $categories = $this->CategoriesModel->getCategories();

        $urlBlog = $urlGenerator->generate('blog');

        $pagintation = Helpers::Pagination($this->nbElementParPage, $nbPages, "$urlBlog?pagination=" );

        require_once 'views/blog.php';
    }


    public function show($param){
        $urlGenerator = $param['urlGenerator'];

        $id = $param['id'];
        $article = $this->ArticlesModel->getArticle($id);
        $data = $this->ArticlesModel->getLatesetArticlesExcept($id);
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
            // Reactualiser  la page
            header('Refresh:0');
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
            $this->ArticlesModel->editArticle($id ,$title, $body, $categorie );
            header('location:'. $urlGenerator->generate('article', ['id' => $id]));
        }
        require_once 'views/form_edit_article.php';
    }

}