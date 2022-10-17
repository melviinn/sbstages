<?php

namespace App\Entity;

use App\Repository\StageSpecialisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StageSpecialisteRepository::class)]
class StageSpecialiste
{

    #[ORM\Column]
    private ?int $nbHeures = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'specialistes')]
    private ?Stage $stage = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'specialistes')]
    private ?Specialiste $specialiste = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbHeures(): ?int
    {
        return $this->nbHeures;
    }

    public function setNbHeures(int $nbHeures): self
    {
        $this->nbHeures = $nbHeures;

        return $this;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function setStage(?Stage $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getSpecialiste(): ?Specialiste
    {
        return $this->specialiste;
    }

    public function setSpecialiste(?Specialiste $specialiste): self
    {
        $this->specialiste = $specialiste;

        return $this;
    }
}
