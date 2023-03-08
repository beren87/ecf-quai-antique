<?php

namespace App\Controller\Admin;

use App\Entity\Restaurant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RestaurantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Restaurant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('address'),
            TextField::new('telephone'),
            TextField::new('mail'),
            TextField::new('instagram'),
            TextField::new('facebook'),
            TextField::new('twitter'),
            TextField::new('youtube'),
            IntegerField::new('maxGuests'),
        ];
    }
   
}
