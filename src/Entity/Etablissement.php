<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtablissementRepository::class)]
class Etablissement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $nbEleve = null;

    #[ORM\OneToMany(mappedBy: 'etablissement', targetEntity: Etudiant::class)]
    private Collection $etablissement;

    public function __construct()
    {
        $this->etablissement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbEleve(): ?int
    {
        return $this->nbEleve;
    }

    public function setNbEleve(int $nbEleve): static
    {
        $this->nbEleve = $nbEleve;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtablissement(): Collection
    {
        return $this->etablissement;
    }

    public function addEtablissement(Etudiant $etablissement): static
    {
        if (!$this->etablissement->contains($etablissement)) {
            $this->etablissement->add($etablissement);
            $etablissement->setEtablissement($this);
        }

        return $this;
    }

    public function removeEtablissement(Etudiant $etablissement): static
    {
        if ($this->etablissement->removeElement($etablissement)) {
            // set the owning side to null (unless already changed)
            if ($etablissement->getEtablissement() === $this) {
                $etablissement->setEtablissement(null);
            }
        }

        return $this;
    }
}
