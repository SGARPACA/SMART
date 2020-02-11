<?php


namespace App\DataFixtures;

use App\Entity\Department;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class DepartmentFixtures
 * @package App\DataFixtures
 */
class DepartmentFixtures extends Fixture
{

    private $data = [
        [
            'name' => 'Alpes-de-Haute-Provence',
            'code' => '04'
        ],
        [
            'name' => 'Hautes-Alpes',
            'code' => '05'
        ],
        [
            'name' => 'Alpes-Maritimes',
            'code' => '06'
        ],
        [
            'name' => 'Bouches-du-Rhône',
            'code' => '13'
        ],
        [
            'name' => 'Var',
            'code' => '83'
        ],
        [
            'name' => 'Vaucluse',
            'code' => '84'
        ],

    ];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $datum) {
            $department = new Department();
            $department->setName($datum['name']);
            $department->setCode($datum['code']);

            $manager->persist($department);
        }

        $manager->flush();
    }
}
