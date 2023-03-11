<?php

namespace App\Entity;

use App\Repository\ImagesHomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesHomeRepository::class)]
class ImagesHome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $file = null;

    #[ORM\ManyToOne(inversedBy: 'imagesHomes')]
    private ?CategorieImages $categorieImages = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getCategorieImages(): ?CategorieImages
    {
        return $this->categorieImages;
    }

    public function setCategorieImages(?CategorieImages $categorieImages): self
    {
        $this->categorieImages = $categorieImages;

        return $this;
    }
}
