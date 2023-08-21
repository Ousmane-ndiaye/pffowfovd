<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class GeneralUserInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse')
            ->add('tel')
            ->add('birthday', TextType::class)
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Sexe' => '',
                    'Homme' => 'Homme',
                    'Femme' => 'Femme'
                ],
            ])
            ->add('ville')
            ->add('codePostal')
            ->add('email')
            //->add('password')
            ->add('prenom')
            ->add('nom')
            ->add('userSecteurs', UsersecteurType::class, [
                'data_class' => NULL
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
