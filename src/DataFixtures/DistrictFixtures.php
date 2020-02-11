<?php


namespace App\DataFixtures;

use App\Entity\Department;
use App\Entity\District;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class DistrictFixtures
 * @package App\DataFixtures
 */
class DistrictFixtures extends Fixture
{
    public function getDependencies()
    {
        return array(
            DepartmentFixtures::class,
        );
    }

    const DATA = [
        [
            'department' => '04',
            'code' => '041',
            'name' => 'Barcelonnette'
        ],
        [
            'department' => '04',
            'code' => '042',
            'name' => 'Castellane'
        ],
        [
            'department' => '04',
            'code' => '043',
            'name' => 'Digne-les-Bains'
        ],
        [
            'department' => '04',
            'code' => '044',
            'name' => 'Forcalquier'
        ],
        [
            'department' => '05',
            'code' => '051',
            'name' => 'Briançon'
        ],
        [
            'department' => '05',
            'code' => '052',
            'name' => 'Gap'
        ],
        [
            'department' => '06',
            'code' => '061',
            'name' => 'Grasse'
        ],
        [
            'department' => '06',
            'code' => '062',
            'name' => 'Nice'
        ],
        [
            'department' => '13',
            'code' => '131',
            'name' => 'Aix-en-Provence'
        ],
        [
            'department' => '33',
            'code' => '132',
            'name' => 'Arles'
        ],
        [
            'department' => '13',
            'code' => '133',
            'name' => 'Istres'
        ],
        [
            'department' => '13',
            'code' => '134',
            'name' => 'Marseille'
        ],
        [
            'department' => '83',
            'code' => '831',
            'name' => 'Toulon'
        ],
        [
            'department' => '83',
            'code' => '832',
            'name' => 'Draguignan'
        ],
        [
            'department' => '83',
            'code' => '833',
            'name' => 'Brignoles'
        ],
        [
            'department' => '84',
            'code' => '841',
            'name' => 'Apt'
        ],
        [
            'department' => '84',
            'code' => '842',
            'name' => 'Avignon'
        ],
        [
            'department' => '84',
            'code' => '843',
            'name' => 'Carpentras'
        ],
    ];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $departmentRepository = $manager->getRepository(Department::class);
        foreach (self::DATA as $data) {
            $district = new District();
            $district->setName($data['name']);
            $district->setCode($data['code']);
            $department = $departmentRepository->findOneBy(['code' => $data['department']]);
            $district->setDepartment($department);

            $manager->persist($district);
        }

        $manager->flush();
    }
}
