<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id','Identifiant')->hideOnForm(),
            TextField::new('email')->hideOnForm(),
            TextField::new('password')->hideOnIndex()->hideOnForm(),
            TextField::new('lastname', 'Nom')->hideOnForm(),
            TextField::new('firstname', 'Prénom')->hideOnForm(),
            TextField::new('city', 'ville')->hideOnForm(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['id'=>'DESC'])
            ->setPageTitle('index', 'Utilisateurs ayant crée un compte');
            //->setTimezone('h:mm x');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::DELETE, Action::NEW)
            ->disable(Action::DELETE, Action::EDIT)
            ->disable(Action::DELETE, Action::DELETE);
    }
    
}
