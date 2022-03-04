<?php

namespace App\Controller;

use App\Entity\Topic;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        // récupération de Doctrine: permet d'intérargir avec la DB
        $doctrine = $this->getDoctrine();
        // on récupère le "respository" Annonce, qui permet de récupérer des données en DB
        $repository = $doctrine->getRepository(Topic::class);

        $topics = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'topics' => $topics
        ]);
    }
    
    
}
