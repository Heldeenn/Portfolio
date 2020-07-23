<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Technology;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('dateStart', DateType::class, [
                'label' => 'Date de début'
            ])
            ->add('dateEnd', DateType::class, [
                'label' => 'Date de fin'
                ])
            ->add('description', TextareaType::class)
            ->add('client')
            ->add('github')
            ->add('website')
            ->add('thumbnailFile', VichImageType::class, [
                'label' => 'Image à télécharger',
                'help'=> 'Le fichier ne doit pas dépasser '. Project::MAX_SIZE,
                'required' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'download_link' => false,
                'delete_label'  => 'Supprimer cette image',
            ])
            ->add('technologies', EntityType::class, [
                'class' => Technology::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false,
            ])
            ->add('images', null, [
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
