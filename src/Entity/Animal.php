<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $espece = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $dateNaissance = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $sexe = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Habitat $habitat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etatSante = null;

    /**
     * @var Collection<int, CompteRendu>
     */
    #[ORM\OneToMany(targetEntity: CompteRendu::class, mappedBy: 'animal')]
    private Collection $compteRendus;

    /**
     * @var Collection<int, Alimentation>
     */
    #[ORM\OneToMany(targetEntity: Alimentation::class, mappedBy: 'animal')]
    private Collection $no;

    public function __construct()
    {
        $this->compteRendus = new ArrayCollection();
        $this->no = new ArrayCollection();
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

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(string $espece): static
    {
        $this->espece = $espece;

        return $this;
    }

    public function getDateNaissance(): ?\DateTime
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTime $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getHabitat(): ?Habitat
    {
        return $this->habitat;
    }

    public function setHabitat(?Habitat $habitat): static
    {
        $this->habitat = $habitat;

        return $this;
    }

    public function getEtatSante(): ?string
    {
        return $this->etatSante;
    }

    public function setEtatSante(?string $etatSante): static
    {
        $this->etatSante = $etatSante;

        return $this;
    }

    /**
     * @return Collection<int, CompteRendu>
     */
    public function getCompteRendus(): Collection
    {
        return $this->compteRendus;
    }

    public function addCompteRendu(CompteRendu $compteRendu): static
    {
        if (!$this->compteRendus->contains($compteRendu)) {
            $this->compteRendus->add($compteRendu);
            $compteRendu->setAnimal($this);
        }

        return $this;
    }

    public function removeCompteRendu(CompteRendu $compteRendu): static
    {
        if ($this->compteRendus->removeElement($compteRendu)) {
            // set the owning side to null (unless already changed)
            if ($compteRendu->getAnimal() === $this) {
                $compteRendu->setAnimal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Alimentation>
     */
    public function getNo(): Collection
    {
        return $this->no;
    }

    public function addNo(Alimentation $no): static
    {
        if (!$this->no->contains($no)) {
            $this->no->add($no);
            $no->setAnimal($this);
        }

        return $this;
    }

    public function removeNo(Alimentation $no): static
    {
        if ($this->no->removeElement($no)) {
            // set the owning side to null (unless already changed)
            if ($no->getAnimal() === $this) {
                $no->setAnimal(null);
            }
        }

        return $this;
    }
}
