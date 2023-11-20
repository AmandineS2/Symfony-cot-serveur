<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Actor;
use DateTimeImmutable;

use phpDocumentor\Reflection\Types\Null_;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    $faker =\Faker\Factory::create();
    $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));

    $actor = $faker->actors($gender = null, $count = 100, $duplicates = false);
    foreach ($actor as $item) {

        $fullname = $item;
        $fullnameExploded = explode(' ', $fullname);
        $firstname = $fullnameExploded[0];
        $lastname = $fullnameExploded[1];
    }
        $actor = new Actor();
        $actor->setLastname('Isle');
        $actor->setFirstname('Death');
		$actor->setDate(new \DateTime());
        $actor->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($actor);
        $manager->flush();
    }
}
