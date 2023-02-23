<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="hompage")
     */
    public function index() : Response
    {
       $message = 'Hello David!';

        return $this->render('base.html.twig', ['message' => $message,]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function test() : Response
    {
        $message = 'Ceci est un test!';

        return $this->render('base.html.twig', ['message' => $message,]);
    }

    // Utilisation des slugs
    /**
     * @Route("/slug/{slug}")
     */
    public function slug($slug) : Response
    {
        // Le nom de la fonction n'a pas d'importance, le slug affiché dans l'url sera automatiquement enregistré dans la variable passée à la fonction, ici $slug
        return $this->render('base.html.twig', ['message' => $slug,]);
    }

}
