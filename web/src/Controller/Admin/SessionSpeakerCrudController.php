<?php

namespace App\Controller\Admin;

use App\Entity\SessionSpeaker;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class SessionSpeakerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SessionSpeaker::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
          yield AssociationField::new('speaker'),
          yield AssociationField::new('session')
        ];
    }
   
}
