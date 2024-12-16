<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'firstname',
                TextType::class,
                [
                    'label' => 'Nom',
                    'attr' => [
                        'class' => 'input'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => "Votre nom n'a pas été complété"
                        ]),
                        new Length([
                            'min' => '2',
                            'minMessage' => 'Votre nom doit comporter au moins {{ limit }} cracatères'
                        ])
                    ]
                ]
            )
            ->add('lastname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'input'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre prénom n'a pas été complété"
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre prénom doit comporter au moins {{ limit }} cracatères'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'attr' => [
                    'class' => 'input'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Votre champ e-mail n'a pas été complété"
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
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'input'
                ],
                'label' => 'Mot de Passe',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer votre mot de passe',
                    ]),
                    new Length([
                        'min' => 12,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        'max' => 40,
                        'maxMessage' => 'Votre mot de passe ne peut comporter plus de {{ limit }} caractères'
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => "J'accepte les conditions générales de ce site",
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez acceptez nos conditions',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
