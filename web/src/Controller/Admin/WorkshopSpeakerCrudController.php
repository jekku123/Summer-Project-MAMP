<?php

namespace App\Controller\Admin;

use App\Entity\WorkshopSpeaker;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class WorkshopSpeakerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WorkshopSpeaker::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
          yield AssociationField::new('speaker'),
          yield AssociationField::new('workshop')
        ];
    }
   
}
