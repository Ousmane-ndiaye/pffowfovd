<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DomaineRepository")
 */
class Domaine
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
     * @ORM\OneToMany(targetEntity="App\Entity\Userdomaine", mappedBy="domaine")
     */
    private $userDomaines;

    public function __construct()
    {
        $this->userDomaines = new ArrayCollection();
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
     * @return Collection|Userdomaine[]
     */
    public function getUserDomaines(): Collection
    {
        return $this->userDomaines;
    }

    public function addUserDomaine(Userdomaine $userDomaine): self
    {
        if (!$this->userDomaines->contains($userDomaine)) {
            $this->userDomaines[] = $userDomaine;
            $userDomaine->setDomaine($this);
        }

        return $this;
    }

    public function removeUserDomaine(Userdomaine $userDomaine): self
    {
        if ($this->userDomaines->contains($userDomaine)) {
            $this->userDomaines->removeElement($userDomaine);
            // set the owning side to null (unless already changed)
            if ($userDomaine->getDomaine() === $this) {
                $userDomaine->setDomaine(null);
            }
        }

        return $this;
    }
}
