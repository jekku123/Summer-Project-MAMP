<?php

namespace App\Controller\Admin;

use App\Entity\Invite;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Mailer\MailerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class InviteCrudController extends AbstractCrudController
{
    private $mailerInterface;

    public function __construct(MailerInterface $mailerInterface)
    {
        $this->mailerInterface = $mailerInterface;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
          ->setEntityLabelInSingular('Invite')
            ->setEntityLabelInPlural('Invites');
    }
    public static function getEntityFqcn(): string
    {
        return Invite::class;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $entityManager->persist($entityInstance);
        $entityManager->flush();
        $mailer = new Mailer($this->mailerInterface);
        $mailer->sendInvite($entityInstance);
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('event');
        yield TextField::new('email');
    }
}
