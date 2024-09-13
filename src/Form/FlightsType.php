<?php

namespace App\Form;

use App\Entity\Cities;
use App\Entity\Flights;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class FlightsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('num_flight', TextType::class, [
                'label' => 'Numéro de vol'
            ] )
            ->add('city_start', EntityType::class, [
                'class' => Cities::class,
                'choice_label' => 'name',
                'label' => 'Ville de départ',
            ])
            ->add('city_end', EntityType::class, [
                'class' => Cities::class,
                'choice_label' => 'name',
                'label' => 'Ville d\'arrivée',
            ])
            ->add('hour_start', null, [
                'widget' => 'single_text',
                'label' => 'Jour et Heure de départ',
            ])
            ->add('hour_end', null , [
                'widget' => 'single_text',
                'label' => 'Jour et Heure d\'arrivée',
                'constraints' => [
                    new Assert\GreaterThan([
                        'propertyPath' => 'parent.all[hour_start].data',
                        'message' => 'L\'heure d\'arrivée doit être postérieure à l\'heure de départ.',
                    ]),
                ]
            ])
            ->add('total_seats', IntegerType::class, [
                'label' => 'Places'
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Flights::class,
        ]);
    }
}
