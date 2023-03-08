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
    #[ORM\JoinColumn(name: 'civilite', referencedColumnName: 'Identifiant')]
    #[ORM\InverseJoinColumn(name: 'IdentifiantOffreCasting', referencedColumnName: 'Identifiant')]
    #[ORM\ManyToMany(targetEntity: Civilite::class, inversedBy: 'offreCastings')]
    private Collection $civilite;

    #[ORM\ManyToOne(inversedBy: 'offreCastings')]
    #[ORM\JoinColumn(name: 'client', referencedColumnName: 'Identifiant', nullable: false)]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'offreCastings')]
    #[ORM\JoinColumn(name: 'metier', referencedColumnName: 'Identifiant', nullable: false)]
    private ?Metier $metier = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'typeContrat', referencedColumnName: 'Identifiant')]
    private ?TypeContrat $typeContrat = null;

    public function __construct()
    {
        $this->civilite = new ArrayCollection();
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
    public function getCivilite(): Collection
    {
        return $this->civilite;
    }

    public function addIdentifiantCivilite(Civilite $identifiantCivilite): self
    {
        if (!$this->civilite->contains($identifiantCivilite)) {
            $this->civilite->add($identifiantCivilite);
        }

        return $this;
    }

    public function removeIdentifiantCivilite(Civilite $identifiantCivilite): self
    {
        $this->civilite->removeElement($identifiantCivilite);

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getMetier(): ?Metier
    {
        return $this->metier;
    }

    public function setMetier(?Metier $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    public function getTypeContrat(): ?TypeContrat
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?TypeContrat $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }
}
