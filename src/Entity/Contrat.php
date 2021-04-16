<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ContratRepository::class)
 */
class Contrat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_debut_contrat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $min_garanti;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_debut_voyage;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_fin_voyage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fees_internet;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montant_fees;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $pay_later;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pay_later_time_limit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $min_vol_cc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $min_vol_balance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timbre;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="contrats")
     */
    private $compte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateDebutContrat(): ?\DateTimeInterface
    {
        return $this->date_debut_contrat;
    }

    public function setDateDebutContrat(?\DateTimeInterface $date_debut_contrat): self
    {
        $this->date_debut_contrat = $date_debut_contrat;

        return $this;
    }

    public function getMinGaranti(): ?int
    {
        return $this->min_garanti;
    }

    public function setMinGaranti(?int $min_garanti): self
    {
        $this->min_garanti = $min_garanti;

        return $this;
    }

    public function getDateDebutVoyage(): ?\DateTimeInterface
    {
        return $this->date_debut_voyage;
    }

    public function setDateDebutVoyage(?\DateTimeInterface $date_debut_voyage): self
    {
        $this->date_debut_voyage = $date_debut_voyage;

        return $this;
    }

    public function getDateFinVoyage(): ?\DateTimeInterface
    {
        return $this->date_fin_voyage;
    }

    public function setDateFinVoyage(?\DateTimeInterface $date_fin_voyage): self
    {
        $this->date_fin_voyage = $date_fin_voyage;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(?bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getFeesInternet(): ?bool
    {
        return $this->fees_internet;
    }

    public function setFeesInternet(?bool $fees_internet): self
    {
        $this->fees_internet = $fees_internet;

        return $this;
    }

    public function getMontantFees(): ?int
    {
        return $this->montant_fees;
    }

    public function setMontantFees(?int $montant_fees): self
    {
        $this->montant_fees = $montant_fees;

        return $this;
    }

    public function getPayLater(): ?bool
    {
        return $this->pay_later;
    }

    public function setPayLater(?bool $pay_later): self
    {
        $this->pay_later = $pay_later;

        return $this;
    }

    public function getPayLaterTimeLimit(): ?string
    {
        return $this->pay_later_time_limit;
    }

    public function setPayLaterTimeLimit(?string $pay_later_time_limit): self
    {
        $this->pay_later_time_limit = $pay_later_time_limit;

        return $this;
    }

    public function getMinVolCc(): ?string
    {
        return $this->min_vol_cc;
    }

    public function setMinVolCc(?string $min_vol_cc): self
    {
        $this->min_vol_cc = $min_vol_cc;

        return $this;
    }

    public function getMinVolBalance(): ?string
    {
        return $this->min_vol_balance;
    }

    public function setMinVolBalance(?string $min_vol_balance): self
    {
        $this->min_vol_balance = $min_vol_balance;

        return $this;
    }

    public function getTimbre(): ?string
    {
        return $this->timbre;
    }

    public function setTimbre(?string $timbre): self
    {
        $this->timbre = $timbre;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }
}
