<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\MappedSuperclass
 */
abstract class BaseUser
{
    const ROLE_USER = 'ROLE_USER';
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="text")
     */
    protected $password;

    /**
     * @ORM\Column(type="json")
     */
    protected $roles = [];

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     */
    protected $nom;

    public function __construct()
    {
        $this->roles = [self::ROLE_USER];
        $this->isActive = true;
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

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $UserRoles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $UserRoles[] = self::ROLE_USER;

        return array_unique($UserRoles);
    }

    public function setRoles($profil): self
    {
        switch ($profil) {
            case 'professionnel':
                $this->roles = ['ROLE_PROFESSIONNEL'];
                break;

            case 'entreprise':
                $this->roles = ['ROLE_ENTREPRISE'];
                break;

            case 'admin':
                $this->roles = ['ROLE_ADMIN'];
                break;

            case 'super admin':
                $this->roles = ['ROLE_SUPER_ADMIN'];
                break;

            default:
                $this->roles = [self::ROLE_USER];
                break;
        }

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
    }

    public function __toString(): string
    {
        return (string) $this->email;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function encodePassword()
    {
        # code...
    }
}
