<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SecteurRepository")
 */
class Secteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $libelle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usersecteur", mappedBy="secteur")
     */
    private $userSecteurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Entreprisesecteur", mappedBy="secteur")
     */
    private $entrepriseSecteurs;

    public function __construct()
    {
        $this->userSecteurs = new ArrayCollection();
        $this->entrepriseSecteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Usersecteur[]
     */
    public function getUserSecteurs(): Collection
    {
        return $this->userSecteurs;
    }

    public function addUserSecteur(Usersecteur $userSecteur): self
    {
        if (!$this->userSecteurs->contains($userSecteur)) {
            $this->userSecteurs[] = $userSecteur;
            $userSecteur->setDomaine($this);
        }

        return $this;
    }

    public function removeUserSecteur(Usersecteur $userSecteur): self
    {
        if ($this->userSecteurs->contains($userSecteur)) {
            $this->userSecteurs->removeElement($userSecteur);
            // set the owning side to null (unless already changed)
            if ($userSecteur->getDomaine() === $this) {
                $userSecteur->setDomaine(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Entreprisesecteur[]
     */
    public function getEntrepriseSecteurs(): Collection
    {
        return $this->entrepriseSecteurs;
    }

    public function addEntrepriseSecteur(Entreprisesecteur $entrepriseSecteur): self
    {
        if (!$this->entrepriseSecteurs->contains($entrepriseSecteur)) {
            $this->entrepriseSecteurs[] = $entrepriseSecteur;
            $entrepriseSecteur->setSecteur($this);
        }

        return $this;
    }

    public function removeEntrepriseSecteur(Entreprisesecteur $entrepriseSecteur): self
    {
        if ($this->entrepriseSecteurs->contains($entrepriseSecteur)) {
            $this->entrepriseSecteurs->removeElement($entrepriseSecteur);
            // set the owning side to null (unless already changed)
            if ($entrepriseSecteur->getSecteur() === $this) {
                $entrepriseSecteur->setSecteur(null);
            }
        }

        return $this;
    }
}
