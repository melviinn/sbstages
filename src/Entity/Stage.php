<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StageRepository::class)]
class Stage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $dateDebut = null;

    #[ORM\Column]
    private ?int $nbJours = null;

    #[ORM\ManyToMany(targetEntity: Client::class, inversedBy: 'stages')]
    private Collection $client;

    #[ORM\OneToMany(mappedBy: 'stage', targetEntity: StageSpecialiste::class)]
    private Collection $specialistes;

    #[ORM\ManyToOne(inversedBy: 'stages')]
    private ?Animateur $animateurs = null;

    public function __construct()
    {
        $this->client = new ArrayCollection();
        $this->specialistes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?string
    {
        return $this->dateDebut;
    }

    public function setDateDebut(string $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getNbJours(): ?int
    {
        return $this->nbJours;
    }

    public function setNbJours(int $nbJours): self
    {
        $this->nbJours = $nbJours;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClient(): Collection
    {
        return $this->client;
    }

    public function addClient(Client $client): self
    {
        if (!$this->client->contains($client)) {
            $this->client->add($client);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        $this->client->removeElement($client);

        return $this;
    }

    /**
     * @return Collection<int, StageSpecialiste>
     */
    public function getSpecialistes(): Collection
    {
        return $this->specialistes;
    }

    public function getAnimateurs(): ?Animateur
    {
        return $this->animateurs;
    }

    public function setAnimateurs(?Animateur $animateurs): self
    {
        $this->animateurs = $animateurs;

        return $this;
    }

    public function __toString() {
        return $this->animateurs;
    }
}
