<?php

namespace App\Controller;

use App\Entity\Conference;
use App\Entity\Exhibition;
use App\Entity\Seminar;
use App\Entity\Session;
use App\Entity\Workshop;
use App\Repository\ConferenceRepository;
use App\Repository\SeminarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api')]
class ApiController extends AbstractController
{
    private $conferences;
    private $seminars;

    public function __construct(ConferenceRepository $conferences, SeminarRepository $seminars)
    {
        $this->conferences = $conferences;
        $this->seminars = $seminars;
    }

    #[Route('/', name: '_all', methods: ['GET'])]
    public function getAll(): JsonResponse
    {
        $conferences = $this->conferences->findAll();
        $seminars = $this->seminars->findAll();

        $conferences_response = $this->getConferences($conferences);
        $seminars_response = $this->getSeminars($seminars);

        $response = ['conferences' => $conferences_response, 'seminars' => $seminars_response];

        return $this->json($response);
    }
    //Api endpoint for the front page
    #[Route('/front', name: 'api_front', methods: ['GET'])]
    public function getFrontData(): JsonResponse
    {
        $conferences = $this->conferences->findAll();
        $seminars = $this->seminars->findAll();

        $conferences_response = $this->getConferencesFrontData($conferences);
        $seminars_response = $this->getSeminarsFrontData($seminars);

        $response = ['conferences' => $conferences_response, 'seminars' => $seminars_response];

        return $this->json($response);
    }

    private function getConferencesFrontData($conferences)
    {
        $response = [];

        foreach ($conferences as $conference) {
            $response[] = [
                'id' => $conference->getId(),
                'title' => $conference->getTitle(),
                'start_at' => $conference->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $conference->getEndAt()->format('Y-m-d H:i:s'),
            ];
        }

        return $response;
    }

    private function getSeminarsFrontData($seminars)
    {
        $response = [];

        foreach ($seminars as $seminar) {
            $response[] = [
                'id' => $seminar->getId(),
                'title' => $seminar->getTitle(),
                'start_at' => $seminar->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $seminar->getEndAt()->format('Y-m-d H:i:s'),
            ];
        }

        return $response;
    }


    #[Route('/conferences', name: '_all_conferences', methods: ['GET'])]
    public function getAllConferences(): JsonResponse
    {
        $conferences = $this->conferences->findAll();
        $response = $this->getConferences($conferences);

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

    #[Route('/seminars', name: 'api_seminars_all', methods: ['GET'])]
    public function getAllSeminars(): JsonResponse
    {
        $seminars = $this->seminars->findAll();
        $response = $this->getSeminars($seminars);

        return $this->json($response);
    }

    #[Route('/seminars/{id}', name: 'api_one', methods: ['GET'])]
    public function oneSeminar($id): JsonResponse
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

    private function getConferences($conferences)
    {
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

        return $response;
    }

    private function getSeminars($seminars)
    {
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

        return $response;
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
                'speakers' => $this->getSpeakersByWorkshop($workshop),
                'attendees' => $this->getAttendeesByWorkshop($workshop)
            ];
        }

        return $workshops;
    }

    private function getAttendeesByWorkshop(Workshop $workshop)
    {
        $attendees = [];

        foreach ($workshop->getWorkshopAttendees() as $workshopAttendee) {
            $attendee = $workshopAttendee->getAttendee();
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

    private function getSpeakersBySeminar(Seminar $seminar)
    {
        $speakers = [];

        foreach ($seminar->getSessions() as $session) {
            $speakers[] = $this->getSpeakersBySession($session);
        }

        return $speakers;
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
}
