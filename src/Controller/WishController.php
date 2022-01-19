<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\WishRepository;
use App\services\Censurator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wish", name="wish_")
 *
 */
class WishController extends AbstractController
{
    /**
     * @Route("", name="list")
     */
    public function list(WishRepository $wishRepository): Response
    {
          $wish = $wishRepository->findBy([], ['dateCreated' => 'DESC']);
//        $wish = $wishRepository->findBestWish();

        return $this->render('wish/list.html.twig', [
            "wishs" => $wish
        ]);
    }

    /**
     * @Route("/details/{id}", name="details", requirements={"id"="\d+"})
     */
    public function details(int $id, WishRepository $wishRepository): Response
    {
        $wish = $wishRepository->find($id);

        return $this->render('wish/details.html.twig', [
            "wish" => $wish,
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request, EntityManagerInterface $entityManager, Censurator $censurator): Response
    {
                // créer une instance de mon entité
                $wish = new Wish();
                $wish->setIsPubliched(1);
                $wish->setDateCreated(new \DateTime());
                $currentUserName = $this->getUser()->getPseudo();
                $wish->setAuthor($currentUserName);

                // Créer une instance de mon formulaire
                $wishForm = $this -> createForm(WishType::class, $wish);

                // J'enregistre les valeurs du formulaire
                $wishForm->handleRequest($request);

                // Je vérifie si le formulaire est bien soumis avant d'envoyer les données a la BDD
                if ($wishForm->isSubmitted() && $wishForm->isValid()){
                    // on utilise la censure pour retiré les mots tabou de la description.
                    $wish->setDescription($censurator->purify($wish->getDescription()));

                    $entityManager->persist($wish);
                    $entityManager->flush();

                    $this->addFlash('success', 'Souhait crée avec succès.');
                    return $this->redirectToRoute('wish_details', ['id' => $wish->getId()]);
                }

        return $this->render('wish/create.html.twig', [
            'wishForm' => $wishForm->createView(),
        ]);
    }
}
