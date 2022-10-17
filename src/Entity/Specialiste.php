<?php

namespace App\Entity;

use App\Repository\SpecialisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialisteRepository::class)]
class Specialiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\OneToMany(mappedBy: 'specialiste', targetEntity: StageSpecialiste::class)]
    private Collection $specialistes;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
        $this->specialistes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, StageSpecialiste>
     */
    public function getSpecialistes(): Collection
    {
        return $this->specialistes;
    }

    public function addSpecialiste(StageSpecialiste $specialiste): self
    {
        if (!$this->specialistes->contains($specialiste)) {
            $this->specialistes->add($specialiste);
            $specialiste->setSpecialiste($this);
        }

        return $this;
    }

    public function removeSpecialiste(StageSpecialiste $specialiste): self
    {
        if ($this->specialistes->removeElement($specialiste)) {
            // set the owning side to null (unless already changed)
            if ($specialiste->getSpecialiste() === $this) {
                $specialiste->setSpecialiste(null);
            }
        }

        return $this;
    }
}
