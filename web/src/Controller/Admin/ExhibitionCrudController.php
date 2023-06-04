<?php

namespace App\Controller\Admin;

use Doctrine\ORM\EntityRepository;
use App\Entity\Event;
use App\Entity\Exhibition;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class ExhibitionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Exhibition::class;
    }

    public function configureFields(string $pageName): iterable
    {
      yield AssociationField::new('event')
      ->setFormTypeOptions([
          'query_builder' => function (EntityRepository $er) {
              return $er->createQueryBuilder('e')
                  ->andWhere('e.type = :type')
                  ->setParameter('type', Event::CONFERENCE);
          },
          'choice_label' => 'title',
      ]);
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
