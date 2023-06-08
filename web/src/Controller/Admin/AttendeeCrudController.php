<?php

namespace App\Controller\Admin;

use App\Entity\Attendee;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class AttendeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Attendee::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Attendee')
            ->setEntityLabelInPlural('Attendees');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_DETAIL, Action::EDIT);
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('event');
        yield TextField::new('firstname');
        yield TextField::new('lastname');
        yield TextField::new('email');
        yield TextField::new('phone');
        yield DateTimeField::new('registered_at')->setFormTypeOptions([
            'years' => range(date('Y'), date('Y') + 5),
            'widget' => 'single_text',
        ]);
    }
}
