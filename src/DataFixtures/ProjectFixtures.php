<?php

namespace App\DataFixtures;

use App\Entity\Project;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use Faker\Factory;

class ProjectFixtures extends Fixture
{
    const PROJECTS = [
        "Japan travel" => [
            "description" => "Tout premier projet personnel entamé au début de formation à la Wild Code School.
            Top 15 des destinations que j'ai pu visiter.",
            "client" => "Site personnel",
            "github" => "https://github.com/Heldeenn/Japan-travel",
        ],
        "Refonte du site web FJT" => [
            "description" => "Refonte du site web du Foyer des Jeunes Travailleurs.
            Première utilisation d'une architecture MVC.",
            "client" => "Wild Code School",
            "github" => "https://github.com/Heldeenn/orleans-php-2003-project-fjt",
        ]
    ];

    /**
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        foreach (self::PROJECTS as $projectName => $details) {
            $project = new Project();
            $project->setName($projectName);
            $project->setDateStart(new DateTime($faker->date()));
            $project->setDateEnd(new DateTime($faker->date()));
            $project->setDescription($details['description']);
            $project->setClient($details['client']);
            $project->setGithub($details['github']);

            $manager->persist($project);
        }

        $manager->flush();
    }
}
