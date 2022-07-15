<?php

namespace OwlyMonetico;

use Exception;
use OwlyMonetico\Request\PaymentRequest;

class Monetico
{
    private int $eptCode;

    private string $securityKey;

    private string $companyCode;

    private string $devUrl = 'https://p.monetico-services.com/test/paiement.cgi';

    private string $prodUrl = 'https://p.monetico-services.com/paiement.cgi';

    private string $version = '3.0';

    private string $mode = 'dev';

    /**
     * @throws Exception
     */
    public function __construct(int $eptCode, string $securityKey, string $companyCode)
    {
        if (strlen($eptCode) !== 7)
            throw new Exception("Invalid EPT Code ($eptCode)");

        if (strlen($securityKey) !== 40)
            throw new Exception("Invalid Security Key ($securityKey)");

        $this->eptCode = $eptCode;
        $this->securityKey = $securityKey;
        $this->companyCode = $companyCode;
    }

    public function getEptCode(): int
    {
        return $this->eptCode;
    }

    public function getSecurityKey(): string
    {
        return $this->securityKey;
    }

    public function getCompanyCode(): string
    {
        return $this->companyCode;
    }

    public function getDevUrl(): string
    {
        return $this->devUrl;
    }

    public function getProdUrl(): string
    {
        return $this->prodUrl;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function setMode(string $mode): Monetico
    {
        $this->mode = $mode;
        return $this;
    }



    private function getUsableKey(): string
    {
        $hexStrKey = substr($this->securityKey, 0, 38);
        $hexFinal = substr($this->securityKey, 38, 2) . '00';

        $cca0 = ord($hexFinal);

        if ($cca0 > 70 && $cca0 < 97)
            $hexStrKey .= chr($cca0 - 23) . substr($hexFinal, 1, 1);
        else {
            if (substr($hexFinal, 1, 1) == 'M')
                $hexStrKey .= substr($hexFinal, 0, 1) . '0';
            else
                $hexStrKey .= substr($hexFinal, 0, 2);
        }

        return $hexStrKey;
    }

    public function sealFields(array $fields): ?string
    {
        return $this->sealString($this->getStringToSeal($fields));
    }

    public function validateSeal(array $fields, string $expectedSeal): bool
    {
        return strtoupper($this->sealFields($fields)) === strtoupper($expectedSeal);
    }

    public function getStringToSeal(array $formFields): string
    {
        // The string to be sealed is composed of all the form fields sent
        // 1. ordered alphabetically (numbers first, then capitalized letter, then other letters)
        // 2. represented using the format key=value
        // 3. separated by "*" character
        // Please refer to technical documentation for more details
        ksort($formFields);
        return implode(
            '*',
            array_map(
                fn($k, $v) => "$k=$v",
                array_keys($formFields),
                $formFields
            )
        );
    }

    private function sealString(string $stringToSeal): ?string
    {
        return hash_hmac(
            'sha1',
            $stringToSeal,
            hex2bin($this->getUsableKey())
        );
    }



    public function getPaymentRequestFields(PaymentRequest $paymentRequest)
    {

    }
}