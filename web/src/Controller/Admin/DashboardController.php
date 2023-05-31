<?php

namespace App\Controller\Admin;

use App\Entity\Conference;
use App\Entity\Seminar;
use App\Entity\Session;
use App\Entity\Exhibition;
use App\Entity\Booth;
use App\Entity\Company;
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
            ->setTitle('Events');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Conferences', 'fas fa-map-marker-alt', Conference::class);
        yield MenuItem::linkToCrud('Sessions', 'fas fa-map-marker-alt', Session::class);
        yield MenuItem::linkToCrud('Exhibitions', 'fas fa-map-marker-alt', Exhibition::class);
        yield MenuItem::linkToCrud('Booths', 'fas fa-map-marker-alt', 
        Booth::class);
        yield MenuItem::linkToCrud('Companies', 'fas fa-map-marker-alt', 
        Company::class);
    }
}
