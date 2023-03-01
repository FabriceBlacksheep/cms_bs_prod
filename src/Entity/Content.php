<?php

namespace App\Entity;

// entity category

use App\Entity\Category;


use ApiPlatform\Metadata\ApiResource;
use App\Repository\ContentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContentRepository::class)]
#[ApiResource]
class Content
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $h1 = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $visuel = null;

    #[ORM\ManyToMany(targetEntity: Category::class, mappedBy: 'relation')]
    private Collection $content;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'contents')]
    private Collection $categories;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title_DE = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description_DE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $h1_DE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug_DE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title_EN = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description_EN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $h1_EN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug_EN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title_NL = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description_NL = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $h1_NL = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug_NL = null;

    public function __construct()
    {
        $this->content = new ArrayCollection();
        $this->categories = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getH1(): ?string
    {
        return $this->h1;
    }

    public function setH1(string $h1): self
    {
        $this->h1 = $h1;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getVisuel(): ?string
    {
        return $this->visuel;
    }

    public function setVisuel(?string $visuel): self
    {
        $this->visuel = $visuel;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getContent(): Collection
    {
        return $this->content;
    }

    public function addContent(Category $content): self
    {
        if (!$this->content->contains($content)) {
            $this->content->add($content);
            $content->addRelation($this);
        }

        return $this;
    }

    public function removeContent(Category $content): self
    {
        if ($this->content->removeElement($content)) {
            $content->removeRelation($this);
        }

        return $this;
    }

    // public function __toString()
    // {
    //     // access to the category title
    //     return $this->category->getTitle();

    // }

    // // return category from Content
    // public function getCategory(): Category
    // {
    //     return $this->category;
    // }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }


// // public funnction to return the category by content

//     public function getCategoryByContent(): Category
//     {
//         return $this->category;
//     }

public function getTitleDE(): ?string
{
    return $this->title_DE;
}

public function setTitleDE(?string $title_DE): self
{
    $this->title_DE = $title_DE;

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

public function getH1DE(): ?string
{
    return $this->h1_DE;
}

public function setH1DE(?string $h1_DE): self
{
    $this->h1_DE = $h1_DE;

    return $this;
}

public function getSlugDE(): ?string
{
    return $this->slug_DE;
}

public function setSlugDE(?string $slug_DE): self
{
    $this->slug_DE = $slug_DE;

    return $this;
}

public function getTitleEN(): ?string
{
    return $this->title_EN;
}

public function setTitleEN(?string $title_EN): self
{
    $this->title_EN = $title_EN;

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

public function getH1EN(): ?string
{
    return $this->h1_EN;
}

public function setH1EN(?string $h1_EN): self
{
    $this->h1_EN = $h1_EN;

    return $this;
}

public function getSlugEN(): ?string
{
    return $this->slug_EN;
}

public function setSlugEN(?string $slug_EN): self
{
    $this->slug_EN = $slug_EN;

    return $this;
}

public function getTitleNL(): ?string
{
    return $this->title_NL;
}

public function setTitleNL(?string $title_NL): self
{
    $this->title_NL = $title_NL;

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

public function getH1NL(): ?string
{
    return $this->h1_NL;
}

public function setH1NL(?string $h1_NL): self
{
    $this->h1_NL = $h1_NL;

    return $this;
}

public function getSlugNL(): ?string
{
    return $this->slug_NL;
}

public function setSlugNL(?string $slug_NL): self
{
    $this->slug_NL = $slug_NL;

    return $this;
}

}
