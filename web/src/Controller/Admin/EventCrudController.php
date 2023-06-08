<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use App\Entity\Session;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
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
        yield CollectionField::new('sessions')->useEntryCrudForm()->onlyWhenUpdating();
        yield CollectionField::new('workshops')->useEntryCrudForm()->onlyWhenUpdating();
        yield CollectionField::new('exhibitions')->useEntryCrudForm()->onlyWhenUpdating();
        yield CollectionField::new('sideEvents')->useEntryCrudForm()->onlyWhenUpdating();
    }
}
