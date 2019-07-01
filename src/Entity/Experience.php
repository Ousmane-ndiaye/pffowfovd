<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
 */
class Experience
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=200)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $intitulePoste;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $lieu;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isCurrent;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *      max = 300,
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $competences;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="experiences")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 1,
     *      max = 4,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $moisDeDebut;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 4,
     *      max = 8,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $anneeDeDebut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getIntitulePoste(): ?string
    {
        return $this->intitulePoste;
    }

    public function setIntitulePoste(string $intitulePoste): self
    {
        $this->intitulePoste = $intitulePoste;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getIsCurrent(): ?bool
    {
        return $this->isCurrent;
    }

    public function setIsCurrent(bool $isCurrent): self
    {
        $this->isCurrent = $isCurrent;

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

    public function getCompetences()
    {
        if ($this->competences != "") {
            return implode(";", $this->competences);
        }
        return "";
    }

    public function setCompetences($competences): self
    {
        $this->competences = explode(";", $competences);

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

    public function setMoisDeDebut(int $moisDeDebut): self
    {
        $this->moisDeDebut = $moisDeDebut;

        return $this;
    }

    public function getAnneeDeDebut(): ?int
    {
        return $this->anneeDeDebut;
    }

    public function setAnneeDeDebut(int $anneeDeDebut): self
    {
        $this->anneeDeDebut = $anneeDeDebut;

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

    public function setAnneeDeFin($anneeDeFin): self
    {
        if ($anneeDeFin == '') {
            $this->anneeDeFin = NULL;
        } else {
            $this->anneeDeFin = (int)$anneeDeFin;
        }

        return $this;
    }
}
