<?php

namespace OwlyMonetico\Model;

use DateTime;
use Exception;
use OwlyMonetico\Collection\AuthenticationMethod;
use OwlyMonetico\Collection\PriorAuthenticationMethod;

class Customer
{
    const ACCOUNT_AGE_FORMAT = 'Y-m-d';

    const PAYMENT_MEAN_AGE_FORMAT = 'Y-m-d';

    const AUTHENTICATION_TIMESTAMP_FORMAT = 'Y-m-d\Th:i:s\Z';

    const LAST_PASSWORD_CHANGE_FORMAT = 'Y-m-d';

    const LAST_ACCOUNT_MODIFICATION_FORMAT = 'Y-m-d';

    private ?string $civility = null;

    private ?string $name = null;

    private ?string $firstName = null;

    private ?string $lastName = null;

    private ?string $middleName = null;

    private ?string $address = null;

    private ?string $addressLine1 = null;

    private ?string $addressLine2 = null;

    private ?string $addressLine3 = null;

    private ?string $city = null;

    private ?string $postalCode = null;

    private ?string $country = null;

    private ?string $stateOrProvince = null;

    private ?string $countrySubdivision = null;

    private ?string $email = null;

    private ?string $birthLastName = null;

    private ?string $birthCity = null;

    private ?string $birthPostalCode = null;

    private ?string $birthCountry = null;

    private ?string $birthStateOrProvince = null;

    private ?string $birthCountrySubdivision = null;

    private ?DateTime $birthdate = null;

    private ?string $phone = null;

    private ?string $nationalIDNumber = null;

    private ?bool $suspiciousAccountActivity = null;

    private ?string $authenticationMethod = null;

    private ?DateTime $authenticationTimestamp = null;

    private ?string $priorAuthenticationMethod = null;

    private ?DateTime $priorAuthenticationTimestamp = null;

    private ?DateTime $paymentMeanAge = null;

    private ?int $lastYearTransactions = null;

    private ?int $last24HoursTransactions = null;

    private ?int $addCardNbLast24Hours = null;

    private ?int $last6MonthsPurchase = null;

    private ?DateTime $lastPasswordChange = null;

    private ?DateTime $accountAge = null;

    private ?DateTime $lastAccountModification = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Customer
    {
        $this->email = $email;

        return $this;
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

    public function setPriorAuthenticationTimestamp(?DateTime $priorAuthenticationTimestamp): Customer
    {
        $this->priorAuthenticationTimestamp = $priorAuthenticationTimestamp;

        return $this;
    }

    public function getPaymentMeanAge(): ?DateTime
    {
        return $this->paymentMeanAge;
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

    public function setLastPasswordChange(?DateTime $lastPasswordChange): Customer
    {
        $this->lastPasswordChange = $lastPasswordChange;

        return $this;
    }

    public function getAccountAge(): ?DateTime
    {
        return $this->accountAge;
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

    public function setLastAccountModification(?DateTime $lastAccountModification): Customer
    {
        $this->lastAccountModification = $lastAccountModification;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function validate($data)
    {
        if (!empty($data['civility']) && preg_match('/^[a-zA-Z]{1,32}$/', $data['civility']) === false)
            throw new Exception('Field "Customer->civility" incorrect (' . $data['civility'] . '). Need 32 letters max with no accent.');
        if (!empty($data['name']) && strlen($data['name']) > 45)
            throw new Exception('Field "Customer->name" incorrect (' . $data['name'] . '). Need 45 characters max.');
        if (!empty($data['firstName']) && strlen($data['firstName']) > 45)
            throw new Exception('Field "Customer->firstName" incorrect (' . $data['firstName'] . '). Need 45 characters max.');
        if (!empty($data['lastName']) && strlen($data['lastName']) > 45)
            throw new Exception('Field "Customer->lastName" incorrect (' . $data['lastName'] . '). Need 45 characters max.');
        if (!empty($data['middleName']) && strlen($data['middleName']) > 150)
            throw new Exception('Field "Customer->middleName" incorrect (' . $data['middleName'] . '). Need 150 characters max.');
        if (!empty($data['address']) && strlen($data['address']) > 250)
            throw new Exception('Field "Customer->address" incorrect (' . $data['address'] . '). Need 250 characters max.');
        if (!empty($data['addressLine1']) && strlen($data['addressLine1']) > 50)
            throw new Exception('Field "Customer->addressLine1" incorrect (' . $data['addressLine1'] . '). Need 50 characters max.');
        if (!empty($data['addressLine2']) && strlen($data['addressLine2']) > 50)
            throw new Exception('Field "Customer->addressLine2" incorrect (' . $data['addressLine2'] . '). Need 50 characters max.');
        if (!empty($data['addressLine3']) && strlen($data['addressLine3']) > 50)
            throw new Exception('Field "Customer->addressLine3" incorrect (' . $data['addressLine3'] . '). Need 50 characters max.');
        if (!empty($data['city']) && strlen($data['city']) > 50)
            throw new Exception('Field "Customer->city" incorrect (' . $data['city'] . '). Need 50 characters max.');
        if (!empty($data['postalCode']) && strlen($data['postalCode']) > 10)
            throw new Exception('Field "Customer->postalCode" incorrect (' . $data['postalCode'] . '). Need 10 characters max.');
        if (!empty($data['country']) && preg_match('/^[A-Z]{2}$/', $data['country']) === false)
            throw new Exception('Field "Customer->country" incorrect (' . $data['country'] . '). Need 2 capitalized letters max.');
        if (!empty($data['stateOrProvince']) && preg_match('/^' . $data['country'] . '-[A-Z]{1,3}$/', $data['stateOrProvince']) === false)
            throw new Exception('Field "Customer->stateOrProvince" incorrect (' . $data['stateOrProvince'] . '). Need format [^' . $data['country'] . '-[A-Z]{1,3}$].');
        if (!empty($data['countrySubdivision']) && preg_match('/^' . $data['country'] . '-[A-Z]{1,3}$/', $data['stateOrProvince']) === false)
            throw new Exception('Field "Customer->countrySubdivision" incorrect (' . $data['countrySubdivision'] . '). Need format [^' . $data['country'] . '-[A-Z]{1,3}$].');
        if (!empty($data['email']) && (strlen($data['email']) > 254 || filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false))
            throw new Exception('Field "Customer->email" incorrect (' . $data['email'] . '). Need 254 characters max and having email format.');
        if(!empty($data['birthLastName']) && strlen($data['birthLastName']) > 45)
            throw new Exception('Field "Customer->birthLastName" incorrect (' . $data['birthLastName'] . '). Need 45 characters max.');
        if(!empty($data['birthCity']) && strlen($data['birthCity']) > 50)
            throw new Exception('Field "Customer->birthStateOrProvince" incorrect (' . $data['birthCity'] . '). Need 50 characters max.');
        if(!empty($data['birthPostalCode']) && strlen($data['birthPostalCode']) > 10)
            throw new Exception('Field "Customer->birthPostalCode" incorrect (' . $data['birthPostalCode'] . '). Need 10 characters max.');
        if(!empty($data['birthCountry']) && preg_match('/^[A-Z]{2}$/', $data['country']) === false)
            throw new Exception('Field "Customer->birthCountry" incorrect (' . $data['birthCountry'] . '). Need 2 capitalized letters max.');
        if(!empty($data['birthStateOrProvince']) && preg_match('/^[A-Z]{2}-[A-Z]{1,3}$/', $data['stateOrProvince']) === false)
            throw new Exception('Field "Customer->birthStateOrProvince" incorrect (' . $data['birthStateOrProvince'] . '). Need format [^[A-Z]{2}-[A-Z]{1,3}$].');
        if(!empty($data['birthCountrySubdivision']) && preg_match('/^[A-Z]{2}-[A-Z]{1,3}$/', $data['birthCountrySubdivision']) === false)
            throw new Exception('Field "Customer->birthCountrySubdivision" incorrect (' . $data['birthCountrySubdivision'] . '). Need format [^[A-Z]{2}-[A-Z]{1,3}$].');
        if (!empty($data['phone']) && (strlen($data['phone']) > 18 || preg_match('/^\+\d{1,4}-\d+$/', $data['phone']) === false))
            throw new Exception('Field "Customer->phone" incorrect (' . $data['phone'] . '). Need 18 characters max and having format [^\+\d{1,4}-\d+$].');
        if(!empty($data['nationalIDNumber']) && strlen($data['nationalIDNumber']) > 255)
            throw new Exception('Field "Customer->nationalIDNumber" incorrect (' . $data['nationalIDNumber'] . '). Need 255 characters max.');
        if(!empty($data['authenticationMethod']) && !in_array($data['authenticationMethod'], AuthenticationMethod::all()))
            throw new Exception('Field "Customer->authenticationMethod" incorrect (' . $data['authenticationMethod'] . '). Need to be an available authentication method in this list: ['.implode(', ', AuthenticationMethod::all()).'].');
        if(!empty($data['priorAuthenticationMethod']) && !in_array($data['priorAuthenticationMethod'], PriorAuthenticationMethod::all()))
            throw new Exception('Field "Customer->priorAuthenticationMethod" incorrect (' . $data['priorAuthenticationMethod'] . '). Need to be an available prior authentication method in this list: ['.implode(', ', PriorAuthenticationMethod::all()).'].');
        if(isset($data['lastYearTransactions']) && $data['lastYearTransactions'] < 0)
            throw new Exception('Field "Customer->lastYearTransactions" incorrect (' . $data['lastYearTransactions'] . '). Need to be a positive integer or 0.');
        if(isset($data['last24HoursTransactions']) && $data['last24HoursTransactions'] < 0)
            throw new Exception('Field "Customer->last24HoursTransactions" incorrect (' . $data['last24HoursTransactions'] . '). Need to be a positive integer or 0.');
        if(isset($data['addCardNbLast24Hours']) && $data['addCardNbLast24Hours'] < 0)
            throw new Exception('Field "Customer->addCardNbLast24Hours" incorrect (' . $data['addCardNbLast24Hours'] . '). Need to be a positive integer or 0.');
        if (isset($data['last6MonthsPurchase']) && $data['last6MonthsPurchase'] < 0)
            throw new Exception('Field "Customer->last6MonthsPurchase" incorrect (' . $data['last6MonthsPurchase'] . '). Need to be a positive integer or 0.');
    }

    /**
     * @throws Exception
     */
    public function generateContext($skipValidation = false): array
    {
        $data = [];

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
        if(!empty($this->addressLine1))
            $data['addressLine1'] = $this->addressLine1;
        if(!empty($this->addressLine2))
            $data['addressLine2'] = $this->addressLine2;
        if(!empty($this->addressLine3))
            $data['addressLine3'] = $this->addressLine3;
        if(!empty($this->city))
            $data['city'] = $this->city;
        if(!empty($this->postalCode))
            $data['postalCode'] = $this->postalCode;
        if(!empty($this->country))
            $data['country'] = $this->country;
        if(!empty($this->stateOrProvince))
            $data['stateOrProvince'] = $this->stateOrProvince;
        if(!empty($this->countrySubdivision))
            $data['countrySubdivision'] = $this->countrySubdivision;
        if(!empty($this->email))
            $data['email'] = $this->email;
        if(!empty($this->birthLastName))
            $data['birthLastName'] = $this->birthLastName;
        if(!empty($this->birthCity))
            $data['birthCity'] = $this->birthCity;
        if(!empty($this->birthPostalCode))
            $data['birthPostalCode'] = $this->birthPostalCode;
        if(!empty($this->birthCountry))
            $data['birthCountry'] = $this->birthCountry;
        if(!empty($this->birthStateOrProvince))
            $data['birthStateOrProvince'] = $this->birthStateOrProvince;
        if(!empty($this->birthCountrySubdivision))
            $data['birthCountrySubdivision'] = $this->birthCountrySubdivision;
        if(!empty($this->birthdate))
            $data['birthdate'] = $this->birthdate;
        if(!empty($this->phone))
            $data['phone'] = $this->phone;
        if(!empty($this->nationalIDNumber))
            $data['nationalIDNumber'] = $this->nationalIDNumber;
        if(!empty($this->suspiciousAccountActivity))
            $data['suspiciousAccountActivity'] = $this->suspiciousAccountActivity;
        if(!empty($this->authenticationMethod))
            $data['authenticationMethod'] = $this->authenticationMethod;
        if(!empty($this->authenticationTimestamp))
            $data['authenticationTimestamp'] = $this->authenticationTimestamp;
        if(!empty($this->priorAuthenticationMethod))
            $data['priorAuthenticationMethod'] = $this->priorAuthenticationMethod;
        if(!empty($this->priorAuthenticationTimestamp))
            $data['priorAuthenticationTimestamp'] = $this->priorAuthenticationTimestamp->format(self::AUTHENTICATION_TIMESTAMP_FORMAT);
        if(!empty($this->paymentMeanAge))
            $data['paymentMeanAge'] = $this->paymentMeanAge->format(self::PAYMENT_MEAN_AGE_FORMAT);
        if(!empty($this->lastYearTransactions))
            $data['lastYearTransactions'] = $this->lastYearTransactions;
        if(!empty($this->last24HoursTransactions))
            $data['last24HoursTransactions'] = $this->last24HoursTransactions;
        if(!empty($this->addCardNbLast24Hours))
            $data['addCardNbLast24Hours'] = $this->addCardNbLast24Hours;
        if(!empty($this->last6MonthsPurchase))
            $data['last6MonthsPurchase'] = $this->last6MonthsPurchase;
        if(!empty($this->lastPasswordChange))
            $data['lastPasswordChange'] = $this->lastPasswordChange->format(self::LAST_PASSWORD_CHANGE_FORMAT);
        if(!empty($this->accountAge))
            $data['accountAge'] = $this->accountAge->format(self::ACCOUNT_AGE_FORMAT);
        if(!empty($this->lastAccountModification))
            $data['lastAccountModificatio'] = $this->lastAccountModification->format(self::LAST_ACCOUNT_MODIFICATION_FORMAT);

        if(!$skipValidation)
            $this->validate($data);

        return $data;
    }
}