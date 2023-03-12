<?php

namespace App\Controller\Admin;

use App\Entity\Dishe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextAreaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminbundle\Config\Crud;

class DisheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dishe::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextAreaField::new('description'),
            NumberField::new('price', 'Prix'),
            TextField::new('category', 'Catégories')->hideOnForm(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['category'=>'ASC']);
    }
    
}
