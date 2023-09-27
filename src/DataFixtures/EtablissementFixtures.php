<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EtablissementFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $listeEtablissement=["ORT Montreuil","Lycée Jacques Feyder","Villetaneuse Paris Nord"];
        foreach ($listeEtablissement as $ecole)
        {
            $etablissement = new Etablissement();
            $etablissement->setNom($ecole);
            $etablissement->setNbEleve(100);
            $manager->persist($etablissement);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
        // TODO: Implement getOrder() method.
    }
}
