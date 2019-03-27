<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 26/03/2019
 * Time: 16:54
 */

namespace App\Controller;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class AboutController
{
    /**
     * @var Twig
     */
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function about(ServerRequestInterface $request, ResponseInterface $response, ?array $args)
    {
        return $this->twig->render($response, 'about.twig');
    }

}