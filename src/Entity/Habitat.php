<?php

namespace App\Entity;

use App\Repository\HabitatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitatRepository::class)]
class Habitat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, Animal>
     */
    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'habitat')]
    private Collection $animals;

    /**
     * @var Collection<int, CommentaireHabitat>
     */
    #[ORM\OneToMany(targetEntity: CommentaireHabitat::class, mappedBy: 'habitat')]
    private Collection $commentaireHabitats;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
        $this->commentaireHabitats = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Animal>
     */
    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animals->contains($animal)) {
            $this->animals->add($animal);
            $animal->setHabitat($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animals->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getHabitat() === $this) {
                $animal->setHabitat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CommentaireHabitat>
     */
    public function getCommentaireHabitats(): Collection
    {
        return $this->commentaireHabitats;
    }

    public function addCommentaireHabitat(CommentaireHabitat $commentaireHabitat): static
    {
        if (!$this->commentaireHabitats->contains($commentaireHabitat)) {
            $this->commentaireHabitats->add($commentaireHabitat);
            $commentaireHabitat->setHabitat($this);
        }

        return $this;
    }

    public function removeCommentaireHabitat(CommentaireHabitat $commentaireHabitat): static
    {
        if ($this->commentaireHabitats->removeElement($commentaireHabitat)) {
            // set the owning side to null (unless already changed)
            if ($commentaireHabitat->getHabitat() === $this) {
                $commentaireHabitat->setHabitat(null);
            }
        }

        return $this;
    }
}
