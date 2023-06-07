<?php

namespace App\Controller\Admin;

use App\Entity\SideEvent;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SideEventCrudController extends AbstractCrudController
{
  public static function getEntityFqcn(): string
  {
    return SideEvent::class;
  }

  public function configureFields(string $pageName): iterable
  {
    yield AssociationField::new('event');
    yield TextField::new('title');
    yield TextareaField::new('description');
    yield TextField::new('location');
    yield DateTimeField::new('start_at')->setFormTypeOptions([
      'years' => range(date('Y'), date('Y') + 5),
      'widget' => 'single_text',
    ]);
    yield DateTimeField::new('end_at')->setFormTypeOptions([
      'years' => range(date('Y'), date('Y') + 5),
      'widget' => 'single_text',
    ]);
  }
}
