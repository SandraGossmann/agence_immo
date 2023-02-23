<?php

namespace App\Entity;

use App\Repository\AccomodationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccomodationRepository::class)]
class Accomodation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $area = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $nbRooms = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column]
    private ?bool $isPool = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column]
    private ?bool $isExterior = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2, nullable: true)]
    private ?string $exteriorArea = null;

    #[ORM\Column]
    private ?bool $isGarage = null;

    #[ORM\Column(length: 20)]
    private ?string $transactionType = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $releaseDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getNbRooms(): ?int
    {
        return $this->nbRooms;
    }

    public function setNbRooms(int $nbRooms): self
    {
        $this->nbRooms = $nbRooms;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function isIsPool(): ?bool
    {
        return $this->isPool;
    }

    public function setIsPool(bool $isPool): self
    {
        $this->isPool = $isPool;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function isIsExterior(): ?bool
    {
        return $this->isExterior;
    }

    public function setIsExterior(bool $isExterior): self
    {
        $this->isExterior = $isExterior;

        return $this;
    }

    public function getExteriorArea(): ?string
    {
        return $this->exteriorArea;
    }

    public function setExteriorArea(?string $exteriorArea): self
    {
        $this->exteriorArea = $exteriorArea;

        return $this;
    }

    public function isIsGarage(): ?bool
    {
        return $this->isGarage;
    }

    public function setIsGarage(bool $isGarage): self
    {
        $this->isGarage = $isGarage;

        return $this;
    }

    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    public function setTransactionType(string $transactionType): self
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }
}
