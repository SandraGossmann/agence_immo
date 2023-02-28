<?php

namespace App\Entity;

use App\Repository\Search2Repository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: Search2Repository::class)]
class Search2
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Assert\Choice(["sale", "rent", "both"],
        message: "The value you selected is not a valid choice.")]
    private ?string $transactionType = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Assert\Choice(["house", "apartment", "yurt", null],
        message: "The value you selected is not a valid choice.")]
    private ?string $type = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2, nullable: true)]
    #[Assert\PositiveOrZero(message: "The area min must be positive")]
    private ?string $areaMin = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2, nullable: true)]
    #[Assert\PositiveOrZero(message: "The area max must be positive")]
    #[Assert\GreaterThanOrEqual(propertyPath: "areaMin",
        message: "This value must be greater than the min area")]
    private ?string $areaMax = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 2, nullable: true)]
    #[Assert\PositiveOrZero(message: "The price min must be positive")]
    private ?string $priceMin = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 2, nullable: true)]
    #[Assert\PositiveOrZero(message: "This value must be positive")]
    #[Assert\GreaterThanOrEqual(propertyPath: "priceMin",
        message: "This value must be greater than the min price")]
    private ?string $priceMax = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    #[Assert\PositiveOrZero(message: "This value must be positive")]
    private ?int $nbRoomsMin = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    #[Assert\PositiveOrZero(message: "This value must be positive")]
    #[Assert\GreaterThanOrEqual(propertyPath: "nbRoomsMin",
        message: "This value must be greater than the min number of rooms")]
    private ?int $nbRoomsMax = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isGarage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isExterior = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isPool = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAreaMin(): ?string
    {
        return $this->areaMin;
    }

    public function setAreaMin(?string $areaMin): self
    {
        $this->areaMin = $areaMin;

        return $this;
    }

    public function getAreaMax(): ?string
    {
        return $this->areaMax;
    }

    public function setAreaMax(?string $areaMax): self
    {
        $this->areaMax = $areaMax;

        return $this;
    }

    public function getPriceMin(): ?string
    {
        return $this->priceMin;
    }

    public function setPriceMin(?string $priceMin): self
    {
        $this->priceMin = $priceMin;

        return $this;
    }

    public function getPriceMax(): ?string
    {
        return $this->priceMax;
    }

    public function setPriceMax(?string $priceMax): self
    {
        $this->priceMax = $priceMax;

        return $this;
    }

    public function getNbRoomsMin(): ?int
    {
        return $this->nbRoomsMin;
    }

    public function setNbRoomsMin(?int $nbRoomsMin): self
    {
        $this->nbRoomsMin = $nbRoomsMin;

        return $this;
    }

    public function getNbRoomsMax(): ?int
    {
        return $this->nbRoomsMax;
    }

    public function setNbRoomsMax(?int $nbRoomsMax): self
    {
        $this->nbRoomsMax = $nbRoomsMax;

        return $this;
    }

    public function isIsGarage(): ?bool
    {
        return $this->isGarage;
    }

    public function setIsGarage(?bool $isGarage): self
    {
        $this->isGarage = $isGarage;

        return $this;
    }

    public function isIsExterior(): ?bool
    {
        return $this->isExterior;
    }

    public function setIsExterior(?bool $isExterior): self
    {
        $this->isExterior = $isExterior;

        return $this;
    }

    public function isIsPool(): ?bool
    {
        return $this->isPool;
    }

    public function setIsPool(?bool $isPool): self
    {
        $this->isPool = $isPool;

        return $this;
    }
}
