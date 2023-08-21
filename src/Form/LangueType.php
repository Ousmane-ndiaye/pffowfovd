<?php

namespace App\Form;

use App\Entity\Langue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class LangueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('niveau', ChoiceType::class, [
                'choices' => [
                    'Introductif' => 'Introductif',
                    'Intermédiaire' => 'Intermédiaire',
                    'Seuil' => 'Seuil',
                    'Avancé' => 'Avancé',
                    'Autonome' => 'Autonome',
                    'Maîtrise' => 'Maîtrise'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Langue::class,
        ]);
    }
}
