<?php

namespace OwlyMonetico\Model;

use DateTime;

class CofidisPaymentInformations
{
    private ?string $civility;

    private ?string $firstName;

    private ?string $lastName;

    private ?string $address;

    private ?string $addressComplement;

    private ?string $postalCode;

    private ?string $city;

    private ?string $country;

    private ?string $phone;

    private ?string $mobile;

    private ?string $birthDepartment;

    private ?DateTime $birthDate;

    private ?int $preScore;

    public function getFormFields(): array
    {
        $formFields = [];
        if (!empty($this->getCivility()))
            $formFields['civiliteclient'] = $this->getCivility();

        if (!empty($this->getLastName()))
            $formFields['nomclient'] = $this->getLastName();

        if (!empty($this->getFirstName()))
            $formFields['prenomclient'] = $this->getFirstName();

        if (!empty($this->getAddress()))
            $formFields['adresseclient'] = $this->getAddress();

        if (!empty($this->getAddressComplement()))
            $formFields['complementadresseclient'] = $this->getAddressComplement();

        if (!empty($this->getPostalCode()))
            $formFields['codepostalclient'] = $this->getPostalCode();

        if (!empty($this->getCity()))
            $formFields['villeclient'] = $this->getCity();

        if (!empty($this->getCountry()))
            $formFields['paysclient'] = $this->getCountry();

        if (!empty($this->getPhone()))
            $formFields['telephonefixeclient'] = $this->getPhone();

        if (!empty($this->getMobile()))
            $formFields['telephonemobileclient'] = $this->getMobile();

        if (!empty($this->getBirthDepartment()))
            $formFields['departementnaissanceclient'] = $this->getBirthDepartment();

        if (!empty($this->getBirthDate()))
            $formFields['datenaissanceclient'] = $this->getBirthDate()->format("Ymd");

        if (!is_null($this->getPreScore()))
            $formFields['prescore'] = $this->getPreScore();


        array_walk($formFields, function (&$value) {
            $value = bin2hex($value);
        });

        return $formFields;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(?string $civility): CofidisPaymentInformations
    {
        $this->civility = $civility;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): CofidisPaymentInformations
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): CofidisPaymentInformations
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): CofidisPaymentInformations
    {
        $this->address = $address;

        return $this;
    }

    public function getAddressComplement(): ?string
    {
        return $this->addressComplement;
    }

    public function setAddressComplement(?string $addressComplement): CofidisPaymentInformations
    {
        $this->addressComplement = $addressComplement;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): CofidisPaymentInformations
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): CofidisPaymentInformations
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): CofidisPaymentInformations
    {
        $this->country = $country;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): CofidisPaymentInformations
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): CofidisPaymentInformations
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getBirthDepartment(): ?string
    {
        return $this->birthDepartment;
    }

    public function setBirthDepartment(?string $birthDepartment): CofidisPaymentInformations
    {
        $this->birthDepartment = $birthDepartment;

        return $this;
    }

    public function getBirthDate(): ?DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(?DateTime $birthDate): CofidisPaymentInformations
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPreScore(): ?int
    {
        return $this->preScore;
    }

    public function setPreScore(?int $preScore): CofidisPaymentInformations
    {
        $this->preScore = $preScore;

        return $this;
    }
}