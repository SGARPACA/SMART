<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture implements FixtureGroupInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->addRole('ROLE_ADMIN');
        $admin->lastName = 'admin';
        $admin->firstName = 'admin';
        $admin->setEmail('admin@athome-solution.fr');
        $admin->setPassword('$2y$10$Im.IG3v3bjrRDapsSRMXO.rKk0fg5taOYY73CNwfeqoxOfU4IleJm');
        $admin->setEnabled(true);

        $manager->persist($admin);

        $user = new User();
        $user->addRole('ROLE_VIEWER');
        $user->setEmail('smart@smart.fr');
        $user->setEnabled(true);
        $user->setPassword('$2y$10$Im.IG3v3bjrRDapsSRMXO.rKk0fg5taOYY73CNwfeqoxOfU4IleJm');
        $user->lastName = 'smart';
        $user->firstName = 'viewer';

        $manager->persist($user);

        $manager->flush();
    }

    /**
     * This method must return an array of groups
     * on which the implementing class belongs to
     *
     * @return string[]
     */
    public static function getGroups(): array
    {
        return ['user'];
    }
}
