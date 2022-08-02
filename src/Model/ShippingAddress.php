<?php

namespace OwlyMonetico\Model;

use DateTime;
use Exception;
use OwlyMonetico\Collection\DeliveryTimeframe;
use OwlyMonetico\Collection\ShipIndicator;


class ShippingAddress
{
    const DATE_FORMAT = 'Y-m-d';

    private ?string $civility = null;

    private ?string $name = null;

    private ?string $firstName = null;

    private ?string $lastName = null;

    private ?string $middleName = null;

    private ?string $address = null;

    private string $addressLine1;

    private ?string $addressLine2 = null;

    private ?string $addressLine3 = null;

    private string $city;

    private string $postalCode;

    private string $country;

    private ?string $stateOrProvince = null;

    private ?string $countrySubdivision = null;

    private ?string $email = null;

    private ?string $phone = null;

    private ?string $shipIndicator = null;

    private ?string $deliveryTimeframe = null;

    private ?DateTime $firstUseDate = null;

    private ?bool $matchBillingAddress = null;

    public function __construct(string $addressLine1, string $city, string $postalCode, string $country)
    {
        $this->addressLine1 = $addressLine1;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->country = $country;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(?string $civility): ShippingAddress
    {
        $this->civility = $civility;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): ShippingAddress
    {
        $this->name = $name;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): ShippingAddress
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): ShippingAddress
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): ShippingAddress
    {
        $this->middleName = $middleName;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): ShippingAddress
    {
        $this->address = $address;
        return $this;
    }

    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(string $addressLine1): ShippingAddress
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): ShippingAddress
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    public function setAddressLine3(?string $addressLine3): ShippingAddress
    {
        $this->addressLine3 = $addressLine3;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): ShippingAddress
    {
        $this->city = $city;
        return $this;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): ShippingAddress
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): ShippingAddress
    {
        $this->country = $country;
        return $this;
    }

    public function getStateOrProvince(): ?string
    {
        return $this->stateOrProvince;
    }

    public function setStateOrProvince(?string $stateOrProvince): ShippingAddress
    {
        $this->stateOrProvince = $stateOrProvince;
        return $this;
    }

    public function getCountrySubdivision(): ?string
    {
        return $this->countrySubdivision;
    }

    public function setCountrySubdivision(?string $countrySubdivision): ShippingAddress
    {
        $this->countrySubdivision = $countrySubdivision;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): ShippingAddress
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): ShippingAddress
    {
        $this->phone = $phone;
        return $this;
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
        if ($this->firstUseDate instanceof DateTime)
            return $this->firstUseDate->format("Y-m-d");

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

    /**
     * @throws Exception
     */
    public function validate($data)
    {
        if (strlen($data['addressLine1']) > 50)
            throw new Exception('Field "ShippingAddress->addressLine1" incorrect (' . $data['addressLine1'] . '). Need 50 characters max.');
        if (strlen($data['city']) > 50)
            throw new Exception('Field "ShippingAddress->city" incorrect (' . $data['city'] . '). Need 50 characters max.');
        if (strlen($data['postalCode']) > 10)
            throw new Exception('Field "ShippingAddress->postalCode" incorrect (' . $data['postalCode'] . '). Need 10 characters max.');
        if (preg_match('/^[A-Z]{2}$/', $data['country']) === false)
            throw new Exception('Field "ShippingAddress->country" incorrect (' . $data['country'] . '). Need 2 capitalized letters max.');

        if (!empty($data['civility']) && preg_match('/^[a-zA-Z]{1,32}$/', $data['civility']) === false)
            throw new Exception('Field "ShippingAddress->civility" incorrect (' . $data['civility'] . '). Need 32 letters max with no accent.');
        if (!empty($data['name']) && strlen($data['name']) > 45)
            throw new Exception('Field "ShippingAddress->name" incorrect (' . $data['name'] . '). Need 45 characters max.');
        if (!empty($data['firstName']) && strlen($data['firstName']) > 45)
            throw new Exception('Field "ShippingAddress->firstName" incorrect (' . $data['firstName'] . '). Need 45 characters max.');
        if (!empty($data['lastName']) && strlen($data['lastName']) > 45)
            throw new Exception('Field "ShippingAddress->lastName" incorrect (' . $data['lastName'] . '). Need 45 characters max.');
        if (!empty($data['middleName']) && strlen($data['middleName']) > 150)
            throw new Exception('Field "ShippingAddress->middleName" incorrect (' . $data['middleName'] . '). Need 150 characters max.');
        if (!empty($data['address']) && strlen($data['address']) > 250)
            throw new Exception('Field "ShippingAddress->address" incorrect (' . $data['address'] . '). Need 250 characters max.');
        if (!empty($data['addressLine2']) && strlen($data['addressLine2']) > 50)
            throw new Exception('Field "ShippingAddress->addressLine2" incorrect (' . $data['addressLine2'] . '). Need 50 characters max.');
        if (!empty($data['addressLine3']) && strlen($data['addressLine3']) > 50)
            throw new Exception('Field "ShippingAddress->addressLine3" incorrect (' . $data['addressLine3'] . '). Need 50 characters max.');
        if (!empty($data['stateOrProvince']) && preg_match('/^' . $data['country'] . '-[A-Z]{1,3}$/', $data['stateOrProvince']) === false)
            throw new Exception('Field "ShippingAddress->stateOrProvince" incorrect (' . $data['stateOrProvince'] . '). Need format [^' . $data['country'] . '-[A-Z]{1,3}$].');
        if (!empty($data['countrySubdivision']) && preg_match('/^' . $data['country'] . '-[A-Z]{1,3}$/', $data['stateOrProvince']) === false)
            throw new Exception('Field "ShippingAddress->countrySubdivision" incorrect (' . $data['countrySubdivision'] . '). Need format [^' . $data['country'] . '-[A-Z]{1,3}$].');
        if (!empty($data['email']) && (strlen($data['email']) > 254 || filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false))
            throw new Exception('Field "ShippingAddress->email" incorrect (' . $data['email'] . '). Need 254 characters max and having email format.');
        if (!empty($data['phone']) && (strlen($data['phone']) > 18 || preg_match('/^\+\d{1,4}-\d+$/', $data['phone']) === false))
            throw new Exception('Field "ShippingAddress->phone" incorrect (' . $data['phone'] . '). Need 18 characters max and having format [^\+\d{1,4}-\d+$].');
        if(!empty($data['shipIndicator']) && !in_array($data['shipIndicator'], ShipIndicator::all()))
            throw new Exception('Field "ShippingAddress->shipIndicator" incorrect (' . $data['shipIndicator'] . '). Need to be an available ship indicator in this list : ['.implode(', ', ShipIndicator::all()).'].');
        if(!empty($data['deliveryTimeframe']) && !in_array($data['deliveryTimeframe'], DeliveryTimeframe::all()))
            throw new Exception('Field "ShippingAddress->deliveryTimeframe" incorrect (' . $data['deliveryTimeframe'] . '). Need to be an available delivery timeframe in this list : ['.implode(', ', DeliveryTimeframe::all()).'].');
    }

    /**
     * @throws Exception
     */
    public function generateContext($skipValidation = false): array
    {
        $data = [
            'addressLine1' => $this->addressLine1,
            'city' => $this->city,
            'postalCode' => $this->postalCode,
            'country' => $this->country,
        ];

        // Optionnal
        if(!empty($this->civility))
            $data['civility'] = $this->civility;
        if(!empty($this->name))
            $data['name'] = $this->name;
        if(!empty($this->firstName))
            $data['firstName'] = $this->firstName;
        if(!empty($this->lastName))
            $data['lastName'] = $this->lastName;
        if(!empty($this->middleName))
            $data['middleName'] = $this->middleName;
        if(!empty($this->address))
            $data['address'] = $this->address;
        if(!empty($this->addressLine2))
            $data['addressLine2'] = $this->addressLine2;
        if(!empty($this->addressLine3))
            $data['addressLine3'] = $this->addressLine3;
        if(!empty($this->stateOrProvince))
            $data['stateOrProvince'] = $this->stateOrProvince;
        if(!empty($this->countrySubdivision))
            $data['countrySubdivision'] = $this->countrySubdivision;
        if(!empty($this->email))
            $data['email'] = $this->email;
        if(!empty($this->phone))
            $data['phone'] = $this->phone;
        if(!empty($this->shipIndicator))
            $data['shipIndicator'] = $this->shipIndicator;
        if(!empty($this->deliveryTimeframe))
            $data['deliveryTimeframe'] = $this->deliveryTimeframe;
        if(!empty($this->firstUseDate))
            $data['firstUseDate'] = $this->firstUseDate->format(self::DATE_FORMAT);
        if(isset($this->matchBillingAddress))
            $data['matchBillingAddress'] = $this->matchBillingAddress;

        if(!$skipValidation)
            $this->validate($data);

        return $data;
    }
}