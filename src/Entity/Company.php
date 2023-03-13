<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
//adresse form type
use App\Entity\Adresse;
// adresse form
use App\Form\AdresseType;


#[ORM\Entity(repositoryClass: CompanyRepository::class)]
#[ApiResource]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(nullable: true)]
    private ?string $siren = null;

    #[ORM\Column(nullable: true)]
    private ?string $siret = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tvaIntra = null;


    #[ORM\OneToOne(inversedBy: 'company', cascade: ['persist', 'remove'])]
    private ?Adresse $Adresse = null;

    #[ORM\OneToMany(mappedBy: 'company', targetEntity: Agence::class)]
    private Collection $Agences;

    public function __construct()
    {
        $this->Agences = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSiren(): ?string
    {
        return $this->siren;
    }

    public function setSiren(?string $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getTvaIntra(): ?string
    {
        return $this->tvaIntra;
    }

    public function setTvaIntra(?string $tvaIntra): self
    {
        $this->tvaIntra = $tvaIntra;

        return $this;
    }



    public function getAdresse(): ?Adresse
    {
        return $this->Adresse;
    }

    public function setAdresse(?Adresse $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    /**
     * @return Collection<int, Agence>
     */
    public function getAgences(): Collection
    {
        return $this->Agences;
    }

    public function addAgence(Agence $agence): self
    {
        if (!$this->Agences->contains($agence)) {
            $this->Agences->add($agence);
            $agence->setCompany($this);
        }

        return $this;
    }

    public function removeAgence(Agence $agence): self
    {
        if ($this->Agences->removeElement($agence)) {
            // set the owning side to null (unless already changed)
            if ($agence->getCompany() === $this) {
                $agence->setCompany(null);
            }
        }

        return $this;
    }


}
