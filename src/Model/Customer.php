<?php

namespace OwlyMonetico\Model;

use DateTime;
use JsonSerializable;

class Customer implements JsonSerializable
{
    private string $email;

    private string $language;

    private ?string $civility;

    private ?string $name;

    private ?string $firstName;

    private ?string $lastName;

    private ?string $middleName;

    private ?string $address;

    private ?string $addressLine1;

    private ?string $addressLine2;

    private ?string $addressLine3;

    private ?string $city;

    private ?string $postalCode;

    private ?string $country;

    private ?string $stateOrProvince;

    private ?string $countrySubdivision;

    private ?string $birthLastName;

    private ?string $birthCity;

    private ?string $birthPostalCode;

    private ?string $birthCountry;

    private ?string $birthStateOrProvince;

    private ?string $birthCountrySubdivision;

    private ?DateTime $birthdate;

    private ?string $phone;

    private ?string $nationalIDNumber;

    private ?bool $suspiciousAccountActivity;

    private ?string $authenticationMethod;

    private ?DateTime $authenticationTimestamp;

    private ?string $priorAuthenticationMethod;

    private ?DateTime $priorAuthenticationTimestamp;

    private ?DateTime $paymentMeanAge;

    private ?int $lastYearTransactions;

    private ?int $last24HoursTransactions;

    private ?int $addCardNbLast24Hours;

    private ?int $last6MonthsPurchase;

    private ?DateTime $lastPasswordChange;

    private ?DateTime $accountAge;

    private ?DateTime $lastAccountModification;

    public function __construct(string $email, string $language)
    {
        $this->email = $email;
        $this->language = $language;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'civility' => $this->getCivility(),
            'name' => $this->getName(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'middleName' => $this->getMiddleName(),
            'address' => $this->getAddress(),
            'addressLine1' => $this->getAddressLine1(),
            'addressLine2' => $this->getAddressLine2(),
            'addressLine3' => $this->getAddressLine3(),
            'city' => $this->getCity(),
            'postalCode' => $this->getPostalCode(),
            'country' => $this->getCountry(),
            'stateOrProvince' => $this->getStateOrProvince(),
            'countrySubdivision' => $this->getCountrySubdivision(),
            'email' => $this->getEmail(),
            'birthLastName' => $this->getBirthLastName(),
            'birthCity' => $this->getBirthCity(),
            'birthPostalCode' => $this->getBirthPostalCode(),
            'birthCountry' => $this->getBirthCountry(),
            'birthStateOrProvince' => $this->getBirthStateOrProvince(),
            'birthCountrySubdivision' => $this->getBirthCountrySubdivision(),
            'birthdate' => $this->getFormatedBirthdate(),
            'phone' => $this->getPhone(),
            'nationalIDNumber' => $this->getNationalIDNumber(),
            'suspiciousAccountActivity' => $this->getSuspiciousAccountActivity(),
            'authenticationMethod' => $this->getAuthenticationMethod(),
            'authenticationTimestamp' => $this->getFormatedAuthenticationTimestamp(),
            'priorAuthenticationMethod' => $this->getPriorAuthenticationMethod(),
            'priorAuthenticationTimestamp' => $this->getFormatedPriorAuthenticationTimestamp(),
            'paymentMeanAge' => $this->getFormatedPaymentMeanAge(),
            'lastYearTransactions' => $this->getLastYearTransactions(),
            'last24HoursTransactions' => $this->getLast24HoursTransactions(),
            'addCardNbLast24Hours' => $this->getAddCardNbLast24Hours(),
            'last6MonthsPurchase' => $this->getLast6MonthsPurchase(),
            'lastPasswordChange' => $this->getFormatedLastPasswordChange(),
            'accountAge' => $this->getFormatedAccountAge(),
            'lastAccountModification' => $this->getFormatedLastAccountModification()
        ], function ($value) {
            return !is_null($value);
        });
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(?string $civility): Customer
    {
        $this->civility = $civility;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Customer
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): Customer
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): Customer
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): Customer
    {
        $this->middleName = $middleName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): Customer
    {
        $this->address = $address;

        return $this;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(?string $addressLine1): Customer
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): Customer
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    public function setAddressLine3(?string $addressLine3): Customer
    {
        $this->addressLine3 = $addressLine3;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): Customer
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): Customer
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): Customer
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Customer
     */
    public function setLanguage(string $language): Customer
    {
        $this->language = $language;
        return $this;
    }

    public function getStateOrProvince(): ?string
    {
        return $this->stateOrProvince;
    }

    public function setStateOrProvince(?string $stateOrProvince): Customer
    {
        $this->stateOrProvince = $stateOrProvince;

        return $this;
    }

    public function getCountrySubdivision(): ?string
    {
        return $this->countrySubdivision;
    }

    public function setCountrySubdivision(?string $countrySubdivision): Customer
    {
        $this->countrySubdivision = $countrySubdivision;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBirthLastName(): ?string
    {
        return $this->birthLastName;
    }

    public function setBirthLastName(?string $birthLastName): Customer
    {
        $this->birthLastName = $birthLastName;

        return $this;
    }

    public function getBirthCity(): ?string
    {
        return $this->birthCity;
    }

    public function setBirthCity(?string $birthCity): Customer
    {
        $this->birthCity = $birthCity;

        return $this;
    }

    public function getBirthPostalCode(): ?string
    {
        return $this->birthPostalCode;
    }

    public function setBirthPostalCode(?string $birthPostalCode): Customer
    {
        $this->birthPostalCode = $birthPostalCode;

        return $this;
    }

    public function getBirthCountry(): ?string
    {
        return $this->birthCountry;
    }

    public function setBirthCountry(?string $birthCountry): Customer
    {
        $this->birthCountry = $birthCountry;

        return $this;
    }

    public function getBirthStateOrProvince(): ?string
    {
        return $this->birthStateOrProvince;
    }

    public function setBirthStateOrProvince(?string $birthStateOrProvince): Customer
    {
        $this->birthStateOrProvince = $birthStateOrProvince;

        return $this;
    }

    public function getBirthCountrySubdivision(): ?string
    {
        return $this->birthCountrySubdivision;
    }

    public function setBirthCountrySubdivision(?string $birthCountrySubdivision): Customer
    {
        $this->birthCountrySubdivision = $birthCountrySubdivision;

        return $this;
    }

    public function getBirthdate(): ?DateTime
    {
        return $this->birthdate;
    }

    public function getFormatedBirthdate(): ?string
    {
        if ($this->getBirthdate() instanceof DateTime)
            return $this->getBirthdate()->format("Y-m-d");

        return null;
    }

    public function setBirthdate(?DateTime $birthdate): Customer
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): Customer
    {
        $this->phone = $phone;

        return $this;
    }

    public function getNationalIDNumber(): ?string
    {
        return $this->nationalIDNumber;
    }

    public function setNationalIDNumber(?string $nationalIDNumber): Customer
    {
        $this->nationalIDNumber = $nationalIDNumber;

        return $this;
    }

    public function getSuspiciousAccountActivity(): ?bool
    {
        return $this->suspiciousAccountActivity;
    }

    public function setSuspiciousAccountActivity(?bool $suspiciousAccountActivity): Customer
    {
        $this->suspiciousAccountActivity = $suspiciousAccountActivity;

        return $this;
    }

    public function getAuthenticationMethod(): ?string
    {
        return $this->authenticationMethod;
    }

    public function setAuthenticationMethod(?string $authenticationMethod): Customer
    {
        $this->authenticationMethod = $authenticationMethod;

        return $this;
    }

    public function getAuthenticationTimestamp(): ?DateTime
    {
        return $this->authenticationTimestamp;
    }

    public function getFormatedAuthenticationTimestamp(): ?string
    {
        if ($this->getAuthenticationTimestamp() instanceof DateTime)
            return $this->getAuthenticationTimestamp()->format("Y-m-d\TH:i:s\Z");

        return null;
    }

    public function setAuthenticationTimestamp(?DateTime $authenticationTimestamp): Customer
    {
        $this->authenticationTimestamp = $authenticationTimestamp;

        return $this;
    }

    public function getPriorAuthenticationMethod(): ?string
    {
        return $this->priorAuthenticationMethod;
    }

    public function setPriorAuthenticationMethod(?string $priorAuthenticationMethod): Customer
    {
        $this->priorAuthenticationMethod = $priorAuthenticationMethod;

        return $this;
    }

    public function getPriorAuthenticationTimestamp(): ?DateTime
    {
        return $this->priorAuthenticationTimestamp;
    }

    public function getFormatedPriorAuthenticationTimestamp(): ?string
    {
        if ($this->getPriorAuthenticationTimestamp() instanceof DateTime)
            return $this->getPriorAuthenticationTimestamp()->format("Y-m-d\TH:i:s\Z");

        return null;
    }

    public function setPriorAuthenticationTimestamp(?DateTime $priorAuthenticationTimestamp): Customer
    {
        $this->priorAuthenticationTimestamp = $priorAuthenticationTimestamp;

        return $this;
    }

    public function getPaymentMeanAge(): ?DateTime
    {
        return $this->paymentMeanAge;
    }

    public function getFormatedPaymentMeanAge(): ?string
    {
        if ($this->getPaymentMeanAge() instanceof DateTime)
            return $this->getPaymentMeanAge()->format("Y-m-d");

        return null;
    }

    public function setPaymentMeanAge(?DateTime $paymentMeanAge): Customer
    {
        $this->paymentMeanAge = $paymentMeanAge;

        return $this;
    }

    public function getLastYearTransactions(): ?int
    {
        return $this->lastYearTransactions;
    }

    public function setLastYearTransactions(?int $lastYearTransactions): Customer
    {
        $this->lastYearTransactions = $lastYearTransactions;

        return $this;
    }

    public function getLast24HoursTransactions(): ?int
    {
        return $this->last24HoursTransactions;
    }

    public function setLast24HoursTransactions(?int $last24HoursTransactions): Customer
    {
        $this->last24HoursTransactions = $last24HoursTransactions;

        return $this;
    }

    public function getAddCardNbLast24Hours(): ?int
    {
        return $this->addCardNbLast24Hours;
    }

    public function setAddCardNbLast24Hours(?int $addCardNbLast24Hours): Customer
    {
        $this->addCardNbLast24Hours = $addCardNbLast24Hours;

        return $this;
    }

    public function getLast6MonthsPurchase(): ?int
    {
        return $this->last6MonthsPurchase;
    }

    public function setLast6MonthsPurchase(?int $last6MonthsPurchase): Customer
    {
        $this->last6MonthsPurchase = $last6MonthsPurchase;

        return $this;
    }

    public function getLastPasswordChange(): ?DateTime
    {
        return $this->lastPasswordChange;
    }

    public function getFormatedLastPasswordChange(): ?string
    {
        if ($this->getLastPasswordChange() instanceof DateTime)
            return $this->getLastPasswordChange()->format("Y-m-d");

        return null;
    }

    public function setLastPasswordChange(?DateTime $lastPasswordChange): Customer
    {
        $this->lastPasswordChange = $lastPasswordChange;

        return $this;
    }

    public function getAccountAge(): ?DateTime
    {
        return $this->accountAge;
    }

    public function getFormatedAccountAge(): ?string
    {
        if ($this->getAccountAge() instanceof DateTime)
            return $this->getAccountAge()->format("Y-m-d");

        return null;
    }

    public function setAccountAge(?DateTime $accountAge): Customer
    {
        $this->accountAge = $accountAge;

        return $this;
    }

    public function getLastAccountModification(): ?DateTime
    {
        return $this->lastAccountModification;
    }

    public function getFormatedLastAccountModification(): ?string
    {
        if ($this->getLastAccountModification() instanceof DateTime)
            return $this->getLastAccountModification()->format("Y-m-d");

        return null;
    }

    public function setLastAccountModification(?DateTime $lastAccountModification): Customer
    {
        $this->lastAccountModification = $lastAccountModification;

        return $this;
    }
}