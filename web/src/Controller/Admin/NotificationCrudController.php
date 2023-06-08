<?php

namespace App\Controller\Admin;

use App\Entity\Notification;
use App\Mailer\Texter;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Notifier\TexterInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class NotificationCrudController extends AbstractCrudController
{
    private $texterInterface;

    public function __construct(TexterInterface $texterInterface)
    {
        $this->texterInterface = $texterInterface;
    }

    public static function getEntityFqcn(): string
    {
        return Notification::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Notification')
            ->setEntityLabelInPlural('Notifications');
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('event');
        yield TextField::new('message');
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityManager->persist($entityInstance);
        $entityManager->flush();
        $texter = new Texter($this->texterInterface);
        $texter->sendNotification($entityInstance);
    }
}
