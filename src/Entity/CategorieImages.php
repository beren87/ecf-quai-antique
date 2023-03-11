<?php

namespace App\Entity;

use App\Repository\CategorieImagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieImagesRepository::class)]
class CategorieImages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'categorieImages', targetEntity: ImagesBrigade::class)]
    private Collection $imagesBrigades;

    #[ORM\OneToMany(mappedBy: 'categorieImages', targetEntity: Images::class)]
    private Collection $images;

    #[ORM\OneToMany(mappedBy: 'categorieImages', targetEntity: ImagesHome::class)]
    private Collection $imagesHomes;

    public function __construct()
    {
        $this->imagesBrigades = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->imagesHomes = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, ImagesBrigade>
     */
    public function getImagesBrigades(): Collection
    {
        return $this->imagesBrigades;
    }

    public function addImagesBrigade(ImagesBrigade $imagesBrigade): self
    {
        if (!$this->imagesBrigades->contains($imagesBrigade)) {
            $this->imagesBrigades->add($imagesBrigade);
            $imagesBrigade->setCategorieImages($this);
        }

        return $this;
    }

    public function removeImagesBrigade(ImagesBrigade $imagesBrigade): self
    {
        if ($this->imagesBrigades->removeElement($imagesBrigade)) {
            // set the owning side to null (unless already changed)
            if ($imagesBrigade->getCategorieImages() === $this) {
                $imagesBrigade->setCategorieImages(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setCategorieImages($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getCategorieImages() === $this) {
                $image->setCategorieImages(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ImagesHome>
     */
    public function getImagesHomes(): Collection
    {
        return $this->imagesHomes;
    }

    public function addImagesHome(ImagesHome $imagesHome): self
    {
        if (!$this->imagesHomes->contains($imagesHome)) {
            $this->imagesHomes->add($imagesHome);
            $imagesHome->setCategorieImages($this);
        }

        return $this;
    }

    public function removeImagesHome(ImagesHome $imagesHome): self
    {
        if ($this->imagesHomes->removeElement($imagesHome)) {
            // set the owning side to null (unless already changed)
            if ($imagesHome->getCategorieImages() === $this) {
                $imagesHome->setCategorieImages(null);
            }
        }

        return $this;
    }
}
