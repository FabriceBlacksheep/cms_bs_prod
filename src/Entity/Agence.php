<?php

namespace App\Entity;
// adresse entity
// agence controller
use App\Controller\AgenceController;
use App\Repository\AdresseRepository;

use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
// Api Platform
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;


// vich uploader


#[ORM\Entity(repositoryClass: AgenceRepository::class)]
// Api Platform
#[ApiResource]



class Agence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $idLocpro = null;

    #[ORM\Column(length: 100000)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    // authorize value null

    private ?string $visuel = null;


    #[ORM\Column]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $horaires = null;

    #[ORM\Column]
    private array $type = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description_EN = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description_NL = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description_DE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_DE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_EN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_NL = null;

    #[ORM\Column]
    private ?bool $active = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\OneToOne(inversedBy: 'agence', cascade: ['persist', 'remove'])]
    private ?Adresse $Adresse = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'Agence')]
    private Collection $users;

    #[ORM\Column(nullable: true)]
    private ?float $Longitude = null;

    #[ORM\Column(nullable: true)]
    private ?float $Latitude = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdLocpro(): ?string
    {
        return $this->idLocpro;
    }

    public function setIdLocpro(string $idLocpro): self
    {
        $this->idLocpro = $idLocpro;

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

    public function getVisuel(): ?string
    {
        return $this->visuel;
    }

    public function setVisuel(string $visuel): self
    {
        $this->visuel = $visuel;

        return $this;
    }



    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getHoraires(): ?string
    {
        return $this->horaires;
    }

    public function setHoraires(string $horaires): self
    {
        $this->horaires = $horaires;

        return $this;
    }

    public function getType(): array
    {
        return $this->type;
    }

    public function setType(array $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescriptionEN(): ?string
    {
        return $this->description_EN;
    }

    public function setDescriptionEN(?string $description_EN): self
    {
        $this->description_EN = $description_EN;

        return $this;
    }

    public function getDescriptionNL(): ?string
    {
        return $this->description_NL;
    }

    public function setDescriptionNL(?string $description_NL): self
    {
        $this->description_NL = $description_NL;

        return $this;
    }

    public function getDescriptionDE(): ?string
    {
        return $this->description_DE;
    }

    public function setDescriptionDE(?string $description_DE): self
    {
        $this->description_DE = $description_DE;

        return $this;
    }

    public function getNomDE(): ?string
    {
        return $this->nom_DE;
    }

    public function setNomDE(?string $nom_DE): self
    {
        $this->nom_DE = $nom_DE;

        return $this;
    }

    public function getNomEN(): ?string
    {
        return $this->nom_EN;
    }

    public function setNomEN(?string $nom_EN): self
    {
        $this->nom_EN = $nom_EN;

        return $this;
    }

    public function getNomNL(): ?string
    {
        return $this->nom_NL;
    }

    public function setNomNL(?string $nom_NL): self
    {
        $this->nom_NL = $nom_NL;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addAgence($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeAgence($this);
        }

        return $this;
    }


    // public function __toString() to return user email
    public function __toString()
    {
        return $this->email;
    }

    public function getLongitude(): ?float
    {
        return $this->Longitude;
    }

    public function setLongitude(?float $Longitude): self
    {
        $this->Longitude = $Longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->Latitude;
    }

    public function setLatitude(?float $Latitude): self
    {
        $this->Latitude = $Latitude;

        return $this;
    }

    // api platform return adresse of agence
    public function getAdresseAgence(): ?Adresse
    {
        return $this->Adresse;
    }





}


//