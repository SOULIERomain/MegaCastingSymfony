<?php

namespace App\Controller;

use App\Entity\Metier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(EntityManagerInterface  $entityManager): Response
    {
        $m = new Metier();
        $m->setDescription("Un super métier");
        $m->setLibelle("Danseur");

        $entityManager->persist($m);

        $entityManager->flush();

        return new Response("Coucou");
//        return $this->render('home/index.html.twig', [
//            'controller_name' => 'HomeController',
//        ]);
    }
}
