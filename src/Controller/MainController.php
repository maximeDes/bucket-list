<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     * */
    public function home():Response{
       return $this-> render('main/home.html.twig');

    }
    /**
     * @Route("/test", name="main_test")
     * */
    public function test():Response{

        $Series = [
            "title"=> "Big Bang Theory",
            "year"=> 2005,
            ];

        return $this-> render('main/test.html.twig', [
            "mySeries"=> $Series,
            "autreVar"=> 42,
        ]);

    }

    /**
     * @Route("/demo", name="main_demo")
     * */
    public function demo():Response{
        return $this-> render('main/demo.html.twig', [
            "autreVar"=> 42,
        ]);

    }
}