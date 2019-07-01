<?php

namespace App\Form;

use App\Entity\Infoprofil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InformationProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreProfil')
            ->add('situation', ChoiceType::class, [
                'choices' => [
                    'En recherche d\'emploi' => 'En recherche d\'emploi',
                    'À l’écoute d’opportunités' => 'À l’écoute d’opportunités',
                    'En poste' => 'En poste',
                ],
            ])
            ->add('competences')
            ->add('description')
            ->add('website')
            ->add('twitter')
            ->add('linkedin');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Infoprofil::class,
        ]);
    }
}
