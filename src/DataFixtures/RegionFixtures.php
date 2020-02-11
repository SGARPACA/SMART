<?php


namespace App\DataFixtures;

use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class RegionFixtures
 * @package App\DataFixtures
 */
class RegionFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $region = new Region();
        $region->setName('Provence-Alpes-Côte d\'Azur');
        $region->setCode('93');

        $manager->persist($region);

        $manager->flush();
    }
}
