<?php

namespace App\Entity;

use App\Repository\AlimentationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlimentationRepository::class)]
class Alimentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typeNourriture = null;

    #[ORM\Column(length: 100)]
    private ?string $quantite = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $heureRepas = null;

    #[ORM\ManyToOne(inversedBy: 'no')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeNourriture(): ?string
    {
        return $this->typeNourriture;
    }

    public function setTypeNourriture(string $typeNourriture): static
    {
        $this->typeNourriture = $typeNourriture;

        return $this;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(string $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getHeureRepas(): ?\DateTime
    {
        return $this->heureRepas;
    }

    public function setHeureRepas(\DateTime $heureRepas): static
    {
        $this->heureRepas = $heureRepas;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }
}
