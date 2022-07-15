<?php

namespace OwlyMonetico\Model;

abstract class AbstractAddress
{
    protected ?string $civility;

    protected ?string $name;

    protected ?string $firstName;

    protected ?string $lastName;

    protected ?string $middleName;

    protected ?string $address;

    protected string $addressLine1;

    protected ?string $addressLine2;

    protected ?string $addressLine3;

    protected string $city;

    protected string $postalCode;

    protected string $country;

    protected ?string $stateOrProvince;

    protected ?string $countrySubdivision;

    protected ?string $email;

    protected ?string $phone;

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(?string $civility): AbstractAddress
    {
        $this->civility = $civility;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): AbstractAddress
    {
        $this->name = $name;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): AbstractAddress
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): AbstractAddress
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): AbstractAddress
    {
        $this->middleName = $middleName;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): AbstractAddress
    {
        $this->address = $address;
        return $this;
    }

    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(string $addressLine1): AbstractAddress
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): AbstractAddress
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    public function setAddressLine3(?string $addressLine3): AbstractAddress
    {
        $this->addressLine3 = $addressLine3;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): AbstractAddress
    {
        $this->city = $city;
        return $this;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): AbstractAddress
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): AbstractAddress
    {
        $this->country = $country;
        return $this;
    }

    public function getStateOrProvince(): ?string
    {
        return $this->stateOrProvince;
    }

    public function setStateOrProvince(?string $stateOrProvince): AbstractAddress
    {
        $this->stateOrProvince = $stateOrProvince;
        return $this;
    }

    public function getCountrySubdivision(): ?string
    {
        return $this->countrySubdivision;
    }

    public function setCountrySubdivision(?string $countrySubdivision): AbstractAddress
    {
        $this->countrySubdivision = $countrySubdivision;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): AbstractAddress
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): AbstractAddress
    {
        $this->phone = $phone;
        return $this;
    }
}