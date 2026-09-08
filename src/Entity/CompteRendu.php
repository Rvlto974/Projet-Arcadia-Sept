<?php

namespace App\Entity;

use App\Repository\CompteRenduRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteRenduRepository::class)]
class CompteRendu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $etatAnimal = null;

    #[ORM\Column(length: 255)]
    private ?string $nourriture = null;

    #[ORM\Column]
    private ?int $grammage = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $datePassage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $detailEtat = null;

    #[ORM\ManyToOne(inversedBy: 'compteRendus')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $veterinaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtatAnimal(): ?string
    {
        return $this->etatAnimal;
    }

    public function setEtatAnimal(string $etatAnimal): static
    {
        $this->etatAnimal = $etatAnimal;

        return $this;
    }

    public function getNourriture(): ?string
    {
        return $this->nourriture;
    }

    public function setNourriture(string $nourriture): static
    {
        $this->nourriture = $nourriture;

        return $this;
    }

    public function getGrammage(): ?int
    {
        return $this->grammage;
    }

    public function setGrammage(int $grammage): static
    {
        $this->grammage = $grammage;

        return $this;
    }

    public function getDatePassage(): ?\DateTimeImmutable
    {
        return $this->datePassage;
    }

    public function setDatePassage(\DateTimeImmutable $datePassage): static
    {
        $this->datePassage = $datePassage;

        return $this;
    }

    public function getDetailEtat(): ?string
    {
        return $this->detailEtat;
    }

    public function setDetailEtat(?string $detailEtat): static
    {
        $this->detailEtat = $detailEtat;

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

    public function getVeterinaire(): ?User
    {
        return $this->veterinaire;
    }

    public function setVeterinaire(?User $veterinaire): static
    {
        $this->veterinaire = $veterinaire;

        return $this;
    }
}
