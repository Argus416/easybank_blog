<?php
namespace App\Controllers;


class ErrorController{


    public function err404($param){
        $urlGenerator = $param['urlGenerator'];

        require_once 'views/404.php';
    }
}