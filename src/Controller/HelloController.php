<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Class HelloController
 * @package App\Controller
 */
class HelloController extends AbstractController
{
    /**
     * Devuelve un saludo personalizado
     *
     * @param string $name Nombre usado para personalizar el saludo
     * @return Response
     */
    #[Route('/hello/{name}', name: 'app_greetings')]
    public function index($name = "World"): Response
    {
        return new Response("Hello $name");
    }
}
