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
            'start_at' => $conference->getStartAt()->format('Y-m-d H:i:s'),
            'end_at' => $conference->getEndAt()->format('Y-m-d H:i:s'),
            'exhibitions' => [],
            'sessions' => [],
            'speakers' => []
      ];
      foreach ($conference->getConferenceSpeakers() as $conferenceSpeaker) {
        $speakerData = [
            'id' => $conferenceSpeaker->getSpeaker()->getId(),
            'firstname' => $conferenceSpeaker->getSpeaker()->getFirstname(),
            'lastname' => $conferenceSpeaker->getSpeaker()->getLastname(),
            'bio' => $conferenceSpeaker->getSpeaker()->getBio(),
            'organization' => $conferenceSpeaker->getSpeaker()->getOrganization(),
        ];
        $conferenceData['speakers'][] = $speakerData;
    }
      foreach ($conference->getSessions() as $session) {
          $sessionData = [
            'id' => $session->getId(),
            'title' => $session->getTitle(),
            'description' => $session->getDescription(),
            'location' => $session->getLocation(),
            'start_at' => $session->getStartAt()->format('Y-m-d H:i:s'),
            'end_at' => $session->getEndAt()->format('Y-m-d H:i:s'),
            'speakers' => []
        ];
        foreach ($session->getSpeaker() as $sessionSpeaker) {
          $speakerData = [
              'id' => $sessionSpeaker->getSpeaker()->getId(),
              'firstname' => $sessionSpeaker->getSpeaker()->getFirstname(),
              'lastname' => $sessionSpeaker->getSpeaker()->getLastname(),
              'bio' => $sessionSpeaker->getSpeaker()->getBio(),
              'organization' => $sessionSpeaker->getSpeaker()->getOrganization(),
          ];
          $sessionData['speakers'][] = $speakerData;
      }
        $conferenceData['sessions'][] = $sessionData;
      }
      foreach ($conference->getEvents() as $event) {
          $eventData = [
            'id' => $event->getId(),
            'title' => $event->getTitle(),
            'description' => $event->getDescription(),
            'location' => $event->getLocation(),
            'start_at' => $event->getStartAt()->format('Y-m-d H:i:s'),
            'end_at' => $event->getEndAt()->format('Y-m-d H:i:s')
        ];
        
        $conferenceData['events'][] = $eventData;
      }
      foreach ($conference->getExhibitions() as $exhibition) {
        $exhibitionData = [
          'id' => $exhibition->getId(),
          'title' => $exhibition->getTitle(),
          'description' => $exhibition->getDescription(),
          'location' => $exhibition->getLocation(),
          'start_at' => $exhibition->getStartAt()->format('Y-m-d H:i:s'),
          'end_at' => $exhibition->getEndAt()->format('Y-m-d H:i:s'),
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
                'description' => $booth->getCompany()->getDescription(),
                'website' => $booth->getCompany()->getWebsite()
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
            'start_at' => $conference->getStartAt()->format('Y-m-d H:i:s'),
            'end_at' => $conference->getEndAt()->format('Y-m-d H:i:s'),
        ];
        }
        
        return $this->json($data);
    }
}