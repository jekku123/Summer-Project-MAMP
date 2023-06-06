<?php

namespace App\Controller\Admin;

use App\Entity\Attendee;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AttendeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Attendee::class;
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
