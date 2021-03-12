<?php

namespace App\Entity;

use App\Repository\CitoyenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CitoyenRepository::class)
 */
class Citoyen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numTel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbHommeAdulte;

    /**
     * @ORM\Column(type="boolean")
     */
    private $couffin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->numTel;
    }

    public function setNumTel(string $numTel): self
    {
        $this->numTel = $numTel;

        return $this;
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

    public function getNbHommeAdulte(): ?int
    {
        return $this->nbHommeAdulte;
    }

    public function setNbHommeAdulte(int $nbHommeAdulte): self
    {
        $this->nbHommeAdulte = $nbHommeAdulte;

        return $this;
    }

    public function getCouffin(): ?bool
    {
        return $this->couffin;
    }

    public function setCouffin(bool $couffin): self
    {
        $this->couffin = $couffin;

        return $this;
    }
}
