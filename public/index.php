<?php

use App\Controller\ProjetController;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\App;

require "../vendor/autoload.php";

// Créer l’application Slim
$config = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];
$app = new App($config);

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(dirname(__DIR__). '/templates', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$container[ProjetController::class] = function ($container){
    return new ProjetController($container->get('view'));
};

// Créer une route avec un traitement
$route = $app->get('/', function (RequestInterface $request, ResponseInterface $response, $args) {
    return $this->view->render($response, 'home.twig');
});
$route->setName('homepage');

$app->group('/projet', function() {
    // création d'une page de detail des projets
    // Nouveauté : on ajoute une variable dans l'URL avec les ccolades
    $this->get("/{id:\d+}", ProjetController::class . ':show')->setName('app_project_show');


    $this->get("/creation", ProjetController::class . ':create')->setName('app_project_create');

});


// Lancer l’application
$app->run();
