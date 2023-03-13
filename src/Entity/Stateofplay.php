<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\StateofplayRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StateofplayRepository::class)]
#[ApiResource]
class Stateofplay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $entryDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $exitDate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $generalState = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $returnState = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'Stateofplays')]
    private ?Vehicule $vehicule = null;

    #[ORM\OneToOne(mappedBy: 'Stateofplay', cascade: ['persist', 'remove'])]
    private ?Booking $booking = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntryDate(): ?\DateTimeInterface
    {
        return $this->entryDate;
    }

    public function setEntryDate(\DateTimeInterface $entryDate): self
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    public function getExitDate(): ?\DateTimeInterface
    {
        return $this->exitDate;
    }

    public function setExitDate(?\DateTimeInterface $exitDate): self
    {
        $this->exitDate = $exitDate;

        return $this;
    }

    public function getGeneralState(): ?string
    {
        return $this->generalState;
    }

    public function setGeneralState(?string $generalState): self
    {
        $this->generalState = $generalState;

        return $this;
    }

    public function getReturnState(): ?string
    {
        return $this->returnState;
    }

    public function setReturnState(?string $returnState): self
    {
        $this->returnState = $returnState;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    function __toString(): string
    {

        return $this->getEntryDate();
    }

    public function getBooking(): ?Booking
    {
        return $this->booking;
    }

    public function setBooking(?Booking $booking): self
    {
        // unset the owning side of the relation if necessary
        if ($booking === null && $this->booking !== null) {
            $this->booking->setStateofplay(null);
        }

        // set the owning side of the relation if necessary
        if ($booking !== null && $booking->getStateofplay() !== $this) {
            $booking->setStateofplay($this);
        }

        $this->booking = $booking;

        return $this;
    }

}
