<?php

namespace App\Form;

use App\Entity\Infoprofil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreProfil')
            ->add('situation')
            ->add('comptences')
            ->add('description')
            ->add('website')
            ->add('twitter')
            ->add('linkedin')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Infoprofil::class,
        ]);
    }
}
