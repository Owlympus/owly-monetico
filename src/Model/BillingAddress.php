<?php

namespace OwlyMonetico\Model;


use Exception;

class BillingAddress
{
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

    private ?string $mobilePhone = null;

    private ?string $homePhone = null;

    private ?string $workPhone = null;

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

    public function setCivility(?string $civility): BillingAddress
    {
        $this->civility = $civility;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): BillingAddress
    {
        $this->name = $name;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): BillingAddress
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): BillingAddress
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): BillingAddress
    {
        $this->middleName = $middleName;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): BillingAddress
    {
        $this->address = $address;
        return $this;
    }

    public function getAddressLine1(): string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(string $addressLine1): BillingAddress
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): BillingAddress
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    public function setAddressLine3(?string $addressLine3): BillingAddress
    {
        $this->addressLine3 = $addressLine3;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): BillingAddress
    {
        $this->city = $city;
        return $this;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): BillingAddress
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): BillingAddress
    {
        $this->country = $country;
        return $this;
    }

    public function getStateOrProvince(): ?string
    {
        return $this->stateOrProvince;
    }

    public function setStateOrProvince(?string $stateOrProvince): BillingAddress
    {
        $this->stateOrProvince = $stateOrProvince;
        return $this;
    }

    public function getCountrySubdivision(): ?string
    {
        return $this->countrySubdivision;
    }

    public function setCountrySubdivision(?string $countrySubdivision): BillingAddress
    {
        $this->countrySubdivision = $countrySubdivision;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): BillingAddress
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): BillingAddress
    {
        $this->phone = $phone;
        return $this;
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

    /**
     * @throws Exception
     */
    public function validate($data)
    {
        if (strlen($data['addressLine1']) > 50)
            throw new Exception('Field "BillingAddress->addressLine1" incorrect (' . $data['addressLine1'] . '). Need 50 characters max.');
        if (strlen($data['city']) > 50)
            throw new Exception('Field "BillingAddress->city" incorrect (' . $data['city'] . '). Need 50 characters max.');
        if (strlen($data['postalCode']) > 10)
            throw new Exception('Field "BillingAddress->postalCode" incorrect (' . $data['postalCode'] . '). Need 10 characters max.');
        if (preg_match('/^[A-Z]{2}$/', $data['country']) === false)
            throw new Exception('Field "BillingAddress->country" incorrect (' . $data['country'] . '). Need 2 capitalized letters max.');

        if (!empty($data['civility']) && preg_match('/^[a-zA-Z]{1,32}$/', $data['civility']) === false)
            throw new Exception('Field "BillingAddress->civility" incorrect (' . $data['civility'] . '). Need 32 letters max with no accent.');
        if (!empty($data['name']) && strlen($data['name']) > 45)
            throw new Exception('Field "BillingAddress->name" incorrect (' . $data['name'] . '). Need 45 characters max.');
        if (!empty($data['firstName']) && strlen($data['firstName']) > 45)
            throw new Exception('Field "BillingAddress->firstName" incorrect (' . $data['firstName'] . '). Need 45 characters max.');
        if (!empty($data['lastName']) && strlen($data['lastName']) > 45)
            throw new Exception('Field "BillingAddress->lastName" incorrect (' . $data['lastName'] . '). Need 45 characters max.');
        if (!empty($data['lastName']) && strlen($data['middleName']) > 150)
            throw new Exception('Field "BillingAddress->middleName" incorrect (' . $data['middleName'] . '). Need 150 characters max.');
        if (!empty($data['address']) && strlen($data['address']) > 250)
            throw new Exception('Field "BillingAddress->address" incorrect (' . $data['address'] . '). Need 250 characters max.');
        if (!empty($data['addressLine2']) && strlen($data['addressLine2']) > 50)
            throw new Exception('Field "BillingAddress->addressLine2" incorrect (' . $data['addressLine2'] . '). Need 50 characters max.');
        if (!empty($data['addressLine3']) && strlen($data['addressLine3']) > 50)
            throw new Exception('Field "BillingAddress->addressLine3" incorrect (' . $data['addressLine3'] . '). Need 50 characters max.');
        if (!empty($data['stateOrProvince']) && preg_match('/^' . $data['country'] . '-[A-Z]{1,3}$/', $data['stateOrProvince']) === false)
            throw new Exception('Field "BillingAddress->stateOrProvince" incorrect (' . $data['stateOrProvince'] . '). Need format [^' . $data['country'] . '-[A-Z]{1,3}$].');
        if (!empty($data['countrySubdivision']) && preg_match('/^' . $data['country'] . '-[A-Z]{1,3}$/', $data['stateOrProvince']) === false)
            throw new Exception('Field "BillingAddress->countrySubdivision" incorrect (' . $data['countrySubdivision'] . '). Need format [^' . $data['country'] . '-[A-Z]{1,3}$].');
        if (!empty($data['email']) && (strlen($data['email']) > 254 || filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false))
            throw new Exception('Field "BillingAddress->email" incorrect (' . $data['email'] . '). Need 254 characters max and having email format.');
        if (!empty($data['phone']) && (strlen($data['phone']) > 18 || preg_match('/^\+\d{1,4}-\d+$/', $data['phone']) === false))
            throw new Exception('Field "BillingAddress->phone" incorrect (' . $data['phone'] . '). Need 18 characters max and having format [^\+\d{1,4}-\d+$].');
        if (!empty($data['mobilePhone']) && (strlen($data['mobilePhone']) > 18 || preg_match('/^\+\d{1,4}-\d+$/', $data['mobilePhone']) === false))
            throw new Exception('Field "BillingAddress->mobilePhone" incorrect (' . $data['mobilePhone'] . '). Need 18 characters max and having format [^\+\d{1,4}-\d+$].');
        if (!empty($data['homePhone']) && (strlen($data['homePhone']) > 18 || preg_match('/^\+\d{1,4}-\d+$/', $data['homePhone']) === false))
            throw new Exception('Field "BillingAddress->homePhone" incorrect (' . $data['homePhone'] . '). Need 18 characters max and having format [^\+\d{1,4}-\d+$].');
        if (!empty($data['workPhone']) && (strlen($data['workPhone']) > 18 || preg_match('/^\+\d{1,4}-\d+$/', $data['workPhone']) === false))
            throw new Exception('Field "BillingAddress->workPhone" incorrect (' . $data['workPhone'] . '). Need 18 characters max and having format [^\+\d{1,4}-\d+$].');
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
        if (!empty($this->civility))
            $data['civility'] = $this->civility;
        if (!empty($this->name))
            $data['name'] = $this->name;
        if (!empty($this->firstName))
            $data['firstName'] = $this->firstName;
        if (!empty($this->lastName))
            $data['lastName'] = $this->lastName;
        if (!empty($this->middleName))
            $data['middleName'] = $this->middleName;
        if (!empty($this->address))
            $data['address'] = $this->address;
        if (!empty($this->addressLine2))
            $data['addressLine2'] = $this->addressLine2;
        if (!empty($this->addressLine3))
            $data['addressLine3'] = $this->addressLine3;
        if (!empty($this->stateOrProvince))
            $data['stateOrProvince'] = $this->stateOrProvince;
        if (!empty($this->countrySubdivision))
            $data['countrySubdivision'] = $this->countrySubdivision;
        if (!empty($this->email))
            $data['email'] = $this->email;
        if (!empty($this->phone))
            $data['phone'] = $this->phone;
        if (!empty($this->mobilePhone))
            $data['mobilePhone'] = $this->mobilePhone;
        if (!empty($this->homePhone))
            $data['homePhone'] = $this->homePhone;
        if (!empty($this->workPhone))
            $data['workPhone'] = $this->workPhone;

        if (!$skipValidation)
            $this->validate($data);

        return $data;
    }
}