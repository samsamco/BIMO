<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResidenceRepository")
 */
class Residence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     * zone
     */
    private $area;

    /**
     * @ORM\Column(type="text", nullable=true)
     * descriptioncommerciale
     */
    private  $commercial_description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $actable;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City",inversedBy="cities")
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner")
     */
    private $partner;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commercial_delivery;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lot", mappedBy="residence")
     */
    private $lots;

    public function __construct()
    {
        $this->lots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(?string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(?string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getCommercialDescription(): ?string
    {
        return $this->commercial_description;
    }

    public function setCommercialDescription(?string $commercial_description): self
    {
        $this->commercial_description = $commercial_description;

        return $this;
    }

    public function getActable(): ?string
    {
        return $this->actable;
    }

    public function setActable(?string $actable): self
    {
        $this->actable = $actable;

        return $this;
    }

    public function getCommercialDelivery(): ?string
    {
        return $this->commercial_delivery;
    }

    public function setCommercialDelivery(?string $commercial_delivery): self
    {
        $this->commercial_delivery = $commercial_delivery;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(?Partner $partner): self
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * @return Collection|Lot[]
     */
    public function getLots(): Collection
    {
        return $this->lots;
    }

    public function addLot(Lot $lot): self
    {
        if (!$this->lots->contains($lot)) {
            $this->lots[] = $lot;
            $lot->setResidence($this);
        }

        return $this;
    }

    public function removeLot(Lot $lot): self
    {
        if ($this->lots->contains($lot)) {
            $this->lots->removeElement($lot);
            // set the owning side to null (unless already changed)
            if ($lot->getResidence() === $this) {
                $lot->setResidence(null);
            }
        }

        return $this;
    }


}
