<?php

namespace App\Controller;

use App\Entity\Topic;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableauBordController extends AbstractController
{
    /**
     * @Route("/tableau/bord", name="app_tableau_bord")
     */
    public function index(): Response
    {
        /*return $this->render('tableau_bord/index.html.twig', [
            'controller_name' => 'TableauBordController',
        ]);*/
        // récupération de Doctrine: permet d'intérargir avec la DB
        $doctrine = $this->getDoctrine();
        // on récupère le "respository" Topic, qui permet de récupérer des données en DB
        $repository = $doctrine->getRepository(Topic::class);

        $topics = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'topics' => $topics
        ]);
    }
    /**
     * @Route("/tableau/bord\{id<\d+>}", methods={"GET"})
     *
     * @return void
     */
    public function annonceById(Topic $topic)
    {
        /*$topic = $this->getDoctrine()->getRepository(Annonce::class)->find($id);*/

        return $this->render('topic/show.html.twig', [
            'topic' => $topic
        ]);
    }
}
