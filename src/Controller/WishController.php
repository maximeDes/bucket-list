<?php

namespace App\Controller;

use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
