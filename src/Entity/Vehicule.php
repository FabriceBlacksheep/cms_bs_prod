<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateImmatriculation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numeroSerie = null;

    #[ORM\Column(nullable: true)]
    private ?int $kilometrage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateKilometrage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $entreeParc = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sortieParc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?Campervan $Campervan = null;

    #[ORM\OneToMany(mappedBy: 'Vehicule', targetEntity: Booking::class)]
    private Collection $bookings;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: Stateofplay::class)]
    private Collection $Stateofplays;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?Agence $Agence = null;


    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->Stateofplays = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getDateImmatriculation(): ?\DateTimeInterface
    {
        return $this->DateImmatriculation;
    }

    public function setDateImmatriculation(?\DateTimeInterface $DateImmatriculation): self
    {
        $this->DateImmatriculation = $DateImmatriculation;

        return $this;
    }

    public function getNumeroSerie(): ?string
    {
        return $this->numeroSerie;
    }

    public function setNumeroSerie(?string $numeroSerie): self
    {
        $this->numeroSerie = $numeroSerie;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(?int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getDateKilometrage(): ?\DateTimeInterface
    {
        return $this->dateKilometrage;
    }

    public function setDateKilometrage(?\DateTimeInterface $dateKilometrage): self
    {
        $this->dateKilometrage = $dateKilometrage;

        return $this;
    }

    public function getEntreeParc(): ?\DateTimeInterface
    {
        return $this->entreeParc;
    }

    public function setEntreeParc(?\DateTimeInterface $entreeParc): self
    {
        $this->entreeParc = $entreeParc;

        return $this;
    }

    public function getSortieParc(): ?\DateTimeInterface
    {
        return $this->sortieParc;
    }

    public function setSortieParc(?\DateTimeInterface $sortieParc): self
    {
        $this->sortieParc = $sortieParc;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCampervan(): ?Campervan
    {
        return $this->Campervan;
    }

    public function setCampervan(?Campervan $Campervan): self
    {
        $this->Campervan = $Campervan;

        return $this;
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings->add($booking);
            $booking->setVehicule($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getVehicule() === $this) {
                $booking->setVehicule(null);
            }
        }

        return $this;
    }

    // public function return modele and immatriculation
    public function __toString(): string
    {
        return $this->getCampervan()->getModele() . ' || ' . $this->getImmatriculation();
    }

    /**
     * @return Collection<int, Stateofplay>
     */
    public function getStateofplays(): Collection
    {
        return $this->Stateofplays;
    }

    public function addStateofplay(Stateofplay $Stateofplay): self
    {
        if (!$this->Stateofplays->contains($Stateofplay)) {
            $this->Stateofplays->add($Stateofplay);
            $Stateofplay->setVehicule($this);
        }

        return $this;
    }

    public function removeStateofplay(Stateofplay $Stateofplay): self
    {
        if ($this->Stateofplays->removeElement($Stateofplay)) {
            // set the owning side to null (unless already changed)
            if ($Stateofplay->getVehicule() === $this) {
                $Stateofplay->setVehicule(null);
            }
        }

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




}
