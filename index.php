<?php
session_start();
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
require_once 'app\controllers\ConnexionController.php';
require_once 'app\controllers\ErrorController.php';

if(!isset($_SESSION['isLoggedin']) || $_SESSION['isLoggedin'] != true  ){
    $_SESSION['isLoggedin'] = false;
}


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

    $err404Route = new Route('/err/404', [
        'controller' => [
            new ErrorController(), 'err404'
        ]
    ]);

    $loginRoute = new Route('/login', [
        'controller' => [
            new ConnexionController(), 'login'
        ]
    ]);

    // $signupRoute = new Route('/signup', [
    //     'controller' => [
    //         new UsersController(), 'signup'
    //     ]
    // ]);

    // $dashboardRouteStat = new Route('/dashboard', [
    //     'controller' => [
    //         new ArticlesController(), 'stat'
    //     ]
    // ]);

    $dashboardRouteArticleMan = new Route('/dashboard/articles', [
        'controller' => [
            new ArticlesController(), 'articlesManagement'
        ]
    ]);

    $dashboardRouteArticleAdd = new Route('/dashboard/article/add', [
        'controller' => [
            new ArticlesController(), 'add'
        ]
    ]);

    $dashboardRouteArticleEdit = new Route("/dashboard/article/edit/{id$regChiffre}", [
        'controller' => [
            new ArticlesController(), 'edit'
        ],
        ['id' => "$regChiffre"],
    ]);

    // $dashboardRouteAuthorMan = new Route('/dashboard/authors', [
    //     'controller' => [
    //         new UsersController(), 'usersManagement'
    //     ],
    //     ['id' => "$regChiffre"],
    // ]);
    
    $dashboardRouteAuthorShow = new Route("/dashboard/authors/show/{id$regChiffre}", [
        'controller' => [
            new UsersController(), 'show'
        ],
        ['id' => "$regChiffre"],
    ]);

    $dashboardRouteAuthorEdit = new Route("/dashboard/authors/edit/{id$regChiffre}", [
        'controller' => [
            new UsersController(), 'edit'
        ],
        ['id' => "$regChiffre"],
    ]);

    $dashboardRouteAuthorCreate = new Route('/dashboard/authors/new', [
        'controller' => [
            new UsersController(), 'create'
        ]
    ]);

    $routeCollection = new RouteCollection;
    $routeCollection->add('accueil', $accueilRoute);
    $routeCollection->add('contact', $contactRoute);
    $routeCollection->add('blog', $blogRoute);
    $routeCollection->add('article', $articleRoute);
    $routeCollection->add('login', $loginRoute);
    // $routeCollection->add('signup', $signupRoute);
    // $routeCollection->add('stat', $dashboardRouteStat);
    $routeCollection->add('articlesManagement', $dashboardRouteArticleMan);
    $routeCollection->add('addArticle', $dashboardRouteArticleAdd);
    $routeCollection->add('editArticle', $dashboardRouteArticleEdit);
    // $routeCollection->add('usersManagement', $dashboardRouteAuthorMan);
    $routeCollection->add('authorShow', $dashboardRouteAuthorShow);
    $routeCollection->add('authorEdit', $dashboardRouteAuthorEdit);
    $routeCollection->add('authorCreate', $dashboardRouteAuthorCreate);
    $routeCollection->add('err404', $err404Route);


    $pathInfo = $_SERVER['PATH_INFO'] ?? "/";
    $urlMatcher = new UrlMatcher($routeCollection, new RequestContext());

    $currentRoute = $urlMatcher->match($pathInfo);
    $urlGenerator = new UrlGenerator($routeCollection, new RequestContext());
    
    $currentRoute['urlGenerator'] = $urlGenerator;
    
    $controller = $currentRoute['controller'];

    call_user_func($controller, $currentRoute);
}catch(ResourceNotFoundException $e){
    header('location:/err/404');
}