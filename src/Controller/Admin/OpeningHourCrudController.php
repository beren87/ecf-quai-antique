<?php

namespace App\Controller\Admin;

use App\Entity\OpeningHour;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OpeningHourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningHour::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('days', 'Jours d\'ouvertures'),
            TextField::new('hours', 'Heures d\'ouverture'),
            
        ];
    }
    
}
