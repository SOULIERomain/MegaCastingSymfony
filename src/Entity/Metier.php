<?php

namespace App\Entity;

use App\Repository\MetierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetierRepository::class)]
#[ORM\Table(name: "Metier")]
class Metier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 50, name: "Libelle")]
    private ?string $Libelle = null;

    #[ORM\Column(length: 50, name: "Description")]
    private ?string $Description = null;

    #[ORM\OneToMany(mappedBy: 'IdentifiantMetier', targetEntity: OffreCasting::class)]
    private Collection $offreCastings;

    #[ORM\ManyToOne(inversedBy: 'metiers', targetEntity: DomaineMetier::class)]
    #[ORM\JoinColumn(name: 'IdentifiantDomaineMetier', referencedColumnName: 'Identifiant')]
    private ?DomaineMetier $domainemetier = null;

    public function __construct()
    {
        $this->offreCastings = new ArrayCollection();
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
     * @return Collection<int, OffreCasting>
     */
    public function getOffreCastings(): Collection
    {
        return $this->offreCastings;
    }

    public function addOffreCasting(OffreCasting $offreCasting): self
    {
        if (!$this->offreCastings->contains($offreCasting)) {
            $this->offreCastings->add($offreCasting);
            $offreCasting->setIdentifiantMetier($this);
        }

        return $this;
    }

    public function removeOffreCasting(OffreCasting $offreCasting): self
    {
        if ($this->offreCastings->removeElement($offreCasting)) {
            // set the owning side to null (unless already changed)
            if ($offreCasting->getIdentifiantMetier() === $this) {
                $offreCasting->setIdentifiantMetier(null);
            }
        }

        return $this;
    }

    public function getIdentifiantDomaineMetier(): ?DomaineMetier
    {
        return $this->IdentifiantDomaineMetier;
    }

    public function setIdentifiantDomaineMetier(?DomaineMetier $IdentifiantDomaineMetier): self
    {
        $this->IdentifiantDomaineMetier = $IdentifiantDomaineMetier;

        return $this;
    }
}
