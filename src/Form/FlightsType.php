<?php

namespace App\Form;

use App\Entity\Cities;
use App\Entity\Flights;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlightsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('num_flight')
            ->add('hour_start', null, [
                'widget' => 'single_text',
            ])
            ->add('hour_end', null, [
                'widget' => 'single_text',
            ])
            ->add('price')
            ->add('reduc')
            ->add('total_seats')
            ->add('city_start', EntityType::class, [
                'class' => Cities::class,
                'choice_label' => 'id',
            ])
            ->add('city_end', EntityType::class, [
                'class' => Cities::class,
                'choice_label' => 'id',
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
