<?php

namespace App\Controller;

use App\Entity\Attendee;
use App\Entity\Event;
use App\Entity\Exhibition;
use App\Repository\AttendeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/api', name: 'api_')]
class EventController extends AbstractController
{
    #[Route('/events', name: 'get_events', methods: ['GET'])]
    public function getAll(EntityManagerInterface $entityManager): Response
    {
        $repo = $entityManager->getRepository(Event::class);

        $data = $repo->createQueryBuilder('e')
            ->orderBy('e.start_at', 'DESC')
            ->getQuery()
            ->getResult();

        $events_data = $this->getEventsData($data);

        return $this->json($events_data);
    }

    #[Route('/events/{id}', name: 'get_one_event', methods: ['GET'])]
    public function getOne(Event $event): Response
    {
        $data = $this->getEventsData(array($event));
        return $this->json($data);
    }

    #[Route('/attendee', name: 'post_attendee', methods: ['POST'])]
    public function new(Request $request, AttendeeRepository $attendees, MailerInterface $mailerInterface): Response
    {
        $attendee = new Attendee();

        $attendee->setFirstName($request->request->get('firstname') ?? '');
        $attendee->setLastName($request->request->get('lastname') ?? '');
        $attendee->setEmail($request->request->get('email') ?? '');
        $attendee->setPhone($request->request->get('phone')) ?? '';

        $attendees->save($attendee, true);

        $mailer = new Mailer($mailerInterface);
        $mailer->sendEmail($attendee);

        return $this->redirectToRoute('app_home');
    }

    public function getEventsData($events): array
    {
        $data = [];
        foreach ($events as $event) {
            $data[] = [
                'id' => $event->getId(),
                'type' => $event->getType(),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'location' => $event->getLocation(),
                'image' => $event->getImage(),
                'start_at' => $event->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $event->getEndAt()->format('Y-m-d H:i:s'),
                'sessions' => $this->getSessionData($event),
                'exhibitions' => $this->getExhibitionData($event),
                'workshops' => $this->getWorkshopData($event),
                'speakers' => $this->getSpeakersData(($event))
            ];
        }
        return $data;
    }

    public function getSessionData(Event $event): array
    {
        $data = [];
        foreach ($event->getSessions() as $session) {
            $data[] = [
                'title' => $session->getTitle(),
                'description' => $session->getDescription(),
                'location' => $session->getLocation(),
                'start_at' => $session->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $session->getEndAt()->format('Y-m-d H:i:s'),
                'speakers' => $this->getSpeakersData($session)
            ];
        }
        return $data;
    }

    public function getExhibitionData(Event $event): array
    {
        $data = [];
        foreach ($event->getExhibitions() as $exhibition) {
            $data[] = [
                'title' => $exhibition->getTitle(),
                'description' => $exhibition->getDescription(),
                'location' => $exhibition->getLocation(),
                'start_at' => $exhibition->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $exhibition->getEndAt()->format('Y-m-d H:i:s'),
                'booths' => $this->getBoothsData($exhibition)
            ];
        }
        return $data;
    }

    public function getWorkshopData(Event $event): array
    {
        $data = [];
        foreach ($event->getWorkshops() as $workshop) {
            $data[] = [
                'title' => $workshop->getTitle(),
                'description' => $workshop->getDescription(),
                'location' => $workshop->getLocation(),
                'start_at' => $workshop->getStartAt()->format('Y-m-d H:i:s'),
                'end_at' => $workshop->getEndAt()->format('Y-m-d H:i:s'),
                'speakers' => $this->getSpeakersData($workshop)
            ];
        }
        return $data;
    }

    public function getSpeakersData($session): array
    {
        $data = [];
        foreach ($session->getSpeakers() as $speaker) {
            $data[] = [
                'firstname' => $speaker->getFirstname(),
                'lastname' => $speaker->getLastname(),
                'bio' => $speaker->getBio(),
                'organization' => $speaker->getOrganization(),
                'photo' => $speaker->getPhoto(),
            ];
        }
        return $data;
    }

    public function getBoothsData(Exhibition $exhibition): array
    {
        $data = [];
        foreach ($exhibition->getBooths() as $booth) {
            $data[] = [
                'booth_number' => $booth->getBoothNumber(),
                'title' => $booth->getTitle(),
                'description' => $booth->getDescription(),
                'company' =>  [
                    'name' => $booth->getCompany()->getName(),
                    'description' => $booth->getCompany()->getDescription(),
                    'website' => $booth->getCompany()->getWebsite()
                ]
            ];
        }
        return $data;
    }
}
