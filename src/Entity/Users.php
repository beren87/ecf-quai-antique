<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = ['ROLE_USER'];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 150)]
    private ?string $lastname = null;

    #[ORM\Column(length: 150)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 5)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 150)]
    private ?string $city = null;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: Reservations::class)]
    private Collection $reservations;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: Menus::class)]
    private Collection $menuses;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: Images::class)]
    private Collection $images;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: Dishes::class)]
    private Collection $dishes;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: OpeningHours::class)]
    private Collection $openingHours;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: Footer::class)]
    private Collection $footers;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: GuestLimit::class)]
    private Collection $guestLimits;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->menuses = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->dishes = new ArrayCollection();
        $this->openingHours = new ArrayCollection();
        $this->footers = new ArrayCollection();
        $this->guestLimits = new ArrayCollection();
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

    /**
     * @return Collection<int, Menus>
     */
    public function getMenuses(): Collection
    {
        return $this->menuses;
    }

    public function addMenus(Menus $menus): self
    {
        if (!$this->menuses->contains($menus)) {
            $this->menuses->add($menus);
            $menus->setUsers($this);
        }

        return $this;
    }

    public function removeMenus(Menus $menus): self
    {
        if ($this->menuses->removeElement($menus)) {
            // set the owning side to null (unless already changed)
            if ($menus->getUsers() === $this) {
                $menus->setUsers(null);
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
            $image->setUsers($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getUsers() === $this) {
                $image->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Dishes>
     */
    public function getDishes(): Collection
    {
        return $this->dishes;
    }

    public function addDish(Dishes $dish): self
    {
        if (!$this->dishes->contains($dish)) {
            $this->dishes->add($dish);
            $dish->setUsers($this);
        }

        return $this;
    }

    public function removeDish(Dishes $dish): self
    {
        if ($this->dishes->removeElement($dish)) {
            // set the owning side to null (unless already changed)
            if ($dish->getUsers() === $this) {
                $dish->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, OpeningHours>
     */
    public function getOpeningHours(): Collection
    {
        return $this->openingHours;
    }

    public function addOpeningHour(OpeningHours $openingHour): self
    {
        if (!$this->openingHours->contains($openingHour)) {
            $this->openingHours->add($openingHour);
            $openingHour->setUsers($this);
        }

        return $this;
    }

    public function removeOpeningHour(OpeningHours $openingHour): self
    {
        if ($this->openingHours->removeElement($openingHour)) {
            // set the owning side to null (unless already changed)
            if ($openingHour->getUsers() === $this) {
                $openingHour->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Footer>
     */
    public function getFooters(): Collection
    {
        return $this->footers;
    }

    public function addFooter(Footer $footer): self
    {
        if (!$this->footers->contains($footer)) {
            $this->footers->add($footer);
            $footer->setUsers($this);
        }

        return $this;
    }

    public function removeFooter(Footer $footer): self
    {
        if ($this->footers->removeElement($footer)) {
            // set the owning side to null (unless already changed)
            if ($footer->getUsers() === $this) {
                $footer->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GuestLimit>
     */
    public function getGuestLimits(): Collection
    {
        return $this->guestLimits;
    }

    public function addGuestLimit(GuestLimit $guestLimit): self
    {
        if (!$this->guestLimits->contains($guestLimit)) {
            $this->guestLimits->add($guestLimit);
            $guestLimit->setUsers($this);
        }

        return $this;
    }

    public function removeGuestLimit(GuestLimit $guestLimit): self
    {
        if ($this->guestLimits->removeElement($guestLimit)) {
            // set the owning side to null (unless already changed)
            if ($guestLimit->getUsers() === $this) {
                $guestLimit->setUsers(null);
            }
        }

        return $this;
    }

     public function __toString(): string    
    {
          return $this->username;
     } 
}
