<?php

require_once 'app\models\ArticlesModel.php';

class ContactController{


    public function __construct()
    {
    }

    public function contact(){
        require_once 'views\contact.php';
    }
}