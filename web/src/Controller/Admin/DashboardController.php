<?php

namespace App\Controller\Admin;

use App\Entity\Attendee;
use App\Entity\Event;
use App\Entity\Session;
use App\Entity\Booth;
use App\Entity\Company;
use App\Entity\Workshop;
use App\Entity\Speaker;
use App\Entity\Exhibition;
use App\Entity\Feedback;
use App\Entity\SideEvent;
use App\Entity\Invite;
use App\Entity\Notification;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class DashboardController extends AbstractDashboardController
{
  #[Route('/admin', name: 'admin')]
  public function index(): Response
  {
    $routeBuilder = $this->container->get(AdminUrlGenerator::class);
    $url = $routeBuilder->setController(EventCrudController::class)->generateUrl();
    return $this->redirect($url);
  }

  public function configureDashboard(): Dashboard
  {
    return Dashboard::new()
      ->setTitle('BC Helsinki events!');
  }

  public function configureMenuItems(): iterable
  {
    yield MenuItem::linkToUrl('Back to home!', 'fas fa-home', 'http://localhost:8007');
    yield MenuItem::section('Manage events');
    yield MenuItem::linkToCrud('Events', 'fas fa-map-marker-alt', Event::class);
    yield MenuItem::section('Event details');
    yield MenuItem::linkToCrud('Sessions', 'fas fa-map-marker-alt', Session::class);
    yield MenuItem::linkToCrud('Workshops', 'fa-solid fa-star', Workshop::class);
    yield MenuItem::subMenu('Exhibitions', 'fas fa-map-marker-alt')
    ->setSubItems([
      MenuItem::linkToCrud('Exhibitions', 'fas fa-map-marker-alt', Exhibition::class),
      MenuItem::linkToCrud('Booths', 'fa-sharp fa-solid fa-table', Booth::class),
      MenuItem::linkToCrud('Companies', 'fa-solid fa-suitcase', Company::class),
    ]);
    yield MenuItem::linkToCrud('Side events', 'fas fa-map-marker-alt', SideEvent::class);
    yield MenuItem::section('Manage event attendees');
    yield MenuItem::linkToCrud('Speakers', 'fas fa-microphone', Speaker::class);
    yield MenuItem::linkToCrud('Attendees', 'fas fa-map-marker-alt', Attendee::class);
    yield MenuItem::section('Notifications and feedback');
    yield MenuItem::linkToCrud('Notifications', 'fas fa-map-marker-alt', Notification::class);
    yield MenuItem::linkToCrud('Feedback', 'fas fa-map-marker-alt', Feedback::class);
    yield MenuItem::section('Send invites');
    yield MenuItem::linkToCrud('Invites', 'fas fa-map-marker-alt', Invite::class);
  }
}
