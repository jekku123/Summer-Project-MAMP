<?php

namespace App\Controller\Admin;

use App\Entity\Speaker;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class SpeakerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Speaker::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
          ->setEntityLabelInSingular('Speaker')
            ->setEntityLabelInPlural('Speakers');
    }
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('firstname');
        yield TextField::new('lastname');
        yield TextareaField::new('bio');
        yield TextField::new('organization');
        yield TextField::new('photo');
    }
}
