<?php

namespace OwlyMonetico\Request;

use OwlyMonetico\Monetico;

class PreAuthorizedSimplePayment extends SimplePaymentRequest
{
    /**
     * Pre-authorization dossier number
     * @var ?string
     */
    private ?string $numeroDossier;

    public function __construct(string $reference, float $montant, string $devise, string $langue, Monetico $monetico, OrderContext $order, string $numeroDossier)
    {
        parent::__construct($reference, $montant, $devise, $langue, $monetico, $order);
        $this->setNumeroDossier($numeroDossier);
    }

    public function getFormFieldsWithoutMac(): array
    {
        $formFields = parent::getFormFieldsWithoutMac();

        if (!is_null($this->getNumeroDossier()))
            $formFields["numero_dossier"] = $this->getNumeroDossier();

        return $formFields;
    }

    public function getNumeroDossier(): ?string
    {
        return $this->numeroDossier;
    }

    public function setNumeroDossier(?string $numeroDossier): PreAuthorizedSimplePayment
    {
        $this->numeroDossier = $numeroDossier;

        return $this;
    }
}