<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Assert\Length(
     *      max = 200,
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $diplome;

    /**
     * @ORM\Column(type="string", length=200)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = 200,
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $ecole;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *      max = 300,
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="formations")
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *      min = 1,
     *      max = 4,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $moisDeDebut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *  @Assert\Length(
     *      min = 4,
     *      max = 8,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $anneeDeDebut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *  @Assert\Length(
     *      min = 1,
     *      max = 4,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $moisDeFin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *      min = 4,
     *      max = 8,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $anneeDeFin;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Assert\Length(
     *      max = 200,
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $domaineEtude;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getEcole(): ?string
    {
        return $this->ecole;
    }

    public function setEcole(string $ecole): self
    {
        $this->ecole = $ecole;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMoisDeDebut(): ?int
    {
        return $this->moisDeDebut;
    }

    public function setMoisDeDebut($moisDeDebut): self
    {
        if ($moisDeDebut == '') {
            $this->moisDeDebut = NULL;
        } else {
            $this->moisDeDebut = (int)$moisDeDebut;
        }

        return $this;
    }

    public function getAnneeDeDebut(): ?int
    {
        return $this->anneeDeDebut;
    }

    public function setAnneeDeDebut($anneeDeDebut): self
    {
        if ($anneeDeDebut == '') {
            $this->anneeDeDebut = NULL;
        } else {
            $this->anneeDeDebut = (int)$anneeDeDebut;
        }

        return $this;
    }

    public function getMoisDeFin(): ?int
    {
        return $this->moisDeFin;
    }

    public function setMoisDeFin($moisDeFin): self
    {
        if ($moisDeFin == '') {
            $this->moisDeFin = NULL;
        } else {
            $this->moisDeFin = (int)$moisDeFin;
        }

        return $this;
    }

    public function getAnneeDeFin(): ?int
    {
        return $this->anneeDeFin;
    }

    public function setAnneeDeFin(?int $anneeDeFin): self
    {
        if ($anneeDeFin == '') {
            $this->anneeDeFin = NULL;
        } else {
            $this->anneeDeFin = (int)$anneeDeFin;
        }

        return $this;
    }

    public function getDomaineEtude(): ?string
    {
        return $this->domaineEtude;
    }

    public function setDomaineEtude(?string $domaineEtude): self
    {
        $this->domaineEtude = $domaineEtude;

        return $this;
    }
}
