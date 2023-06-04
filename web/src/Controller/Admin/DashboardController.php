<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Entity\Session;
use App\Entity\Booth;
use App\Entity\Company;
use App\Entity\Workshop;
use App\Entity\Speaker;
use App\Entity\Exhibition;
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
            ->setTitle('BC Helsinki events');
    }

    public function configureMenuItems(): iterable
    {   
    
      yield MenuItem::linkToCrud('Events', 'fas fa-map-marker-alt', Event::class);
      yield MenuItem::linkToCrud('Exhibitions', 'fas fa-map-marker-alt', Exhibition::class);
      yield MenuItem::linkToCrud('Booths', 'fas fa-map-marker-alt', Booth::class);
      yield MenuItem::linkToCrud('Companies', 'fas fa-map-marker-alt', 
          Company::class);
        
    }
}
