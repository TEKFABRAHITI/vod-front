<?php

namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{

    public const PROGRAMMATION  = 'programmation ';
    public const DEVELOPPEMENT_WEB = 'developpement-web';
    public const BASES_DE_DONNEES = 'bases-de-donnees';
    public const DEVELOPPEMENT_MOBILE = 'developpement-mobile';
    public const MAINTENANCE_DES_DISPOSITIFS_ACTUELS = 'maintenance-des-dispositifs-actuels';
    
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Programmation');
        $category->setSlug('programmation');
        $manager->persist($category);
        $this->addReference(self::PROGRAMMATION, $category);

        $category = new Category();
        $category->setName('Développement web');
        $category->setSlug('developpement-web');
        $manager->persist($category);
        $this->addReference(self::DEVELOPPEMENT_WEB, $category);

        $category = new Category();
        $category->setName('Bases de données');
        $category->setSlug('bases-de-donnees');
        $manager->persist($category);
        $this->addReference(self::BASES_DE_DONNEES, $category);

        $category = new Category();
        $category->setName('Développement mobile');
        $category->setSlug('developpement-mobile');
        $manager->persist($category);
        $this->addReference(self::DEVELOPPEMENT_MOBILE, $category);

        $category = new Category();
        $category->setName('Maintenance des dispositifs actuels');
        $category->setSlug('maintenance-des-dispositifs-actuels');
        $manager->persist($category);
        $this->addReference(self::MAINTENANCE_DES_DISPOSITIFS_ACTUELS, $category);


        $manager->flush();
    }
}
