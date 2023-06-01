<?php

namespace App\Controller\Admin;

use App\Entity\Conference;
use App\Entity\Seminar;
use App\Entity\Session;
use App\Entity\Exhibition;
use App\Entity\Booth;
use App\Entity\Company;
use App\Entity\Workshop;
use App\Entity\Speaker;
use App\Entity\SessionSpeaker;
use App\Entity\WorkshopSpeaker;
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
        $url = $routeBuilder->setController(ConferenceCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BC Helsinki events');
    }

    public function configureMenuItems(): iterable
    {   
        yield MenuItem::section('Events');
        yield MenuItem::linkToCrud('Conferences', 'fas fa-map-marker-alt', Conference::class);
        yield MenuItem::linkToCrud('Seminars', 'fas fa-map-marker-alt', Seminar::class);
        yield MenuItem::section('Manage speakers');
        yield MenuItem::linkToCrud('Speakers', 'fas fa-microphone', 
        Speaker::class);
        yield MenuItem::section('Event details');
        yield MenuItem::subMenu('Conferences')->setSubItems([
          MenuItem::linkToCrud('Sessions', 'fas fa-map-marker-alt', Session::class),
          MenuItem::linkToCrud('Session Speakers', 'fas fa-microphone', SessionSpeaker::class),
          MenuItem::section(''),
          MenuItem::linkToCrud('Exhibitions', 'fas fa-map-marker-alt', Exhibition::class),
          MenuItem::linkToCrud('Companies', 'fas fa-map-marker-alt', 
          Company::class),
          MenuItem::linkToCrud('Booths', 'fas fa-map-marker-alt', 
          Booth::class),
          MenuItem::section(''),
          MenuItem::linkToCrud('Workshops', 'fas fa-map-marker-alt', 
          Workshop::class),
          MenuItem::linkToCrud('Workshop Speakers', 'fas fa-microphone', 
          WorkshopSpeaker::class)
      ]);
        yield MenuItem::subMenu('Seminars')->setSubItems([
          MenuItem::linkToCrud('Sessions', 'fas fa-map-marker-alt', Session::class),
          MenuItem::linkToCrud('Session Speakers', 'fas fa-microphone', SessionSpeaker::class),
        ]);
    }
}
