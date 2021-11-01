<?php

use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . "/vendor/autoload.php";

// * Importer les variables d'environment
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');


$accueilRoute = new Route('/');
$contactRoute = new Route('/contact');
$domain = $_ENV['DOMAIN'];
$views = $_ENV['VIEWS'];

dump($views);


$routeCollection = new RouteCollection;
$routeCollection->add('accueil', $accueilRoute);
$routeCollection->add('contact', $contactRoute);

$pathInfo = $_SERVER['PATH_INFO'] ?? "/";
$urlMatcher = new UrlMatcher($routeCollection, new RequestContext());

try{
    $resultat = $urlMatcher->match($pathInfo);
    $page = $resultat['_route'];
    require_once 'views/'.$page.'.php';
}catch(ResourceNotFoundException $e){
    require_once 'views/404.php';
}