<?php

namespace App\Entity;

use App\Repository\PackRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackRepository::class)]
class Pack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Libelle = null;

    #[ORM\Column]
    private ?int $NombreOffres = null;

    #[ORM\Column(length: 10)]
    private ?string $Tarif = null;

    #[ORM\OneToMany(mappedBy: 'IdentifiantPack', targetEntity: Client::class)]
    private Collection $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
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

    public function getNombreOffres(): ?int
    {
        return $this->NombreOffres;
    }

    public function setNombreOffres(int $NombreOffres): self
    {
        $this->NombreOffres = $NombreOffres;

        return $this;
    }

    public function getTarif(): ?string
    {
        return $this->Tarif;
    }

    public function setTarif(string $Tarif): self
    {
        $this->Tarif = $Tarif;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->setIdentifiantPack($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getIdentifiantPack() === $this) {
                $client->setIdentifiantPack(null);
            }
        }

        return $this;
    }
}
