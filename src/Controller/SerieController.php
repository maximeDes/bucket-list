<?php

namespace App\Controller;

use App\Entity\Wish;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/series", name="serie_demo_")
 *
 */
class SerieController extends AbstractController
{
    /**
     * @Route("", name="list")
     */
    public function list(): Response
    {
        //todo: allez chercher les séries en BDD
        return $this->render('serie/list.html.twig', [

        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id): Response
    {
        //todo: allez chercher la séries en BDD
        return $this->render('serie/details.html.twig', [

        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(EntityManagerInterface $entityManager): Response
    {
/*       // créer une instance de mon entité
        $wish = new Wish();

        // hydrater tout les instances de mon entité
        $wish->setTitle('Sauter en parachute');
        $wish->setDescription('Ca doit être super de sauter en parachute.');
        $wish->setAuthor('Kevin');
        $wish->setIsPubliched(0);
        $wish->setDateCreated(new \DateTime());

        dump($wish);

        $entityManager->persist($wish);
        $entityManager->flush();

       // $entityManager->remove($wish);


        $entityManager->flush();
*/
        //todo: créer une séries a ajouté en BDD
        return $this->render('serie/create.html.twig', [

        ]);
    }
}
