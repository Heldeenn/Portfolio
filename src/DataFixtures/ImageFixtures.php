<?php

namespace App\DataFixtures;

use App\Entity\Image;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ImageFixtures extends Fixture
{
    CONST FILE_NAME = [
        'placeholder.png',
        'placeholder.png',
        'placeholder.png',
        'placeholder.png',
        'placeholder.png',
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach (self::FILE_NAME as $file) {
            $image = new Image();
            $image->setName($file);
            $image->setUpdatedAt(new DateTime());

            $manager->persist($image);
        }

        $manager->flush();
    }
}
