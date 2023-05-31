<?php

namespace App\Controller;

use App\Entity\Conference;
use App\Entity\Exhibition;
use App\Entity\Session;
use App\Entity\Workshop;
use App\Repository\ConferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api')]
class ConferenceController extends AbstractController
{
    private $conferences;

    public function __construct(ConferenceRepository $conferences)
    {
        $this->conferences = $conferences;
    }

    #[Route('/conferences', name: '_all_conferences', methods: ['GET'])]
    public function getAllConferences(): JsonResponse
    {
        $conferences = $this->conferences->findAll();
        $response = [];

        foreach ($conferences as $conference) {
            $response[] = [
                'id' => $conference->getId(),
                'title' => $conference->getTitle(),
                'description' => $conference->getDescription(),
                'location' => $conference->getLocation(),
                'image' => $conference->getImage(),
                'start_at' => $conference->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $conference->getEndAt()->format('Y-m-d H:i:s'),
                'speakers' => $this->getSpeakersByConference($conference),
                'sessions' => $this->getSessionsByConference($conference),
                'workshops' => $this->getWorkshopsByConference($conference),
                'exhibitions' => $this->getExhibitionsByConference($conference),
                'attendees' => $this->getAttendeesByConference($conference),
            ];
        }

        return $this->json($response);
    }

    #[Route('/conferences/{id}', name: '_one_conference', methods: ['GET'])]
    public function getOneConfrence($id): JsonResponse
    {
        $conference = $this->conferences->find($id);

        if (!$conference) {
            return $this->json('Nothing found with id: ' . $id, 400);
        }

        $response[] = [
            'id' => $conference->getId(),
            'title' => $conference->getTitle(),
            'description' => $conference->getDescription(),
            'location' => $conference->getLocation(),
            'image' => $conference->getImage(),
            'start_at' => $conference->getStartAt()->format('Y-m-d H:i:s'),
            'end_at' => $conference->getEndAt()->format('Y-m-d H:i:s'),
            'speakers' => $this->getSpeakersByConference($conference),
            'sessions' => $this->getSessionsByConference($conference),
            'workshops' => $this->getWorkshopsByConference($conference),
            'exhibitions' => $this->getExhibitionsByConference($conference),
            'attendees' => $this->getAttendeesByConference($conference),
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
                'start_at' => $session->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $session->getEndAt()->format('Y-m-d H:i:s'),
                'speakers' => $this->getSpeakersBySession($session),
            ];
        }

        return $sessions;
    }

    private function getWorkshopsByConference(Conference $conference)
    {
        $workshops = [];

        foreach ($conference->getWorkshops() as $workshop) {
            $workshops[] = [
                'id' => $workshop->getId(),
                'title' => $workshop->getTitle(),
                'description' => $workshop->getDescription(),
                'location' => $workshop->getLocation(),
                'start_at' => $workshop->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $workshop->getEndAt()->format('Y-m-d H:i:s'),
                'speakers' => $this->getSpeakersByWorkshop($workshop)
            ];
        }

        return $workshops;
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
            ];
        }

        return $attendees;
    }

    private function getExhibitionsByConference(Conference $conference)
    {
        $exhibitions = [];

        foreach ($conference->getExhibitions() as $exhibition) {
            $exhibitions[] = [
                'id' => $exhibition->getId(),
                'title' => $exhibition->getTitle(),
                'description' => $exhibition->getDescription(),
                'location' => $exhibition->getLocation(),
                'start_at' => $exhibition->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $exhibition->getEndAt()->format('Y-m-d H:i:s'),
                'booths' => $this->getBoothsByExhibition($exhibition),
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

    private function getSpeakersByWorkshop(Workshop $workshop)
    {
        $speakers = [];

        foreach ($workshop->getWorkshopSpeakers() as $workshopSpeaker) {
            $speaker = $workshopSpeaker->getSpeaker();
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

    private function getSpeakersByConference(Conference $conference)
    {
        $speakers = [];

        foreach ($conference->getSessions() as $session) {
            $speakers[] = $this->getSpeakersBySession($session);
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
