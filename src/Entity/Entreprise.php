<?php

namespace App\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 * @UniqueEntity("libelle", message="Une entreprise avec le même nom éxiste déjà.")
 */
class Entreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presentation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tailleEntreprise;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 200,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $siegeSocial;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = 15,
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $tel;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $twitter;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $linkedin;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $dateFondation;

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
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plan", inversedBy="entreprises")
     */
    private $plan;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnes", mappedBy="entreprise")
     */
    private $personnes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Entreprisesecteur", mappedBy="entreprise")
     */
    private $entreprisesecteurs;

    /**
     * @ORM\Column(type="text")
     */
    private $slug;

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
    private $libelle;

    public function __construct()
    {
        $this->personnes = new ArrayCollection();
        $this->entreprisesecteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getTailleEntreprise(): ?int
    {
        return $this->tailleEntreprise;
    }

    public function setTailleEntreprise(?int $tailleEntreprise): self
    {
        $this->tailleEntreprise = $tailleEntreprise;

        return $this;
    }

    public function getSiegeSocial(): ?string
    {
        return $this->siegeSocial;
    }

    public function setSiegeSocial(?string $siegeSocial): self
    {
        $this->siegeSocial = $siegeSocial;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getDateFondation(): ?string
    {
        return $this->dateFondation;
    }

    public function setDateFondation(?string $dateFondation): self
    {
        $this->dateFondation = $dateFondation;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPlan(): ?Plan
    {
        return $this->plan;
    }

    public function setPlan(?Plan $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * @return Collection|Personnes[]
     */
    public function getPersonnes(): Collection
    {
        return $this->personnes;
    }

    public function addPersonne(Personnes $personne): self
    {
        if (!$this->personnes->contains($personne)) {
            $this->personnes[] = $personne;
            $personne->setEntreprise($this);
        }

        return $this;
    }

    public function removePersonne(Personnes $personne): self
    {
        if ($this->personnes->contains($personne)) {
            $this->personnes->removeElement($personne);
            // set the owning side to null (unless already changed)
            if ($personne->getEntreprise() === $this) {
                $personne->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Entreprisesecteur[]
     */
    public function getEntreprisesecteurs(): Collection
    {
        return $this->entreprisesecteurs;
    }

    public function addEntreprisesecteur(Entreprisesecteur $entreprisesecteur): self
    {
        if (!$this->entreprisesecteurs->contains($entreprisesecteur)) {
            $this->entreprisesecteurs[] = $entreprisesecteur;
            $entreprisesecteur->setEntreprise($this);
        }

        return $this;
    }

    public function removeEntreprisesecteur(Entreprisesecteur $entreprisesecteur): self
    {
        if ($this->entreprisesecteurs->contains($entreprisesecteur)) {
            $this->entreprisesecteurs->removeElement($entreprisesecteur);
            // set the owning side to null (unless already changed)
            if ($entreprisesecteur->getEntreprise() === $this) {
                $entreprisesecteur->setEntreprise(null);
            }
        }

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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }
}
