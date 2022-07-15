<?php

namespace OwlyMonetico\Model;

use JsonSerializable;

class Item implements JsonSerializable
{
    private ?string $name;

    private ?string $description;

    private ?string $productCode;

    private ?string $imageURL;

    private ?int $unitPrice;

    private ?int $quantity;

    private ?string $productSKU;

    private ?string $productRisk;

    public function jsonSerialize()
    {
        return array_filter([
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'productCode' => $this->getProductCode(),
            'imageURL' => $this->getImageURL(),
            'unitPrice' => $this->getUnitPrice(),
            'quantity' => $this->getQuantity(),
            'productSKU' => $this->getProductSKU(),
            'productRisk' => $this->getProductRisk()
        ], function ($value) {
            return !is_null($value);
        });
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Item
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Item
    {
        $this->description = $description;

        return $this;
    }

    public function getProductCode(): ?string
    {
        return $this->productCode;
    }

    public function setProductCode(?string $productCode): Item
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function getImageURL(): ?string
    {
        return $this->imageURL;
    }

    public function setImageURL(?string $imageURL): Item
    {
        $this->imageURL = $imageURL;

        return $this;
    }

    public function getUnitPrice(): ?int
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(?int $unitPrice): Item
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): Item
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getProductSKU(): ?string
    {
        return $this->productSKU;
    }

    public function setProductSKU(?string $productSKU): Item
    {
        $this->productSKU = $productSKU;

        return $this;
    }

    public function getProductRisk(): ?string
    {
        return $this->productRisk;
    }

    public function setProductRisk(?string $productRisk): Item
    {
        $this->productRisk = $productRisk;

        return $this;
    }
}