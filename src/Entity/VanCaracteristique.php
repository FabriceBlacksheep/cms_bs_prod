<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VanCaracteristiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VanCaracteristiqueRepository::class)]
#[ApiResource]
class VanCaracteristique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visuel = null;

    #[ORM\Column(length: 10000)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nom = null;

    #[ORM\OneToMany(mappedBy: 'Caracteristiques', targetEntity: Campervan::class)]
    private Collection $campervans;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $Engine = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $Performances = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $Dimensions = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $Layout = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $Equipment = null;

    public function __construct()
    {
        $this->campervans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisuel(): ?string
    {
        return $this->visuel;
    }

    public function setVisuel(string $visuel): self
    {
        $this->visuel = $visuel;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return Collection<int, Campervan>
     */
    public function getCampervans(): Collection
    {
        return $this->campervans;
    }

    public function addCampervan(Campervan $campervan): self
    {
        if (!$this->campervans->contains($campervan)) {
            $this->campervans->add($campervan);
            $campervan->setCaracteristiques($this);
        }

        return $this;
    }

    public function removeCampervan(Campervan $campervan): self
    {
        if ($this->campervans->removeElement($campervan)) {
            // set the owning side to null (unless already changed)
            if ($campervan->getCaracteristiques() === $this) {
                $campervan->setCaracteristiques(null);
            }
        }

        return $this;
    }

    public function getEngine(): ?string
    {
        return $this->Engine;
    }

    public function setEngine(?string $Engine): self
    {
        $this->Engine = $Engine;

        return $this;
    }

    public function getPerformances(): ?string
    {
        return $this->Performances;
    }

    public function setPerformances(?string $Performances): self
    {
        $this->Performances = $Performances;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->Dimensions;
    }

    public function setDimensions(?string $Dimensions): self
    {
        $this->Dimensions = $Dimensions;

        return $this;
    }

    public function getLayout(): ?string
    {
        return $this->Layout;
    }

    public function setLayout(?string $Layout): self
    {
        $this->Layout = $Layout;

        return $this;
    }

    public function getEquipment(): ?string
    {
        return $this->Equipment;
    }

    public function setEquipment(?string $Equipment): self
    {
        $this->Equipment = $Equipment;

        return $this;
    }
}
