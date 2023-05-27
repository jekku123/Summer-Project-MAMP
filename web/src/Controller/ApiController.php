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

// all the detailed data needed for the single conference page

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
      foreach ($conference->getSessions() as $session) {
          $sessionData = [
            'id' => $session->getId(),
            'title' => $session->getTitle(),
            'description' => $session->getDescription(),
            'location' => $session->getLocation(),
            'start_at' => $session->getStartAt(),
            'end_at' => $session->getEndAt(),
        ];
        $conferenceData['sessions'][] = $sessionData;
      }
      foreach ($conference->getExhibitions() as $exhibition) {
        $exhibitionData = [
          'id' => $exhibition->getId(),
          'title' => $exhibition->getTitle(),
          'description' => $exhibition->getDescription(),
          'location' => $exhibition->getLocation(),
          'start_at' => $exhibition->getStartAt(),
          'end_at' => $exhibition->getEndAt(),
      ];
        foreach ($exhibition->getBooths() as $booth) {
          $boothData = [
            'id' => $booth->getId(),
            'title' => $booth->getTitle(),
            'booth_number' => $booth->getBoothNumber(),
            'description' => $booth->getDescription(),
            'company' => [
                'id' => $booth->getCompany()->getId(),
                'name' => $booth->getCompany()->getName(),
            ],
        ];
        $exhibitionData['booths'][] = $boothData;
        }
      $conferenceData['exhibitions'][] = $exhibitionData;
    }
    $data[] = $conferenceData;
  }
    return $this->json($data);
}
   
// separate route for just basic informtion for the front page

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