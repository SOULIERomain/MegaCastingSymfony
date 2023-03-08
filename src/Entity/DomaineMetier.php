<?php

namespace App\Entity;

use App\Repository\DomaineMetierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomaineMetierRepository::class)]
class DomaineMetier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Libelle = null;

    #[ORM\Column(length: 150)]
    private ?string $Description = null;

    #[ORM\OneToMany(mappedBy: 'IdentifiantDomaineMetier', targetEntity: Metier::class)]
    private Collection $metiers;

    public function __construct()
    {
        $this->metiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Metier>
     */
    public function getMetiers(): Collection
    {
        return $this->metiers;
    }

    public function addMetier(Metier $metier): self
    {
        if (!$this->metiers->contains($metier)) {
            $this->metiers->add($metier);
            $metier->setIdentifiantDomaineMetier($this);
        }

        return $this;
    }

    public function removeMetier(Metier $metier): self
    {
        if ($this->metiers->removeElement($metier)) {
            // set the owning side to null (unless already changed)
            if ($metier->getIdentifiantDomaineMetier() === $this) {
                $metier->setIdentifiantDomaineMetier(null);
            }
        }

        return $this;
    }
}
