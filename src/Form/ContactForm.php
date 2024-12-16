<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Nom',

                'attr' => [
                    'class' => 'contactInput',
                    'placeholder' => 'Veuillez indiquer votre nom...'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre nom n'a pas été complété"
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom doit comporter au moins {{ limit }} caractères.',
                        'max' => 50,
                        'maxMessage' => 'Votre nom de peut pas dépasser {{ limit }} caractères.',
                    ])
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'contactInput',
                    'placeholder' => 'Veuillez indiquer votre prénom...'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre prénom n'a pas été complété"
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom doit comporter au moins {{ limit }} caractères.',
                        'max' => 50,
                        'maxMessage' => 'Votre nom ne peut pas dépasser {{ limit }} caractères.'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'attr' => [
                    'class' => 'contactInput',
                    'placeholder' => 'Veuillez indiquez votre e-mail...'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre e-mail n'a pas été complété"
                    ]),
                    new Email([
                        'message' => 'Veuillez indiquer une adresse e-mail valide'
                    ]),
                    new Regex([
                        'pattern' => '/^[\w\.-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z]{2,6}$/',
                        'message' => 'L\'adresse e-mail ne doit pas contenir d\'espaces ou de caractères interdits.'
                    ])
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => [
                    'class' => 'contactInput contactTextarea',
                    'placeholder' => 'Veuillez indiquer votre message...'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre message n'a pas été complété"
                    ]),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Votre message doit comporter au moins {{ limit }} caractères'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
