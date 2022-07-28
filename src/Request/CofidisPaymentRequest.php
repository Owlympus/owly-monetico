<?php

namespace OwlyMonetico\Request;

use DateTime;

class CofidisPaymentRequest extends SimplePaymentRequest
{
    private ?string $civility = null;

    private ?string $firstName = null;

    private ?string $lastName = null;

    private ?string $address = null;

    private ?string $additionalAddress = null;

    private ?string $postalCode = null;

    private ?string $city = null;

    private ?string $country = null;

    private ?string $phone = null;

    private ?string $mobilePhone = null;

    private ?string $birthCountrySubdivision = null;

    private ?DateTime $birthdate = null;

    private ?int $preScore = null;

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(?string $civility): CofidisPaymentRequest
    {
        $this->civility = $civility;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): CofidisPaymentRequest
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): CofidisPaymentRequest
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): CofidisPaymentRequest
    {
        $this->address = $address;
        return $this;
    }

    public function getAdditionalAddress(): ?string
    {
        return $this->additionalAddress;
    }

    public function setAdditionalAddress(?string $additionalAddress): CofidisPaymentRequest
    {
        $this->additionalAddress = $additionalAddress;
        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): CofidisPaymentRequest
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): CofidisPaymentRequest
    {
        $this->city = $city;
        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): CofidisPaymentRequest
    {
        $this->country = $country;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): CofidisPaymentRequest
    {
        $this->phone = $phone;
        return $this;
    }

    public function getMobilePhone(): ?string
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(?string $mobilePhone): CofidisPaymentRequest
    {
        $this->mobilePhone = $mobilePhone;
        return $this;
    }

    public function getBirthCountrySubdivision(): ?string
    {
        return $this->birthCountrySubdivision;
    }

    public function setBirthCountrySubdivision(?string $birthCountrySubdivision): CofidisPaymentRequest
    {
        $this->birthCountrySubdivision = $birthCountrySubdivision;
        return $this;
    }

    public function getBirthdate(): ?DateTime
    {
        return $this->birthdate;
    }

    public function setBirthdate(?DateTime $birthdate): CofidisPaymentRequest
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getPreScore(): ?int
    {
        return $this->preScore;
    }

    public function setPreScore(?int $preScore): CofidisPaymentRequest
    {
        $this->preScore = $preScore;
        return $this;
    }
}