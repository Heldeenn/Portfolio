<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture
{
    const TECHNOLOGIES = [
        "PHP 7",
        "Symfony",
        "Bootstrap",
        "MySQL",
        "Javascript",
        "Git/Github"
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach (self::TECHNOLOGIES as $technologyName) {
            $technology = new Technology();
            $technology->setName($technologyName);

            $manager->persist($technology);
        }
        $manager->flush();
    }
}
