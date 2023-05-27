<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeminarController extends AbstractController
{
    #[Route('/seminar', name: 'app_seminar')]
    public function index(): Response
    {
        return $this->render('seminar/index.html.twig', [
            'controller_name' => 'SeminarController',
        ]);
    }
}
