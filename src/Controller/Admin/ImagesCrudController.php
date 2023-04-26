<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use Aws\S3\S3Client;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }
   

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextareaField::new('description'),
            AssociationField::new('categorie'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('file', 'galeries')->setBasePath('/uploads/galeries')->onlyOnIndex(),
                
        ]; 
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud    
            ->setPageTitle('new', 'Attention à la taille de la photo importer');
    }
    
    public function uploadToS3($file, $bucketName, $objectName)
    {
        // Configure le client S3
        $s3Client = new S3Client([
            'version' => 'latest',
            'region'  => 'us-east-2',
            'credentials' => [
                'key'    => $_ENV['AWS_ACCESS_KEY_ID'],
                'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
            ],
        ]);
        
        // Envoie le fichier à S3
        $result = $s3Client->putObject([
            'Bucket' => $_ENV['S3_BUCKET_NAME'],
            'Key' => $objectName,
            'Body' => fopen($file, 'r'),
            'ACL' => 'public-read'
        ]);
        
        // Retourne l'URL de l'image sur S3
        return $result['ObjectURL'];
    }
    
    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        $uploadedFile = $entityInstance->getImageFile();
        
        if ($uploadedFile) {
            // Génère un nom unique pour le fichier
            $fileName = md5(uniqid()).'.'.$uploadedFile->guessExtension();
            
            // Déplace le fichier dans le dossier temporaire
            $uploadedFile->move(
                $this->getParameter('kernel.project_dir').'/public'.$_ENV['GALERIE_IMAGES_PATH'],
                $fileName
            );
            
            // Envoie le fichier à S3 et récupère son URL
            $s3Url = $this->uploadToS3(
                $this->getParameter('kernel.project_dir').'/public'.$_ENV['GALERIE_IMAGES_PATH'].'/'.$fileName,
                $_ENV['S3_BUCKET_NAME'],
                $fileName
            );
            
            // Définit l'URL de l'image dans l'entité
            $entityInstance->setFile($s3Url);
        }
        
        parent::persistEntity($em, $entityInstance);
    }
}
