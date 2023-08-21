<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormationType extends AbstractType
{
    const CHOICES = 'choices';
    const REQUIRED = 'required';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $mois = ['Mois' => '', 'janvier' => 1, 'février' => 2, 'mars' => 3, 'avril' => 4, 'mai' => 5, 'juin' => 6, 'juillet' => 7, 'août' => 8, 'septembre' => 9, 'octobre' => 10, 'novembre' => 11, 'décembre' => 12];
        $annees = ['Année' => ''];
        $currentYear = date('Y');
        for ($i = $currentYear; $i >= 1900; $i--) {
            $annees[$i] = $i;
        }

        $builder
            ->add('diplome')
            ->add('ecole')
            ->add('domaineEtude')
            ->add('description')
            ->add('moisDeDebut', ChoiceType::class, [
                self::CHOICES => $mois,
                self::REQUIRED => false
            ])
            ->add('anneeDeDebut', ChoiceType::class, [
                self::CHOICES => $annees,
                self::REQUIRED => false
            ])
            ->add('moisDeFin', ChoiceType::class, [
                self::CHOICES => $mois,
                self::REQUIRED => false
            ])
            ->add('anneeDeFin', ChoiceType::class, [
                self::CHOICES => $annees,
                self::REQUIRED => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
