<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="text")
     */
    private $Synopsis;

    /**
     * @ORM\Column(type="integer")
     */
    private $Durée;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $BandeAnnonce;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDeSortie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Séance", mappedBy="Film_fk")
     */
    private $Seances;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Langue")
     */
    private $Langue_fk;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category")
     */
    private $Category_fk;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notation", mappedBy="Film_fk")
     */
    private $notations;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Réalisateur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Acteurs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nationnalité;

    public function __construct()
    {
        $this->Seances = new ArrayCollection();
        $this->Langue_fk = new ArrayCollection();
        $this->Category_fk = new ArrayCollection();
        $this->notations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->Synopsis;
    }

    public function setSynopsis(string $Synopsis): self
    {
        $this->Synopsis = $Synopsis;

        return $this;
    }

    public function getDurée(): ?int
    {
        return $this->Durée;
    }

    public function setDurée(int $Durée): self
    {
        $this->Durée = $Durée;

        return $this;
    }

    public function getBandeAnnonce(): ?string
    {
        return $this->BandeAnnonce;
    }

    public function setBandeAnnonce(?string $BandeAnnonce): self
    {
        $this->BandeAnnonce = $BandeAnnonce;

        return $this;
    }

    public function getDateDeSortie(): ?\DateTimeInterface
    {
        return $this->DateDeSortie;
    }

    public function setDateDeSortie(\DateTimeInterface $DateDeSortie): self
    {
        $this->DateDeSortie = $DateDeSortie;

        return $this;
    }

    /**
     * @return Collection|Séance[]
     */
    public function getSeances(): Collection
    {
        return $this->Seances;
    }

    public function addSeance(Séance $seance): self
    {
        if (!$this->Seances->contains($seance)) {
            $this->Seances[] = $seance;
            $seance->setFilmFk($this);
        }

        return $this;
    }

    public function removeSeance(Séance $seance): self
    {
        if ($this->Seances->contains($seance)) {
            $this->Seances->removeElement($seance);
            // set the owning side to null (unless already changed)
            if ($seance->getFilmFk() === $this) {
                $seance->setFilmFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Langue[]
     */
    public function getLangueFk(): Collection
    {
        return $this->Langue_fk;
    }

    public function addLangueFk(Langue $langueFk): self
    {
        if (!$this->Langue_fk->contains($langueFk)) {
            $this->Langue_fk[] = $langueFk;
        }

        return $this;
    }

    public function removeLangueFk(Langue $langueFk): self
    {
        if ($this->Langue_fk->contains($langueFk)) {
            $this->Langue_fk->removeElement($langueFk);
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategoryFk(): Collection
    {
        return $this->Category_fk;
    }

    public function addCategoryFk(Category $categoryFk): self
    {
        if (!$this->Category_fk->contains($categoryFk)) {
            $this->Category_fk[] = $categoryFk;
        }

        return $this;
    }

    public function removeCategoryFk(Category $categoryFk): self
    {
        if ($this->Category_fk->contains($categoryFk)) {
            $this->Category_fk->removeElement($categoryFk);
        }

        return $this;
    }

    /**
     * @return Collection|Notation[]
     */
    public function getNotations(): Collection
    {
        return $this->notations;
    }

    public function addNotation(Notation $notation): self
    {
        if (!$this->notations->contains($notation)) {
            $this->notations[] = $notation;
            $notation->setFilmFk($this);
        }

        return $this;
    }

    public function removeNotation(Notation $notation): self
    {
        if ($this->notations->contains($notation)) {
            $this->notations->removeElement($notation);
            // set the owning side to null (unless already changed)
            if ($notation->getFilmFk() === $this) {
                $notation->setFilmFk(null);
            }
        }

        return $this;
    }

    public function getRéalisateur(): ?string
    {
        return $this->Réalisateur;
    }

    public function setRéalisateur(?string $Réalisateur): self
    {
        $this->Réalisateur = $Réalisateur;

        return $this;
    }

    public function getActeurs(): ?string
    {
        return $this->Acteurs;
    }

    public function setActeurs(?string $Acteurs): self
    {
        $this->Acteurs = $Acteurs;

        return $this;
    }

    public function getNationnalité(): ?string
    {
        return $this->Nationnalité;
    }

    public function setNationnalité(string $Nationnalité): self
    {
        $this->Nationnalité = $Nationnalité;

        return $this;
    }
}
