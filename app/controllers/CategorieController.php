<?php

require_once 'app/models/ArticlesModel.php';
require_once 'app/models/CategoriesModel.php';

class CategorieController{

    private $CategoriesModel;

    public function __construct()
    {
        $this->CategoriesModel = new CategoriesModel;

    }

    public function index($param){
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];

        if(isset($_POST['categorie-del'])){
            $id = filter_var($_POST['categorie-id'], FILTER_VALIDATE_INT);
            $this->CategoriesModel->deleteCategorie($id);
            header('Refresh:0');
        }
        // deleteArticle

        $data = $this->CategoriesModel->getCategories();
        require_once 'views/categories_management.php';
    }


    public function add($param){
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $type = '';
        
        if(isset($_POST['add-categorie'])){
            $type = filter_var($_POST['catgorie-type'], FILTER_SANITIZE_STRING);
            header('Location:' . $urlGenerator->generate('categorieManagement'));
            $this->CategoriesModel->add($type);
        }
        require_once 'views/add_categorie.php';
    }

    public function edit($param){
        ConnexionController::isLoggedin();
        $urlGenerator = $param['urlGenerator'];
        $id = $param['id'];
        $type = '';

        $getCategorie = $this->CategoriesModel->getCategorie($id)[0];

        if(isset($_POST['edit-categorie'])){
            $type = filter_var($_POST['catgorie-type'], FILTER_SANITIZE_STRING);
        
            $this->CategoriesModel->edit($id ,$type);
            header('location:'.$urlGenerator->generate('categorieManagement'));
        }
        require_once 'views/edit_categorie.php';
    }
}