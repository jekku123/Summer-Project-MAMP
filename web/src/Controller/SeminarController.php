<?php

namespace App\Controller;

use App\Entity\Seminar;
use App\Entity\Session;
use App\Repository\SeminarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api')]
class SeminarController extends AbstractController
{
    private $seminars;

    public function __construct(SeminarRepository $seminars)
    {
        $this->seminars = $seminars;
    }
    #[Route('/seminars', name: 'api_seminars_all', methods: ['GET'])]
    public function getAllSeminars(): JsonResponse
    {
      $seminars = $this->seminars->findAll();
      $response = [];

      foreach ($seminars as $seminar) {
          $response[] = [
              'id' => $seminar->getId(),
              'title' => $seminar->getTitle(),
              'description' => $seminar->getDescription(),
              'location' => $seminar->getLocation(),
              'image' => $seminar->getImage(),
              'start_at' => $seminar->getStartAt()->format('Y-m-d H:i:s'),
              'end_at' => $seminar->getEndAt()->format('Y-m-d H:i:s'),
              'speakers' => $this->getSpeakersBySeminar($seminar),
              'sessions' => $this->getSessionsBySeminar($seminar),
          ];
      }

      return $this->json($response);
  }

  #[Route('/seminars/{id}', name: 'api_one', methods: ['GET'])]
    public function getOneConfrence($id): JsonResponse
    {
        $seminar = $this->seminars->find($id);

        if (!$seminar) {
            return $this->json('Nothing found with id: ' . $id, 400);
        }

        $response[] = [
            'id' => $seminar->getId(),
            'title' => $seminar->getTitle(),
            'description' => $seminar->getDescription(),
            'location' => $seminar->getLocation(),
            'image' => $seminar->getImage(),
            'start_at' => $seminar->getStartAt()->format('Y-m-d H:i:s'),
            'end_at' => $seminar->getEndAt()->format('Y-m-d H:i:s'),
            'speakers' => $this->getSpeakersBySeminar($seminar),
            'sessions' => $this->getSessionsByseminar($seminar)
        ];

        return $this->json($response);
    }
    private function getSessionsBySeminar(Seminar $seminar)
    {
        $sessions = [];

        foreach ($seminar->getSessions() as $session) {
            $sessions[] = [
                'id' => $session->getId(),
                'title' => $session->getTitle(),
                'description' => $session->getDescription(),
                'location' => $session->getLocation(),
                'start_at' => $session->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $session->getEndAt()->format('Y-m-d H:i:s'),
                'speakers' => $this->getSpeakersBySession($session),
            ];
        }

        return $sessions;
    }
    private function getSpeakersBySeminar(Seminar $seminar)
    {
        $speakers = [];

        foreach ($seminar->getSpeakers() as $speaker) {
            $speakers[] = [
                'id' => $speaker->getId(),
                'firstname' => $speaker->getFirstname(),
                'lastname' => $speaker->getLastname(),
                'bio' => $speaker->getBio(),
                'organization' => $speaker->getOrganization(),
            ];
        }

        return $speakers;
    }
    private function getSpeakersBySession(Session $session)
    {
        $speakers = [];

        foreach ($session->getSessionSpeakers() as $sessionSpeaker) {
            $speaker = $sessionSpeaker->getSpeaker();
            $speakers[] = [
                'id' => $speaker->getId(),
                'firstname' => $speaker->getFirstname(),
                'lastname' => $speaker->getLastname(),
                'bio' => $speaker->getBio(),
                'organization' => $speaker->getOrganization(),
            ];
        }

        return $speakers;
    }
}