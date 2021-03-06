<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Mgilet\NotificationBundle\Annotation\Notifiable;
use Mgilet\NotificationBundle\NotifiableInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("email", message="Un compte avec cette même adresse email existe déjà.")
 * @Notifiable(name="user")
 */
class User extends BaseUser implements UserInterface, NotifiableInterface
{
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isVisible;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $pays;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Infoprofil", mappedBy="user", cascade={"persist", "remove"})
     */
    private $infoprofil;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="user")
     */
    private $videos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Formation", mappedBy="user")
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Experience", mappedBy="user")
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Langue", mappedBy="user")
     */
    private $langues;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usersecteur", mappedBy="user", cascade={"persist"})
     */
    private $userSecteurs;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vue", mappedBy="visiteur")
     */
    private $visiteds;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnes", mappedBy="user")
     */
    private $personnes;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Entreprise", inversedBy="representant", cascade={"persist", "remove"})
     */
    private $entreprise;

    public function __construct()
    {
        parent::__construct();
        $this->videos = new ArrayCollection();
        $this->formations = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->langues = new ArrayCollection();
        $this->userSecteurs = new ArrayCollection();
        $this->visiteds = new ArrayCollection();
        $this->personnes = new ArrayCollection();
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(?bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getBirthday()
    {
        if (is_a($this->birthday, 'DateTime')) {
            return $this->birthday->format('d/m/Y');
        }
        return $this->birthday;
    }

    public function setBirthday($birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getInfoprofil(): ?Infoprofil
    {
        return $this->infoprofil;
    }

    public function setInfoprofil(?Infoprofil $infoprofil): self
    {
        $this->infoprofil = $infoprofil;

        // set (or unset) the owning side of the relation if necessary
        $newUser = $infoprofil === null ? null : $this;
        if ($newUser !== $infoprofil->getUser()) {
            $infoprofil->setUser($newUser);
        }

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setUser($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->contains($video)) {
            $this->videos->removeElement($video);
            // set the owning side to null (unless already changed)
            if ($video->getUser() === $this) {
                $video->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setUser($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->contains($formation)) {
            $this->formations->removeElement($formation);
            // set the owning side to null (unless already changed)
            if ($formation->getUser() === $this) {
                $formation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setUser($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->contains($experience)) {
            $this->experiences->removeElement($experience);
            // set the owning side to null (unless already changed)
            if ($experience->getUser() === $this) {
                $experience->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Langue[]
     */
    public function getLangues(): Collection
    {
        return $this->langues;
    }

    public function addLangue(Langue $langue): self
    {
        if (!$this->langues->contains($langue)) {
            $this->langues[] = $langue;
            $langue->setUser($this);
        }

        return $this;
    }

    public function removeLangue(Langue $langue): self
    {
        if ($this->langues->contains($langue)) {
            $this->langues->removeElement($langue);
            // set the owning side to null (unless already changed)
            if ($langue->getUser() === $this) {
                $langue->setUser(null);
            }
        }

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
            $userSecteur->setUser($this);
        }

        return $this;
    }

    public function removeUserSecteur(Usersecteur $userSecteur): self
    {
        if ($this->userSecteurs->contains($userSecteur)) {
            $this->userSecteurs->removeElement($userSecteur);
            // set the owning side to null (unless already changed)
            if ($userSecteur->getUser() === $this) {
                $userSecteur->setUser(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function updateSecteurs($newSecteurs)
    {
        foreach ($newSecteurs as $newSecteur) {
            $userSecteur = new Usersecteur();
            $userSecteur->setSecteur($newSecteur);
            $this->addUserSecteur($userSecteur);
        }
    }

    /**
     * @return Collection|Vue[]
     */
    public function getVisiteds(): Collection
    {
        return $this->visiteds;
    }

    public function addVisited(Vue $visited): self
    {
        if (!$this->visiteds->contains($visited)) {
            $this->visiteds[] = $visited;
            $visited->setVisiteur($this);
        }

        return $this;
    }

    public function removeVisited(Vue $visited): self
    {
        if ($this->visiteds->contains($visited)) {
            $this->visiteds->removeElement($visited);
            // set the owning side to null (unless already changed)
            if ($visited->getVisiteur() === $this) {
                $visited->setVisiteur(null);
            }
        }

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
            $personne->setUser($this);
        }

        return $this;
    }

    public function removePersonne(Personnes $personne): self
    {
        if ($this->personnes->contains($personne)) {
            $this->personnes->removeElement($personne);
            // set the owning side to null (unless already changed)
            if ($personne->getUser() === $this) {
                $personne->setUser(null);
            }
        }

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
