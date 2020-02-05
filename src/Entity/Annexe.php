<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnexeRepository")
 */
class Annexe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $rente_price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $sell_price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tva;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lot")
     */
    private $lot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeAnnexe")
     */
    private $type_annexe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRentePrice(): ?string
    {
        return $this->rente_price;
    }

    public function setRentePrice(?string $rente_price): self
    {
        $this->rente_price = $rente_price;

        return $this;
    }

    public function getSellPrice(): ?string
    {
        return $this->sell_price;
    }

    public function setSellPrice(?string $sell_price): self
    {
        $this->sell_price = $sell_price;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(?float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getLot(): ?Lot
    {
        return $this->lot;
    }

    public function setLot(?Lot $lot): self
    {
        $this->lot = $lot;

        return $this;
    }

    public function getTypeAnnexe(): ?TypeAnnexe
    {
        return $this->type_annexe;
    }

    public function setTypeAnnexe(?TypeAnnexe $type_annexe): self
    {
        $this->type_annexe = $type_annexe;

        return $this;
    }


}
