<?php

namespace App\Form;

use App\Entity\Cities;
use App\Entity\Flights;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlightsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('num_flight', TextType::class, [
                'label' => 'Numéro de vol'
            ] )
            ->add('hour_start', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Jour et Heure de départ',
            ])
            ->add('hour_end', DateType::class , [
                'widget' => 'single_text',
                'label' => 'Jour et Heure d\'arrivée',
            ])
            ->add('price', IntegerType::class, [
                'label' => 'Prix',
            ])
            ->add('reduc', ChoiceType::class, [
                'label' => 'Réduction',
                'choices' => [
                    'oui' => true,
                    'non' => false,
                ]
            ])
            ->add('total_seats', IntegerType::class, [
                'label' => 'Places'
            ])
            ->add('city_start', EntityType::class, [
                'class' => Cities::class,
                'choice_label' => 'id',
                'label' => 'Ville de départ',
            ])
            ->add('city_end', EntityType::class, [
                'class' => Cities::class,
                'choice_label' => 'id',
                'label' => 'Ville d\'arrivée',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Flights::class,
        ]);
    }
}
