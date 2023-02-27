<?php

namespace App\Form;

use App\Entity\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('transactionType', ChoiceType::class, [
                "expanded" => true,
                "choices" => [
                    "For Sale" => "sale",
                    "For Rent" => "rent",
                ],
                "empty_data" => "both",
            ])
            ->add('type', ChoiceType::class, [
                "expanded" => true,
                "multiple" => true,
                "choices" =>
                    [
                        "House" => "house",
                        "Apartment" => "apartment",
                        "Yurt" => "yurt"
                    ]
             ])
            ->add('areaMin', NumberType::class, [
                "label" => "Area (m2) between ",
                "attr" => [
                    "placeholder" => "0",
                ],
                "scale" => 2,
                "empty_data" => 0,
                ])
            ->add('areaMax', NumberType::class, [
                "label" => "And ",
                "attr" => [
                    "placeholder" => "500",
                ],
                "scale" => 2,
            ])
            ->add('priceMin', NumberType::class, [
                "label" => "Price (€) between ",
                "attr" => [
                    "placeholder" => "0",
                ],
                "scale" => 2,
                "empty_data" => 0,
            ])
            ->add('priceMax', NumberType::class, [
                "label" => "And ",
                "attr" => [
                    "placeholder" => "1.000.000.000",
                ],
                "scale" => 2,
            ])
            ->add('nbRoomsMin', NumberType::class, [
                "label" => "Number of rooms min : ",
                "attr" => [
                    "placeholder" => "0",
                ],
                "scale" => 0,
                "empty_data" => 0,
            ])
            ->add('nbRoomsMax', NumberType::class, [
                "label" => "Number of rooms max : ",
                "attr" => [
                    "placeholder" => "1.000.000.000",
                ],
                "scale" => 0,
            ])
            ->add('isGarage', CheckboxType::class, ["label" => "Garage"])
            ->add('isExterior', CheckboxType::class, ["label" => "Exterior"])
            ->add('isPool', CheckboxType::class, ["label" => "Pool"]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'required' => false,
        ]);
    }
}
