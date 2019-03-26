<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 25/03/2019
 * Time: 16:56
 */
namespace App\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class ProjetController
{
    /**
     * @var Twig
     */
    private $twig;

    public function __construct(Twig $twig)
    {

        $this->twig = $twig;
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, ?array $args)
    {
        // On retourne une réponse
        //return $response->getBody()->write('<h1>Détail du projet</h1>');
        return $this->twig->render($response, 'project/show.twig');
    }
    public function create(ServerRequestInterface $request, ResponseInterface $response, ?array $args)
    {
        // On retourne une réponse
        return $response->getBody()->write('<h1>Création d\'un projet</h1>');
    }

}