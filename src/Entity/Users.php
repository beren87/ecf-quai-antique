<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Un compte a déjà été créé avec cette adresse email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: 'Veuillez renseigner un email.')]
    #[Assert\Email(
        message: 'L\'email {{ value }}, n•\'est pas une adresse email valide.',
    )]
    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = ['ROLE_USER'];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[Assert\Length(
        min: 2,
        max: 30,
        minMessage: 'Le nom pour vous inscrire doit dépasser {{ limit }} caractères',
        maxMessage: 'Le nom pour vous inscrire ne doit pas dépasser {{ limit }} caractères',
    )]
    #[Assert\Regex(pattern: "/^[a-zA-ZÀ-ÿ -]+$/", message: "Le nom de famille doit contenir uniquement des lettres")]
    #[ORM\Column(length: 150)]
    private ?string $lastname = null;

    #[Assert\Length(
        min: 2,
        max: 30,
        minMessage: 'Le prénom pour vous inscrire doit dépasser {{ limit }} caractère',
        maxMessage: 'Le prénom pour vous inscrire ne doit pas dépasser {{ limit }} caractères',
    )]
    #[Assert\Regex(pattern: "/^[a-zA-ZÀ-ÿ -]+$/", message: "Le prénom doit contenir uniquement des lettres")]
    #[ORM\Column(length: 150)]
    private ?string $firstname = null;

    #[Assert\NotBlank(message: 'Veuillez saisir une adresse')]
    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[Assert\Range( 
        min: 5,
        notInRangeMessage: 'Votre code postal doit contenir au minimum {{ min }} chiffre',
    )]
    #[ORM\Column(length: 5)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 150)]
    private ?string $city = null; 

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: Reservations::class)]
    private Collection $reservations;

    #[Assert\Range(
        min: 2,
        max: 8,
        notInRangeMessage: 'Vous devez au minimum être {{ min }} et {{ max }} au maximum pour la réservation',
    )]
    #[ORM\Column]
    private ?int $nbGuests = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $allergiesMentioned = null;
   

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection<int, Reservations>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservations $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setUsers($this);
        } 

        return $this;
    }

    public function removeReservation(Reservations $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getUsers() === $this) {
                $reservation->setUsers(null);
            }
        }

        return $this;
    }
    
     public function __toString(): string    
    { 
          return $this->lastname;
     }

     public function getNbGuests(): ?int
     {
         return $this->nbGuests;
     }

     public function setNbGuests(int $nbGuests): self
     {
         $this->nbGuests = $nbGuests;

         return $this;
     }

     public function getAllergiesMentioned(): ?string
     {
         return $this->allergiesMentioned;
     }

     public function setAllergiesMentioned(string $allergiesMentioned): self
     {
         $this->allergiesMentioned = $allergiesMentioned;

         return $this;
     } 
}
