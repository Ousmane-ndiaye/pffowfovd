<?php

namespace App\Form;

use App\Entity\Usersecteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Secteur;

class UsersecteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('secteur', EntityType::class, [
                'class' => Secteur::class,
                'choice_label' => function ($secteur) {
                    return $secteur->getLibelle() . '___' . $secteur->getImage();
                },
                'multiple' => true,
                'expanded' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usersecteur::class,
        ]);
    }
}
