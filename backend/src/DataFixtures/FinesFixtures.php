<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Fines;
use App\Services\VerifCodeFine;

class FinesFixtures extends Fixture
{
    use VerifCodeFine;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 1; $i < 30; $i++) {
            $fine = new Fines();
            $fine
                ->setPaid(0)
                ->setIdNumbers($this->createCodeFine())
                ->setPrice($faker->randomFloat(2, 30, 150))
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName());

            $manager->persist($fine);

            $manager->flush();
        }

        $manager->flush();
    }
}