<?php

namespace App\Controller\Admin;

use App\Entity\Speaker;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class SpeakerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Speaker::class;
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
