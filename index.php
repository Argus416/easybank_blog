<?php

use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require __DIR__ . "/vendor/autoload.php";
require_once "app\classes\PDOSignleton.php";
require_once "config\config.php";
require_once "app\helpers\Helpers.php";

require_once 'app\controllers\ArticlesController.php';
require_once 'app\controllers\ContactController.php';




$accueilRoute = new Route('/', [
    'controller' => [
        new ArticlesController(), 'index'
    ]
]
);

$contactRoute = new Route('/contact', [
    'controller' => [
        new ContactController(), 'contact'
    ]
]);



$routeCollection = new RouteCollection;
$routeCollection->add('accueil', $accueilRoute);
$routeCollection->add('contact', $contactRoute);

$pathInfo = $_SERVER['PATH_INFO'] ?? "/";
$urlMatcher = new UrlMatcher($routeCollection, new RequestContext());

try{
$resultat = $urlMatcher->match($pathInfo);
$controller = $resultat['controller'];

call_user_func($controller, $resultat);
}catch(ResourceNotFoundException $e){
    require_once 'views/404.php';
}