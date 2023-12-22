<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Actor;
use App\Entity\Movie;
use DateTimeImmutable;
use App\Entity\User;

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

        for($i =0; $i<5; $i++) {
            $movie = new Movie();
            $movie
                ->setTitle("Mon film ($i)")
                ->setDescription("ma description")
                ->setDirector("toto")
                ->setReleaseDate(new \DateTime())
            ;
            $manager->persist($movie);
        
        }

        $actor = new Actor();
        $actor->setLastname($lastname);
        $actor->setFirstname($firstname);
		$actor->setDate(new \DateTime());
        $actor->setCreatedAt(new \DateTimeImmutable());
        $actor->setNationality('Germany');
        $manager->persist($actor);
        $manager->flush();
    }

    
        
    }

   

  //  $faker = \Faker\Factory::create();
  //  $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));

  




  

}
