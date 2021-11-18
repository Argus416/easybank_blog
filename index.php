<?php

use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Generator\UrlGenerator;
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
require_once 'app\controllers\UsersController.php';



try{
    $regChiffre = '<\d+>';

    $accueilRoute = new Route('/', [
        'controller' => [
            new ArticlesController(), 'index'
        ]
    ]);

    $blogRoute = new Route('/blog', [
        'controller' => [
            new ArticlesController(), 'blog'
        ]
    ]);

    $articleRoute = new Route("/article/{id$regChiffre}", [
        'controller' => [
            new ArticlesController(), 'show'
        ],
        ['id' => "$regChiffre"],

    ]);

    $contactRoute = new Route('/contact', [
        'controller' => [
            new ContactController(), 'contact'
        ]
    ]);

    $loginRoute = new Route('/login', [
        'controller' => [
            new UsersController(), 'login'
        ]
    ]);

    $signupRoute = new Route('/signup', [
        'controller' => [
            new UsersController(), 'signup'
        ]
    ]);


    $routeCollection = new RouteCollection;
    $routeCollection->add('accueil', $accueilRoute);
    $routeCollection->add('contact', $contactRoute);
    $routeCollection->add('blog', $blogRoute);
    $routeCollection->add('login', $loginRoute);
    $routeCollection->add('logout', $signupRoute);
    $routeCollection->add('article', $articleRoute);

    $pathInfo = $_SERVER['PATH_INFO'] ?? "/";
    $urlMatcher = new UrlMatcher($routeCollection, new RequestContext());

    $currentRoute = $urlMatcher->match($pathInfo);
    $urlGenerator = new UrlGenerator($routeCollection, new RequestContext());
    
    $currentRoute['urlGenerator'] = $urlGenerator;
    
    $controller = $currentRoute['controller'];

    call_user_func($controller, $currentRoute);
}catch(ResourceNotFoundException $e){
    require_once 'views/404.php';
}