<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ImgGalleryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImgGalleryRepository::class)]
#[ApiResource]
class ImgGallery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500, nullable: true)]
    //private ?string $imgFile = null;
    private ?array $imgFile = null;

    #[ORM\OneToOne(mappedBy: 'ImgGallery', cascade: ['persist', 'remove'])]
    private ?Campervan $campervan = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgFile(): ?array
    {
        return $this->imgFile;
    }

    // public function setImgFile(?string $imgFile): self
    // {
    //     $this->imgFile = $imgFile;

    //     return $this;
    // }


// public function setImgFile array type
    // public function setImgFile(?array $imgFile): self
    // {
    //     $this->imgFile = $imgFile;

    //     return $this;
    // }



// public funtion setImgFile array type to collect files
    public function setImgFile(?array $imgFile): self
    {
        $this->imgFile = $imgFile;

        return $this;
    }




    public function getCampervan(): ?Campervan
    {
        return $this->campervan;
    }

    public function setCampervan(?Campervan $campervan): self
    {
        // unset the owning side of the relation if necessary
        if ($campervan === null && $this->campervan !== null) {
            $this->campervan->setImgGallery(null);
        }

        // set the owning side of the relation if necessary
        if ($campervan !== null && $campervan->getImgGallery() !== $this) {
            $campervan->setImgGallery($this);
        }

        $this->campervan = $campervan;

        return $this;
    }
}
