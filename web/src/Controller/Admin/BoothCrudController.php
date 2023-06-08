<?php

namespace App\Controller\Admin;

use App\Entity\Booth;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class BoothCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Booth::class;
    }
    public function configureCrud(Crud $crud): Crud
  {
    return $crud
        ->setEntityLabelInSingular('Booth')
        ->setEntityLabelInPlural('Booths');
  }
    
    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('exhibition');
        yield AssociationField::new('company');
        yield TextField::new('title');
        yield TextField::new('booth_number');
        yield TextareaField::new('description');
    }
   
}