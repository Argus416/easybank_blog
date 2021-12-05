<?php
namespace App\Controller;

class ContactController{


    public function __construct()
    {
    }

    public function contact($param){
        $urlGenerator = $param['urlGenerator'];

        require_once 'views/contact.php';
    }
}