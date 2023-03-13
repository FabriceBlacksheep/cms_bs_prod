<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
// api
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
#[ApiResource]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateBegin = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateEnd = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $Price = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    private ?Agence $Agence = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    private ?Vehicule $Vehicule = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCommande = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    private ?User $User = null;

    #[ORM\OneToOne(inversedBy: 'booking', cascade: ['persist', 'remove'])]
    private ?Stateofplay $Stateofplay = null;

    // #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    // private ?Stateofplay $Stateofplay = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateBegin(): ?\DateTimeInterface
    {
        return $this->DateBegin;
    }

    public function setDateBegin(\DateTimeInterface $DateBegin): self
    {
        $this->DateBegin = $DateBegin;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->DateEnd;
    }

    public function setDateEnd(\DateTimeInterface $DateEnd): self
    {
        $this->DateEnd = $DateEnd;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->Agence;
    }

    public function setAgence(?Agence $Agence): self
    {
        $this->Agence = $Agence;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->Vehicule;
    }

    public function setVehicule(?Vehicule $Vehicule): self
    {
        $this->Vehicule = $Vehicule;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    // public function getStateofplay(): ?Stateofplay
    // {
    //     return $this->Stateofplay;
    // }

    // public function setStateofplay(?Stateofplay $Stateofplay): self
    // {
    //     $this->Stateofplay = $Stateofplay;

    //     return $this;
    // }

    public function getStateofplay(): ?Stateofplay
    {
        return $this->Stateofplay;
    }

    public function setStateofplay(?Stateofplay $Stateofplay): self
    {
        $this->Stateofplay = $Stateofplay;

        return $this;
    }

    function __toString()
    {
        // return id and user
        return $this->id . ' | ' . $this->User. ' | ' . $this->Vehicule;
        //



    }

}
