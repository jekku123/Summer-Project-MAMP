<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Conference;
use App\Entity\Speaker;
use App\Entity\Exhibition;

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
      $conferenceData = [
            'id' => $conference->getId(),
            'title' => $conference->getTitle(),
            'description' => $conference->getDescription(),
            'location' => $conference->getLocation(),
            'start_at' => $conference->getStartAt(),
            'end_at' => $conference->getEndAt(),
            'exhibitions' => [],
      ];
   
      foreach ($conference->getExhibitions() as $exhibition) {
          $exhibitionData = [
            'id' => $exhibition->getId(),
            'title' => $exhibition->getTitle(),
            'description' => $exhibition->getDescription(),
            'location' => $exhibition->getLocation(),
            'start_at' => $exhibition->getStartAt(),
            'end_at' => $exhibition->getEndAt(),
        ];

      $conferenceData['exhibitions'][] = $exhibitionData;
    }
    $data[] = $conferenceData;
  }
    return $this->json($data);
}
    #[Route('/conference', name: 'getAllConferences', methods: ['GET'])]
    public function getAllConferences(): Response
    {
        $conferences = $this->doctrine->getRepository(Conference::class)->findAll();
        
        $data = [];
        foreach ($conferences as $conference) {
          $data['conferences'][] = [
            'id' => $conference->getId(),
            'title' => $conference->getTitle(),
            'description' => $conference->getDescription(),
            'location' => $conference->getLocation(),
            'start_at' => $conference->getStartAt(),
            'end_at' => $conference->getEndAt(),
        ];
        }
        
        return $this->json($data);
    }
}