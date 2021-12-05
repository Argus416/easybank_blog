<?php
namespace App\Controller;


class ErrorController{


    public function __construct()
    {
    }

    public function err404($param){
        $urlGenerator = $param['urlGenerator'];

        require_once 'views/404.php';
    }
}