<?php

namespace App\Controller\Admin;

use App\Entity\Invite;
use App\Mailer\Mailer;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Mailer\MailerInterface;


class InviteCrudController extends AbstractCrudController
{
    private $mailerInterface;

    public function __construct(MailerInterface $mailerInterface)
    {
        $this->mailerInterface = $mailerInterface;
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

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
