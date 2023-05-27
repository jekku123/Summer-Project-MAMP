<?php

namespace App\Controller;

use App\Entity\Conference;
use App\Entity\Exhibition;
use App\Entity\Session;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ApiController extends AbstractController
{
    #[Route('api/conferences', name: 'api_all_conferences', methods: ['GET'])]
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $conferences = $em->getRepository(Conference::class)->findAll();
        $response = [];

        foreach ($conferences as $conference) {
            $response[] = [
                'id' => $conference->getId(),
                'title' => $conference->getTitle(),
                'description' => $conference->getDescription(),
                'location' => $conference->getLocation(),
                'image' => $conference->getImage(),
                'speakers' => $this->getSpeakersByConference($conference),
                'sessions' => $this->getSessionsByConference($conference),
                'exhibitions' => $this->getExhibitionsByConference($conference),
                'attendees' => $this->getAttendeesByConference($conference),
                'start_at' => $conference->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $conference->getEndAt()->format('Y-m-d H:i:s'),
            ];
        }

        return $this->json($response);
    }

    #[Route('api/conferences/{id}', name: 'api_one_conference', methods: ['GET'])]
    public function getOne($id, EntityManagerInterface $em): JsonResponse
    {
        $conference = $em->getRepository(Conference::class)->find($id);

        if (!$conference) {
            return $this->json('Nothing found with id: ' . $id, 400);
        }

        $response[] = [
            'id' => $conference->getId(),
            'title' => $conference->getTitle(),
            'description' => $conference->getDescription(),
            'location' => $conference->getLocation(),
            'image' => $conference->getImage(),
            'speakers' => $this->getSpeakersByConference($conference),
            'attendees' => $this->getAttendeesByConference($conference),
            'sessions' => $this->getSessionsByConference($conference),
            'exhibitions' => $this->getExhibitionsByConference($conference),
            'start_at' => $conference->getStartAt()->format('Y-m-d H:i:s'),
            'end_at' => $conference->getEndAt()->format('Y-m-d H:i:s'),
        ];

        return $this->json($response);
    }

    private function getSessionsByConference(Conference $conference)
    {
        $sessions = [];

        foreach ($conference->getSessions() as $session) {
            $sessions[] = [
                'id' => $session->getId(),
                'title' => $session->getTitle(),
                'description' => $session->getDescription(),
                'location' => $session->getLocation(),
                'speakers' => $this->getSpeakersBySession($session),
                'start_at' => $session->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $session->getEndAt()->format('Y-m-d H:i:s'),
            ];
        }

        return $sessions;
    }

    private function getSpeakersByConference(Conference $conference)
    {
        $speakers = [];

        foreach ($conference->getSpeakers() as $speaker) {
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

    private function getAttendeesByConference(Conference $conference)
    {
        $attendees = [];

        foreach ($conference->getAttendees() as $attendee) {
            $attendees[] = [
                'id' => $attendee->getId(),
                'firstname' => $attendee->getFirstname(),
                'lastname' => $attendee->getLastname(),
                'email' => $attendee->getEmail(),
                'phone' => $attendee->getPhone(),
                'registered' => $attendee->getRegisteredAt()->format('Y-m-d H:i:s'),
            ];
        }

        return $attendees;
    }

    private function getExhibitionsByConference(Conference $conference)
    {
        $exhibitions = [];

        foreach ($conference->getExhibitions() as $exhibition) {
            $booths = $this->getBoothsByExhibition($exhibition);
            $exhibitions[] = [
                'id' => $exhibition->getId(),
                'title' => $exhibition->getTitle(),
                'description' => $exhibition->getDescription(),
                'location' => $exhibition->getLocation(),
                'start_at' => $exhibition->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $exhibition->getEndAt()->format('Y-m-d H:i:s'),
                'booths' => $booths,
            ];
        }

        return $exhibitions;
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

    private function getBoothsByExhibition(Exhibition $exhibition)
    {
        $booths = [];

        foreach ($exhibition->getBooths() as $booth) {
            $company = $booth->getCompany();
            $booths[] = [
                'id' => $booth->getId(),
                'booth_number' => $booth->getBoothNumber(),
                'title' => $booth->getTitle(),
                'description' => $booth->getDescription(),
                'company' => [
                    'id' => $company->getId(),
                    'name' => $company->getName(),
                    'description' => $company->getDescription(),
                    'website' => $company->getWebsite(),
                ],
            ];
        }

        return $booths;
    }
}
