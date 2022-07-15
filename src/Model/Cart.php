<?php

namespace OwlyMonetico\Model;

use DateTime;
use JsonSerializable;

class Cart implements JsonSerializable
{
    private ?int $giftCardAmount;

    private ?int $giftCardCount;

    private ?string $giftCardCurrency;

    private ?DateTime $preOrderDate;

    private ?bool $preorderIndicator;

    private ?bool $reorderIndicator;

    private ?array $shoppingCartItems;

    public function jsonSerialize()
    {
        return array_filter([
            'giftCardAmount' => $this->getGiftCardAmount(),
            'giftCardCount' => $this->getGiftCardCount(),
            'giftCardCurrency' => $this->getGiftCardCurrency(),
            'preOrderDate' => $this->getFormatedPreOrderDate(),
            'preorderIndicator' => $this->getPreorderIndicator(),
            'reorderIndicator' => $this->getReorderIndicator(),
            'shoppingCartItems' => $this->getShoppingCartItems()
        ], function ($value) {
            return !is_null($value);
        });
    }

    public function getGiftCardAmount(): ?int
    {
        return $this->giftCardAmount;
    }

    public function setGiftCardAmount(?int $giftCardAmount): Cart
    {
        $this->giftCardAmount = $giftCardAmount;

        return $this;
    }

    public function getGiftCardCount(): ?int
    {
        return $this->giftCardCount;
    }

    public function setGiftCardCount(?int $giftCardCount): Cart
    {
        $this->giftCardCount = $giftCardCount;

        return $this;
    }

    public function getGiftCardCurrency(): ?string
    {
        return $this->giftCardCurrency;
    }

    public function setGiftCardCurrency(?string $giftCardCurrency): Cart
    {
        $this->giftCardCurrency = $giftCardCurrency;

        return $this;
    }

    public function getPreOrderDate(): ?DateTime
    {
        return $this->preOrderDate;
    }

    public function getFormatedPreOrderDate(): ?string
    {
        if ($this->getPreOrderDate() instanceof DateTime) {
            return $this->getPreOrderDate()->format("Y-m-d");
        }
        return null;
    }

    public function setPreOrderDate(?DateTime $preOrderDate): Cart
    {
        $this->preOrderDate = $preOrderDate;

        return $this;
    }

    public function getPreorderIndicator(): ?bool
    {
        return $this->preorderIndicator;
    }

    public function setPreorderIndicator(?bool $preorderIndicator): Cart
    {
        $this->preorderIndicator = $preorderIndicator;

        return $this;
    }

    public function getReorderIndicator(): ?bool
    {
        return $this->reorderIndicator;
    }

    public function setReorderIndicator(?bool $reorderIndicator): Cart
    {
        $this->reorderIndicator = $reorderIndicator;

        return $this;
    }

    public function getShoppingCartItems(): ?array
    {
        return $this->shoppingCartItems;
    }

    public function setShoppingCartItems(?array $shoppingCartItems): Cart
    {
        $this->shoppingCartItems = $shoppingCartItems;

        return $this;
    }
}