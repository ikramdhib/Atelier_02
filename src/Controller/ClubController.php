<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    #[Route('/club', name: 'app_club')]
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    #[Route('/club/get/{nom}', name :'getname')]
    public function getName($nom) : Response {

        return $this->render('club/detail.html.twig' ,[
        'name' => $nom,
    ]); 
 
    }
}
