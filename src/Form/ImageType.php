<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameFile', VichImageType::class, [
                'label' => 'Image à télécharger',
                'help'=> 'Le fichier ne doit pas dépasser '. Image::MAX_SIZE,
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'download_link' => false,
                'delete_label'  => 'Supprimer cette image',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}
