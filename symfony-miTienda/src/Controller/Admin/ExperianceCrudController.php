<?php

namespace App\Controller\Admin;

use App\Entity\Experiance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ExperianceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experiance::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            ImageField::new('photo')->setUploadDir('/public/images')->setBasePath('/images/')
        ];
    }
}
