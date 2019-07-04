<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VueRepository")
 */
class Vue
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateVue;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Infoprofil", inversedBy="vues")
     */
    private $infoProfil;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="visiteds", cascade={"persist", "remove"})
     */
    private $visiteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateVue(): ?\DateTimeInterface
    {
        return $this->dateVue;
    }

    public function setDateVue(\DateTimeInterface $dateVue): self
    {
        $this->dateVue = $dateVue;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getInfoProfil(): ?Infoprofil
    {
        return $this->infoProfil;
    }

    public function setInfoProfil(?Infoprofil $infoProfil): self
    {
        $this->infoProfil = $infoProfil;

        return $this;
    }

    public function getVisiteur(): ?User
    {
        return $this->visiteur;
    }

    public function setVisiteur(?User $visiteur): self
    {
        $this->visiteur = $visiteur;

        return $this;
    }
}
