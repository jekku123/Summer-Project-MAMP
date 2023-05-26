<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Conference;

#[Route('/api', name: 'api_main')]
class ApiController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('/', name: 'getAllData', methods: ['GET'])]
    public function getAllData(): Response
    {
        $conferences = $this->doctrine->getRepository(Conference::class)->findAll();
        
        $data = [];
        foreach ($conferences as $conference) {
            $data[] = [
                'id' => $conference->getId(),
                'title' => $conference->getTitle(),
                'description' => $conference->getDescription(),
                'location' => $conference->getlocation(),
            ];
        }
        
        return $this->json($data);
    }
}