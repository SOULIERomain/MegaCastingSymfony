<?php

namespace App\Entity;

use App\Repository\OffreCastingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreCastingRepository::class)]
class OffreCasting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Libelle = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Reference = null;

    #[ORM\Column]
    private ?int $TypeContrat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateDebutDiffusion = null;

    #[ORM\Column]
    private ?int $DureeDiffusion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateDebutContrat = null;

    #[ORM\Column]
    private ?int $NbPoste = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $Description = null;

    #[ORM\ManyToMany(targetEntity: Civilite::class, inversedBy: 'offreCastings')]
    private Collection $IdentifiantCivilite;

    public function __construct()
    {
        $this->IdentifiantCivilite = new ArrayCollection();
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

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(?string $Reference): self
    {
        $this->Reference = $Reference;

        return $this;
    }

    public function getTypeContrat(): ?int
    {
        return $this->TypeContrat;
    }

    public function setTypeContrat(int $TypeContrat): self
    {
        $this->TypeContrat = $TypeContrat;

        return $this;
    }

    public function getDateDebutDiffusion(): ?\DateTimeInterface
    {
        return $this->DateDebutDiffusion;
    }

    public function setDateDebutDiffusion(\DateTimeInterface $DateDebutDiffusion): self
    {
        $this->DateDebutDiffusion = $DateDebutDiffusion;

        return $this;
    }

    public function getDureeDiffusion(): ?int
    {
        return $this->DureeDiffusion;
    }

    public function setDureeDiffusion(int $DureeDiffusion): self
    {
        $this->DureeDiffusion = $DureeDiffusion;

        return $this;
    }

    public function getDateDebutContrat(): ?\DateTimeInterface
    {
        return $this->DateDebutContrat;
    }

    public function setDateDebutContrat(\DateTimeInterface $DateDebutContrat): self
    {
        $this->DateDebutContrat = $DateDebutContrat;

        return $this;
    }

    public function getNbPoste(): ?int
    {
        return $this->NbPoste;
    }

    public function setNbPoste(int $NbPoste): self
    {
        $this->NbPoste = $NbPoste;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Civilite>
     */
    public function getIdentifiantCivilite(): Collection
    {
        return $this->IdentifiantCivilite;
    }

    public function addIdentifiantCivilite(Civilite $identifiantCivilite): self
    {
        if (!$this->IdentifiantCivilite->contains($identifiantCivilite)) {
            $this->IdentifiantCivilite->add($identifiantCivilite);
        }

        return $this;
    }

    public function removeIdentifiantCivilite(Civilite $identifiantCivilite): self
    {
        $this->IdentifiantCivilite->removeElement($identifiantCivilite);

        return $this;
    }
}
