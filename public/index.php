<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;


    require "../vendor/autoload.php";

// Créer l’application Slim
$app = new \Slim\App();

// Créer une route avec un traitement
$app->get('/hello', function (RequestInterface $request, ResponseInterface $response, $args) {
    $response->getBody()->write('<h1>Hello !</h1>');
});

// Lancer l’application
$app->run();