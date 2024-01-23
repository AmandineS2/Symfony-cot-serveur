<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use DateTimeImmutable;
use App\Entity\Actor;
use App\Entity\Movie;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Person($faker));

        $actors = $faker->actors($gender = null, $count = 190, $duplicates = false);
        $createdActors = [];
        foreach ($actors as $item) {
            $fullname = $item; //ex : Christian Bale
            $fullnameExploded = explode(' ', $fullname);

            $firstname = $fullnameExploded[0]; //ex : Christian
            $lastname = $fullnameExploded[1]; //ex : Bale

            $actor = new Actor();
            $actor->setLastname($lastname);
            $actor->setFirstname($firstname);
            $actor->setDate($faker->dateTimeThisCentury());
            $actor->setCreatedAt(new DateTimeImmutable());
            $actor->setNationality("fr");
//            $actor->setReleaseDate(new DateTimeImmutable());

            $createdActors[] = $actor;

            $manager->persist($actor);
        }

        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));
        $movies = $faker->movies(100);
        $entries = $faker->numberBetween(1000, 1000000); 
        $budget = $faker->numberBetween(100000, 10000000);
        $duration = $faker->numberBetween(60, 180, 500);
        $note = $faker->randomFloat(1, 10, 20);
        foreach ($movies as $item) {
            $movie = new Movie();
            $movie->setTitle($item);
            $movie->setReleaseDate(new DateTimeImmutable());
            $movie->setDescription("la description");
            $movie->setDirector("nul");
            $movie->setEntries($entries);
            $movie->setBudget($budget);
            $movie->setDuration($duration);
            $movie->setNote($note);
           

            shuffle($createdActors);
            $createdActorsSliced = array_slice($createdActors, 0, 4);
            foreach ($createdActorsSliced as $actor) {
                $movie->addActor($actor);
            }
            $manager->persist($movie);
        }


        $manager->flush();
        return true;
    }
}