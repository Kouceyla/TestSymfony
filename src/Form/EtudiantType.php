<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\Etablissement;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sexe',ChoiceType::class,[
                "choices"=>[
                    "Autre"=>0,
                    "Femme"=>1,
                    "Homme"=>2,
                ]

            ])
            ->add('anniversaire',DateType::class,['data' => new \DateTime('1970'), //
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',])

            ->add('etablissement', EntityType::class, [
                'class' => Etablissement::class,
                'choice_label' => 'nom',
            ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}

