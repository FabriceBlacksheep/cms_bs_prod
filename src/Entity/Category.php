<?php

namespace App\Entity;

// use controller category
use App\Controller\CategoryController;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]



#[ApiResource]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToMany(targetEntity: Content::class, inversedBy: 'content')]
    private Collection $relation;

    #[ORM\ManyToMany(targetEntity: Content::class, mappedBy: 'categories')]
    private Collection $contents;



    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->contents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, Content>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Content $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
        }

        return $this;
    }

    public function removeRelation(Content $relation): self
    {
        $this->relation->removeElement($relation);

        return $this;
    }

    /**
     * @return Collection<int, Content>
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    public function addContent(Content $content): self
    {
        if (!$this->contents->contains($content)) {
            $this->contents->add($content);
            $content->addCategory($this);
        }

        return $this;
    }

    public function removeContent(Content $content): self
    {
        if ($this->contents->removeElement($content)) {
            $content->removeCategory($this);
        }

        return $this;
    }

    // create api route to get content by category
    public function getContentsByCategory(): Collection
    {
        return $this->contents;
    }





}
