<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ORM\Table(name: "Client")]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 50, name: "Libelle")]
    private ?string $libelle = null;

    #[ORM\Column(length: 50, name: "Nom")]
    private ?string $nom = null;

    #[ORM\Column(length: 50, name: "Prenom")]
    private ?string $prenom = null;

    #[ORM\Column(length: 50, name: "Ville")]
    private ?string $ville = null;

    #[ORM\Column(nullable: true, name: "Telephone")]
    private ?int $telephone = null;

    #[ORM\Column(length: 50, name: "Email")]
    private ?string $email = null;

    #[ORM\Column(length: 50, name: "Siret")]
    private ?string $siret = null;

    #[ORM\Column(length: 50, name: "Login")]
    private ?string $login = null;

    #[ORM\Column(length: 50, name: "Password")]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'IdentifiantClient', targetEntity: OffreCasting::class)]
    private Collection $offreCastings;

    #[ORM\ManyToOne(inversedBy: 'clients', targetEntity: Pack::class)]
    #[ORM\JoinColumn(name: 'IdentifiantPack', referencedColumnName: 'Identifiant')]
    private ?Pack $pack = null;

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

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(?string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->Siret;
    }

    public function setSiret(string $Siret): self
    {
        $this->Siret = $Siret;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(string $Login): self
    {
        $this->Login = $Login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

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
            $offreCasting->setIdentifiantClient($this);
        }

        return $this;
    }

    public function removeOffreCasting(OffreCasting $offreCasting): self
    {
        if ($this->offreCastings->removeElement($offreCasting)) {
            // set the owning side to null (unless already changed)
            if ($offreCasting->getIdentifiantClient() === $this) {
                $offreCasting->setIdentifiantClient(null);
            }
        }

        return $this;
    }

    public function getIdentifiantPack(): ?Pack
    {
        return $this->IdentifiantPack;
    }

    public function setIdentifiantPack(?Pack $IdentifiantPack): self
    {
        $this->IdentifiantPack = $IdentifiantPack;

        return $this;
    }
}
