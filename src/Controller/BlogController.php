<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

// Ici on travaille sur les paramètres du routing

//En mettant cette route ici, je préfixe toutes les rpoutes qui seront à l'intéreieur de mon controller
/**
 * @Route("/blog", name="blog", requirements={"_locale" : "fr|en"})
 */
class BlogController extends AbstractController
{
    // Symfony vérifie que la Route est bonne mais également la method et ne fera que l'action qui correspond
    // Un REQUIREMENTS va controller le paramètre passé en {id_post} et le regex va contrôler qu'il correspons bien à ce que l'on veut, ici un int
    /**
     * @Route("/{_locale}/posts/{id_post}",
     *     methods={"POST", "PATCH"},
     *     requirements={"id_post"="\d+"})
     */
    public function savePost (int $id_post)
    {
        return new Response('<body>On sauvegarde l\'article n° '.$id_post.'</body>');
    }

    // Il est possible de forcer le format d'une réponse avec _format si le format est spécifié dans l'url. Ici le format de sortie sera html ou json
    // Il est également possible de gérer l'affiochage dans une autre langue grâce au slug _locale. Les langues acceptées suront dipo dans le requirements et il y a une fonction de traduction dans symfony

    /**
     * @Route("/{_locale}/posts/{id_post}",
     *     methods={"GET"},
     *     requirements={"id_post"="\d+"})
     */
    public function showPost (int $id_post)
    {
        // Ici je génere une url absolue de ma vue
        $url =  new Response($this->generateUrl('blogapp_blog_showpost', ['id_post' => $id_post], RouterInterface::ABSOLUTE_URL));

        return $this->render('posts.html.twig', ['url' => $url,]);
    }
}
