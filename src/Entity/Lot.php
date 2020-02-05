<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\LotRepository")
 */
class Lot
{
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $floor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parking;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $cellar_surface;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $balcony_area;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $terrace_area;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $balcony_terrace_area;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $garden_area;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * batiment
     */
    private $building;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * numero batiment
     */
    private $building_number;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * surface habitable
     */
    private $living_space;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * surface ponderee
     */
    private $weighted_area;


    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * prixlogement
     */
    private $accommodation_price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * prixparking
     */
    private $parking_price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * prix immo
     */
    private $immo_price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * prixequipement
     */
    private $equipment_price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * prixdesoptions
     */
    private $option_prices;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * prixdesoptions
     */
    private $celier_price;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * package condition
     */
    private $package_condition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * pack financier
     */
    private $financial_pack;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * packjuridique
     */
    private $legal_pack;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * pack locatif
     */
    private $rental_pack;


    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     * package total
     */
    private $total_package;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $parking_rent;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $appartment_rent;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $guaranteed_rent;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $commission;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * $statutcommercialisation
     */
    private $marketing_status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $primary_orientation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondary_orientation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $start_count;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Residence",inversedBy="lots")
     */
    private $residence;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Nature",inversedBy="lots")
     */
    private $nature;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_pieces;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commercial_delivery;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fiscale;

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

    public function getFloor(): ?string
    {
        return $this->floor;
    }

    public function setFloor(?string $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getParking(): ?string
    {
        return $this->parking;
    }

    public function setParking(?string $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getCellarSurface(): ?string
    {
        return $this->cellar_surface;
    }

    public function setCellarSurface(?string $cellar_surface): self
    {
        $this->cellar_surface = $cellar_surface;

        return $this;
    }

    public function getBalconyArea(): ?string
    {
        return $this->balcony_area;
    }

    public function setBalconyArea(?string $balcony_area): self
    {
        $this->balcony_area = $balcony_area;

        return $this;
    }

    public function getTerraceArea(): ?string
    {
        return $this->terrace_area;
    }

    public function setTerraceArea(?string $terrace_area): self
    {
        $this->terrace_area = $terrace_area;

        return $this;
    }

    public function getBalconyTerraceArea(): ?string
    {
        return $this->balcony_terrace_area;
    }

    public function setBalconyTerraceArea(?string $balcony_terrace_area): self
    {
        $this->balcony_terrace_area = $balcony_terrace_area;

        return $this;
    }

    public function getGardenArea(): ?string
    {
        return $this->garden_area;
    }

    public function setGardenArea(?string $garden_area): self
    {
        $this->garden_area = $garden_area;

        return $this;
    }

    public function getBuilding(): ?string
    {
        return $this->building;
    }

    public function setBuilding(?string $building): self
    {
        $this->building = $building;

        return $this;
    }

    public function getBuildingNumber(): ?string
    {
        return $this->building_number;
    }

    public function setBuildingNumber(?string $building_number): self
    {
        $this->building_number = $building_number;

        return $this;
    }

    public function getLivingSpace(): ?string
    {
        return $this->living_space;
    }

    public function setLivingSpace(?string $living_space): self
    {
        $this->living_space = $living_space;

        return $this;
    }

    public function getWeightedArea(): ?string
    {
        return $this->weighted_area;
    }

    public function setWeightedArea(?string $weighted_area): self
    {
        $this->weighted_area = $weighted_area;

        return $this;
    }

    public function getAccommodationPrice(): ?string
    {
        return $this->accommodation_price;
    }

    public function setAccommodationPrice(?string $accommodation_price): self
    {
        $this->accommodation_price = $accommodation_price;

        return $this;
    }

    public function getParkingPrice(): ?string
    {
        return $this->parking_price;
    }

    public function setParkingPrice(?string $parking_price): self
    {
        $this->parking_price = $parking_price;

        return $this;
    }

    public function getImmoPrice(): ?string
    {
        return $this->immo_price;
    }

    public function setImmoPrice(?string $immo_price): self
    {
        $this->immo_price = $immo_price;

        return $this;
    }

    public function getEquipmentPrice(): ?string
    {
        return $this->equipment_price;
    }

    public function setEquipmentPrice(?string $equipment_price): self
    {
        $this->equipment_price = $equipment_price;

        return $this;
    }

    public function getOptionPrices(): ?string
    {
        return $this->option_prices;
    }

    public function setOptionPrices(?string $option_prices): self
    {
        $this->option_prices = $option_prices;

        return $this;
    }

    public function getCelierPrice(): ?string
    {
        return $this->celier_price;
    }

    public function setCelierPrice(?string $celier_price): self
    {
        $this->celier_price = $celier_price;

        return $this;
    }

    public function getPackageCondition(): ?bool
    {
        return $this->package_condition;
    }

    public function setPackageCondition(?bool $package_condition): self
    {
        $this->package_condition = $package_condition;

        return $this;
    }

    public function getFinancialPack(): ?string
    {
        return $this->financial_pack;
    }

    public function setFinancialPack(?string $financial_pack): self
    {
        $this->financial_pack = $financial_pack;

        return $this;
    }

    public function getLegalPack(): ?string
    {
        return $this->legal_pack;
    }

    public function setLegalPack(?string $legal_pack): self
    {
        $this->legal_pack = $legal_pack;

        return $this;
    }

    public function getRentalPack(): ?string
    {
        return $this->rental_pack;
    }

    public function setRentalPack(?string $rental_pack): self
    {
        $this->rental_pack = $rental_pack;

        return $this;
    }

    public function getTotalPackage(): ?string
    {
        return $this->total_package;
    }

    public function setTotalPackage(?string $total_package): self
    {
        $this->total_package = $total_package;

        return $this;
    }

    public function getParkingRent(): ?string
    {
        return $this->parking_rent;
    }

    public function setParkingRent(?string $parking_rent): self
    {
        $this->parking_rent = $parking_rent;

        return $this;
    }

    public function getAppartmentRent(): ?string
    {
        return $this->appartment_rent;
    }

    public function setAppartmentRent(?string $appartment_rent): self
    {
        $this->appartment_rent = $appartment_rent;

        return $this;
    }

    public function getGuaranteedRent(): ?string
    {
        return $this->guaranteed_rent;
    }

    public function setGuaranteedRent(?string $guaranteed_rent): self
    {
        $this->guaranteed_rent = $guaranteed_rent;

        return $this;
    }

    public function getCommission(): ?string
    {
        return $this->commission;
    }

    public function setCommission(?string $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    public function getMarketingStatus(): ?string
    {
        return $this->marketing_status;
    }

    public function setMarketingStatus(?string $marketing_status): self
    {
        $this->marketing_status = $marketing_status;

        return $this;
    }

    public function getPrimaryOrientation(): ?string
    {
        return $this->primary_orientation;
    }

    public function setPrimaryOrientation(?string $primary_orientation): self
    {
        $this->primary_orientation = $primary_orientation;

        return $this;
    }

    public function getSecondaryOrientation(): ?string
    {
        return $this->secondary_orientation;
    }

    public function setSecondaryOrientation(?string $secondary_orientation): self
    {
        $this->secondary_orientation = $secondary_orientation;

        return $this;
    }

    public function getStartCount(): ?int
    {
        return $this->start_count;
    }

    public function setStartCount(?int $start_count): self
    {
        $this->start_count = $start_count;

        return $this;
    }

    public function getNbPieces(): ?int
    {
        return $this->nb_pieces;
    }

    public function setNbPieces(?int $nb_pieces): self
    {
        $this->nb_pieces = $nb_pieces;

        return $this;
    }

    public function getResidence(): ?Residence
    {
        return $this->residence;
    }

    public function setResidence(?Residence $residence): self
    {
        $this->residence = $residence;

        return $this;
    }

    public function getNature(): ?Nature
    {
        return $this->nature;
    }

    public function setNature(?Nature $nature): self
    {
        $this->nature = $nature;

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

    public function getFiscale(): ?string
    {
        return $this->fiscale;
    }

    public function setFiscale(?string $fiscale): self
    {
        $this->fiscale = $fiscale;

        return $this;
    }


}
