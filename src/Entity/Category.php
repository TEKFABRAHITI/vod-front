<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $parentCategory = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $childCategories = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToMany(targetEntity: Video::class, mappedBy: 'categories')]
    private Collection $videos;

    public function __construct()
    {
        $this->videos = new ArrayCollection();
    }


    // ====================================================== //
// ==================== MAGIC FUNCTION =================== //
// ====================================================== //
    public function __toString(): string
    {
        return $this->name;
    }


    // ====================================================== //
// =================== GETTERS/SETTERS ================== //
// ====================================================== //
    
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getParentCategory(): ?string
    {
        return $this->parentCategory;
    }

    public function setParentCategory(?string $parentCategory): self
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    public function getChildCategories(): ?string
    {
        return $this->childCategories;
    }

    public function setChildCategories(?string $childCategories): self
    {
        $this->childCategories = $childCategories;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->addCategory($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            if ($video->getCategories()->contains($this)) {
                $video->removeCategory($this);
            }
        }

        return $this;
    }
}
