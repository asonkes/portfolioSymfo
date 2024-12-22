<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProjectsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('siteLink', TextType::class, [
                'label' => 'Lien du site'
            ])
            ->add('figmaLink', TextType::class, [
                'label' => 'Lien figma'
            ])
            ->add('gitLink', TextType::class, [
                'label' => 'Lien Git'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'mapped' => false
            ])
            ->add('created_at', DateType::class, [
                'label' => 'Date de création',
                'widget' => 'single_text',
                'input' => 'datetime_immutable'
            ])
            ->add('object', TextType::class, [
                'label' => 'Type de projet'
            ])
            ->add('code', TextType::class, [
                'label' => 'Code'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
