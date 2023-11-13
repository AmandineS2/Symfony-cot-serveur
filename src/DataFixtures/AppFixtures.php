<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;
use phpDocumentor\Reflection\Types\Null_;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $actor = new Actor();
        $actor->setLastname('Isle');
        $actor->setFirstname('Death');
		$actor->setDate(null);
        $manager->persist($actor);
        $manager->flush();
    }
}
