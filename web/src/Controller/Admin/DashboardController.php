<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Entity\Session;
use App\Entity\Booth;
use App\Entity\Company;
use App\Entity\Workshop;
use App\Entity\Speaker;
use App\Entity\Exhibition;
use App\Entity\SideEvent;
use App\Entity\Invite;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;


use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;


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
      yield MenuItem::linkToCrud('Events', 'fas fa-map-marker-alt', Event::class);
      yield MenuItem::section('Manage speakers');
      yield MenuItem::linkToCrud('Speakers', 'fas fa-microphone', Speaker::class);
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
      yield MenuItem::section('');
      yield MenuItem::linkToCrud('Invitees', 'fas fa-map-marker-alt', Invite::class);

  }
}
