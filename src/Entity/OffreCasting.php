<?php

namespace App\Entity;

use App\Repository\OffreCastingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreCastingRepository::class)]
#[ORM\Table(name: "OffreCasting")]
class OffreCasting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 50, name: "Libelle")]
    private ?string $libelle = null;

    #[ORM\Column(length: 50, nullable: true, name: "Reference")]
    private ?string $reference = null;

    #[ORM\Column(name: "TypeContrat")]
    private ?int $typeContrat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name: "DateDebutDiffusion")]
    private ?\DateTimeInterface $dateDebutDiffusion = null;

    #[ORM\Column(name: "DureeDiffusion")]
    private ?int $dureeDiffusion = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name: "DateDebutContrat")]
    private ?\DateTimeInterface $dateDebutContrat = null;

    #[ORM\Column(name: "NbPoste")]
    private ?int $nbPoste = null;

    #[ORM\Column(length: 500, nullable: true, name: "Description")]
    private ?string $description = null;

    #[ORM\JoinTable(name: 'OffreCastingCivilite')]
    #[ORM\JoinColumn(name: 'IdentifiantCivilite', referencedColumnName: 'Identifiant')]
    #[ORM\InverseJoinColumn(name: 'IdentifiantOffreCasting', referencedColumnName: 'Identifiant')]
    #[ORM\ManyToMany(targetEntity: Civilite::class, inversedBy: 'offreCastings')]
    private Collection $IdentifiantCivilite;

    #[ORM\ManyToOne(inversedBy: 'offreCastings')]
    #[ORM\JoinColumn(name: 'IdentifiantClient', referencedColumnName: 'Identifiant', nullable: false)]
    private ?Client $IdentifiantClient = null;

    #[ORM\ManyToOne(inversedBy: 'offreCastings')]
    #[ORM\JoinColumn(name: 'IdentifiantMetier', referencedColumnName: 'Identifiant', nullable: false)]
    private ?Metier $IdentifiantMetier = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'IdentifiantTypeContrat', referencedColumnName: 'Identifiant')]
    private ?TypeContrat $IdentifiantTypeContrat = null;

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

    public function getIdentifiantClient(): ?Client
    {
        return $this->IdentifiantClient;
    }

    public function setIdentifiantClient(?Client $IdentifiantClient): self
    {
        $this->IdentifiantClient = $IdentifiantClient;

        return $this;
    }

    public function getIdentifiantMetier(): ?Metier
    {
        return $this->IdentifiantMetier;
    }

    public function setIdentifiantMetier(?Metier $IdentifiantMetier): self
    {
        $this->IdentifiantMetier = $IdentifiantMetier;

        return $this;
    }

    public function getIdentifiantTypeContrat(): ?TypeContrat
    {
        return $this->IdentifiantTypeContrat;
    }

    public function setIdentifiantTypeContrat(?TypeContrat $IdentifiantTypeContrat): self
    {
        $this->IdentifiantTypeContrat = $IdentifiantTypeContrat;

        return $this;
    }
}
