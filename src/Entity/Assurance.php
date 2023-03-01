<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AssuranceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssuranceRepository::class)]
#[ApiResource]

class Assurance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $idLocpro = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getIdLocpro(): ?string
    {
        return $this->idLocpro;
    }

    public function setIdLocpro(?string $idLocpro): self
    {
        $this->idLocpro = $idLocpro;

        return $this;
    }
}
