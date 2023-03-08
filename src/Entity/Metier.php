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
    private ?string $libelle = null;

    #[ORM\Column(length: 50, name: "Description")]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'metier', targetEntity: OffreCasting::class)]
    private Collection $offreCastings;

    #[ORM\ManyToOne(inversedBy: 'metiers', targetEntity: DomaineMetier::class)]
    #[ORM\JoinColumn(name: 'IdentifiantDomaineMetier', referencedColumnName: 'Identifiant')]
    private ?DomaineMetier $domaineMetier = null;

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

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
            $offreCasting->setMetier($this);
        }

        return $this;
    }

    public function removeOffreCasting(OffreCasting $offreCasting): self
    {
        if ($this->offreCastings->removeElement($offreCasting)) {
            // set the owning side to null (unless already changed)
            if ($offreCasting->getMetier() === $this) {
                $offreCasting->setMetier(null);
            }
        }

        return $this;
    }

    public function getDomaineMetier(): ?DomaineMetier
    {
        return $this->domaineMetier;
    }

    public function setDomaineMetier(?DomaineMetier $domaineMetier): self
    {
        $this->domaineMetier = $domaineMetier;

        return $this;
    }
}
