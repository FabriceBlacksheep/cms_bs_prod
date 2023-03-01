<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AdresseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
#[ApiResource]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $number = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $street = null;

    #[ORM\Column(length: 255)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\OneToOne(mappedBy: 'Adresse', cascade: ['persist', 'remove'])]
    private ?Agence $agence = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        // unset the owning side of the relation if necessary
        if ($agence === null && $this->agence !== null) {
            $this->agence->setAdresse(null);
        }

        // set the owning side of the relation if necessary
        if ($agence !== null && $agence->getAdresse() !== $this) {
            $agence->setAdresse($this);
        }

        $this->agence = $agence;

        return $this;
    }

    public function __toString()
    {
        return $this->number . ' ' . $this->street . ' ' . $this->zipcode . ' ' . $this->city . ' ' . $this->country;
    }
}
