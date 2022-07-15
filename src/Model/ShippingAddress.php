<?php

namespace OwlyMonetico\Model;

use DateTime;


class ShippingAddress extends AbstractAddress
{
    private ?string $shipIndicator;

    private ?string $deliveryTimeframe;

    private ?DateTime $firstUseDate;

    private ?bool $matchBillingAddress;

    public function __construct(string $addressLine1, string $city, string $postalCode, string $country)
    {
        $this->addressLine1 = $addressLine1;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->country = $country;
    }

    public function getShipIndicator(): ?string
    {
        return $this->shipIndicator;
    }

    public function setShipIndicator(?string $shipIndicator): ShippingAddress
    {
        $this->shipIndicator = $shipIndicator;

        return $this;
    }

    public function getDeliveryTimeframe(): ?string
    {
        return $this->deliveryTimeframe;
    }

    public function setDeliveryTimeframe(?string $deliveryTimeframe): ShippingAddress
    {
        $this->deliveryTimeframe = $deliveryTimeframe;

        return $this;
    }

    public function getFirstUseDate(): ?DateTime
    {
        return $this->firstUseDate;
    }

    public function getFormatFirstUseDate(): ?string
    {
        if ($this->getFirstUseDate() instanceof DateTime)
            return $this->getFirstUseDate()->format("Y-m-d");

        return null;
    }

    public function setFirstUseDate(?DateTime $firstUseDate): ShippingAddress
    {
        $this->firstUseDate = $firstUseDate;

        return $this;
    }

    public function getMatchBillingAddress(): ?bool
    {
        return $this->matchBillingAddress;
    }

    public function setMatchBillingAddress(?bool $matchBillingAddress): ShippingAddress
    {
        $this->matchBillingAddress = $matchBillingAddress;

        return $this;
    }
}