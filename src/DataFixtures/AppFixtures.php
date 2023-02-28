<?php

namespace App\DataFixtures;

use App\Entity\Accomodation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $this->addAccomodation($manager, $faker);
    }

    public function addAccomodation(ObjectManager $manager, Generator $generator){

        for ($i = 0; $i < 200; $i++){
            $acc = new Accomodation();
            $acc
                ->setArea($generator->numberBetween(14, 250))
                ->setNbRooms($generator->numberBetween(1, 16))
                ->setType($generator->randomElement(['apartment', 'house', 'yurt']))
                ->setIsPool($generator->boolean(20))
                ->setAdress($generator->address)
                ->setIsExterior($generator->boolean())
                ->setIsGarage($generator->boolean())
                ->setTransactionType($generator->randomElement(['sale', 'rent']))
                ->setPrice($generator->numberBetween(42000, 10000000))
                ->setReleaseDate($generator->dateTimeBetween('-8 months'));

            if($acc->isIsExterior()){
                $acc->setExteriorArea($generator->numberBetween(10, 999900));
            }
            $manager->persist($acc);
        }
        $manager->flush();
    }
}
