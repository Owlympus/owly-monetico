<?php

namespace OwlyMonetico\Model;


class BillingAddress extends AbstractAddress
{
    private ?string $mobilePhone;

    private ?string $homePhone;

    private ?string $workPhone;

    public function __construct(string $addressLine1, string $city, string $postalCode, string $country)
    {
        $this->addressLine1 = $addressLine1;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->country = $country;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(?string $mobilePhone): BillingAddress
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function getHomePhone(): ?string
    {
        return $this->homePhone;
    }

    public function setHomePhone(?string $homePhone): BillingAddress
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    public function getWorkPhone(): ?string
    {
        return $this->workPhone;
    }

    public function setWorkPhone(?string $workPhone): BillingAddress
    {
        $this->workPhone = $workPhone;

        return $this;
    }
}