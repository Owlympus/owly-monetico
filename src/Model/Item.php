<?php

namespace OwlyMonetico\Model;


use Exception;
use OwlyMonetico\Collection\ProductCode;
use OwlyMonetico\Collection\ProductRisk;

class Item
{
    private ?string $name = null;

    private ?string $description = null;

    private ?string $productCode = null;

    private ?string $imageURL = null;

    private ?int $unitPrice = null;

    private ?int $quantity = null;

    private ?string $productSKU = null;

    private ?string $productRisk = null;

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

    /**
     * @throws Exception
     */
    public function validate($data)
    {
        if (!empty($data['name']) && strlen($data['name']) > 45)
            throw new Exception('Field "Item->name" incorrect (' . $data['name'] . '). Need 45 characters max.');
        if (!empty($data['description']) && strlen($data['description']) > 2048)
            throw new Exception('Field "Item->description" incorrect (' . $data['description'] . '). Need 2048 characters max.');
        if(!empty($data['productCode']) && !in_array($data['productCode'], ProductCode::all()))
            throw new Exception('Field "Item->productCode" incorrect (' . $data['productCode'] . '). Need to be an available product code in this list: ['.implode(', ', ProductCode::all()).'].');
        if(!empty($data['imageURL']) && !filter_var($data['imageURL'], FILTER_VALIDATE_URL))
            throw new Exception('Field "Item->imageURL" incorrect (' . $data['imageURL'] . '). Need to be valid link.');
        if(!empty($data['unitPrice']) && strlen($data['unitPrice']) > 12)
            throw new Exception('Field "Item->unitPrice" incorrect (' . $data['unitPrice'] . '). Need 12 numbers max.');
        if(!empty($data['productSKU']) && strlen($data['productSKU']) > 255)
            throw new Exception('Field "Item->productSKU" incorrect (' . $data['productSKU'] . '). Need 255 characters max.');
        if(!empty($data['productRisk']) && !in_array($data['productRisk'], ProductRisk::all()))
            throw new Exception('Field "Item->productRisk" incorrect (' . $data['productRisk'] . '). Need to be an available product risk in this list: ['.implode(', ', ProductRisk::all()).'].');
    }

    /**
     * @throws Exception
     */
    public function generateContext($skipValidation = false): array
    {
        $data = [];

        // Optional
        if(!empty($this->name))
            $data['name'] = $this->name;
        if(!empty($this->description))
            $data['description'] = $this->description;
        if(!empty($this->productCode))
            $data['productCode'] = $this->productCode;
        if(!empty($this->imageURL))
            $data['imageURL'] = $this->imageURL;
        if(isset($this->unitPrice))
            $data['unitPrice'] = $this->unitPrice;
        if(isset($this->quantity))
            $data['quantity'] = $this->quantity;
        if(!empty($this->productSKU))
            $data['productSKU'] = $this->productSKU;
        if(!empty($this->productRisk))
            $data['productRisk'] = $this->productRisk;

        if(!$skipValidation)
            $this->validate($data);

        return $data;
    }
}