<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class EtudiantFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker= \Faker\Factory::create('fr_FR');
         $genre = [1 =>'male', 2=>'Female'];
         //$product = new Product();

         $EtablissementRepository = $manager->getRepository(Etablissement::class);
         $ListeEtablissement = $EtablissementRepository->findAll();
         for ($i = 0; $i < 99; $i++) {
        $sexe = rand(1,2);

        $etudiant = new Etudiant();
        $etudiant->setNom($faker->lastName);
        $etudiant->setPrenom($faker->firstName($genre[$sexe]));
        $etudiant->setSexe($sexe);
        $etudiant->setAnniversaire($faker->dateTime);
        $etudiant->setEtablissement($ListeEtablissement[array_rand($ListeEtablissement)]);
        $manager->persist($etudiant);


    }
        $manager->flush();

}


    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return 2;
    }
}
