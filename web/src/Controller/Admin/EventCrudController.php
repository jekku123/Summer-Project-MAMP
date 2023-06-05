<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureFields(string $pageName): iterable
    {

          yield ChoiceField::new('type')
          ->setChoices([
              'Conference' => 'conference',
              'Seminar' => 'seminar',
          ])
          ->allowMultipleChoices(false);

          yield TextField::new('title');
          yield TextareaField::new('description');
          yield TextField::new('location');
          yield TextField::new('image');
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
