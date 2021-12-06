<?php
namespace App\Controllers;


class ErrorController{


    public function err404($param){
        $urlGenerator = $param['urlGenerator'];

        require_once 'views/404.php';
    }

    public function err405($param){
        $urlGenerator = $param['urlGenerator'];

        require_once 'views/405.php';
    }
}