<?php

namespace App\Controller;

use App\Entity\Seminar;
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
              'end_at' => $seminar->getEndAt()->format('Y-m-d H:i:s')
          ];
      }

      return $this->json($response);
  }
}