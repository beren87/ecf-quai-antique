<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null; 

    #[Assert\Length( 
        min: 4,
        max: 15,
        minMessage: 'Le nom de la réservation doit dépasser {{ limit }} caractères',
        maxMessage: 'Le nom de la réservation ne doit pas dépasser {{ limit }} caractères',
    )]
    #[Assert\Regex(pattern: "/^[a-zA-ZÀ-ÿ -]+$/", message: "Le nom de la réservation ne peut contenir uniquement des lettres")]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[Assert\Range(
        min: 2,
        max: 8,
        notInRangeMessage: 'Vous devez au minimum être {{ min }} et {{ max }} au maximum pour la réservation',
    )]
    #[ORM\Column]
    private ?int $numberGuests = null; 

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\GreaterThan("now", message: "Votre réservation ne peut pas être inférieure à la date d'aujourd'hui")]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $hours = null;

    
    #[ORM\Column(type: Types::TEXT)]
    private ?string $allergies = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Users $users = null;

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

    public function getNumberGuests(): ?int
    {
        return $this->numberGuests;
    }

    public function setNumberGuests(int $numberGuests): self
    {
        $this->numberGuests = $numberGuests;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHours(): ?\DateTimeInterface
    {
        return $this->hours;
    }

    public function setHours(\DateTimeInterface $hours): self
    {
        $this->hours = $hours;

        return $this;
    }

    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    public function setAllergies(string $allergies): self
    {
        $this->allergies = $allergies;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

}
