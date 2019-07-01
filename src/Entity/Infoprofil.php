<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InfoprofilRepository")
 */
class Infoprofil
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
    private $titreProfil;

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
    private $situation;

    /**
     * @ORM\Column(type="json")
     * @Assert\NotBlank()
     */
    private $competences;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *      max = 600,
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Url
     */
    private $website;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Url
     */
    private $twitter;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Url
     */
    private $linkedin;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="infoprofil", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vue", mappedBy="infoProfil")
     */
    private $vues;

    public function __construct()
    {
        $this->vues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreProfil(): ?string
    {
        return $this->titreProfil;
    }

    public function setTitreProfil(string $titreProfil): self
    {
        $this->titreProfil = $titreProfil;

        return $this;
    }

    public function getSituation(): ?string
    {
        return $this->situation;
    }

    public function setSituation(string $situation): self
    {
        $this->situation = $situation;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Vue[]
     */
    public function getVues(): Collection
    {
        return $this->vues;
    }

    public function addVue(Vue $vue): self
    {
        if (!$this->vues->contains($vue)) {
            $this->vues[] = $vue;
            $vue->setInfoProfil($this);
        }

        return $this;
    }

    public function removeVue(Vue $vue): self
    {
        if ($this->vues->contains($vue)) {
            $this->vues->removeElement($vue);
            // set the owning side to null (unless already changed)
            if ($vue->getInfoProfil() === $this) {
                $vue->setInfoProfil(null);
            }
        }

        return $this;
    }
}
