<?php

namespace OwlyMonetico\Request;

use DateTime;

class SplitPaymentRequest extends PaymentRequest
{
    /**
     * @var ?int
     * Numbers of instalments (2, 3 or 4) this payment will be divided into
     */
    private ?int $nbrEch;

    /**
     * Date of the first instalment
     * @var ?DateTime
     * The first instalment MUST be set to today's date
     */
    private ?DateTime $dateEch1;

    /**
     * @var ?DateTime
     * Date of the second instalment
     */
    private ?DateTime $dateEch2;

    /**
     * @var ?DateTime
     * Date of the third instalment
     */
    private ?DateTime $dateEch3;

    /**
     * @var ?DateTime
     * Date of the fourth instalment
     */
    private ?DateTime $dateEch4;

    /**
     * @var ?float
     * Amount of the first instalment
     */
    private ?float $montantEch1;

    /**
     * @var ?float
     * Amount of the second instalment
     */
    private ?float $montantEch2;

    /**
     * @var ?float
     * Amount of the third instalment
     */
    private ?float $montantEch3;

    /**
     * @var ?float
     * Amount of the fourth instalment
     */
    private ?float $montantEch4;

    public function getFormFieldsWithoutMac(): array
    {
        $formFields = parent::getFormFieldsWithoutMac();

        if (!is_null($this->getNbrEch()))
            $formFields["nbrech"] = $this->getNbrEch();

        if (!is_null($this->getDateEch1()))
            $formFields["dateech1"] = $this->getDateEch1()->format("d/m/Y");

        if (!is_null($this->getDateEch2()))
            $formFields["dateech2"] = $this->getDateEch2()->format("d/m/Y");

        if (!is_null($this->getDateEch3()))
            $formFields["dateech3"] = $this->getDateEch3()->format("d/m/Y");

        if (!is_null($this->getDateEch4()))
            $formFields["dateech4"] = $this->getDateEch4()->format("d/m/Y");

        if (!is_null($this->getMontantEch1()))
            $formFields["montantech1"] = $this->formatAmount($this->getMontantEch1(), $this->getDevise());

        if (!is_null($this->getMontantEch2()))
            $formFields["montantech2"] = $this->formatAmount($this->getMontantEch2(), $this->getDevise());

        if (!is_null($this->getMontantEch3()))
            $formFields["montantech3"] = $this->formatAmount($this->getMontantEch3(), $this->getDevise());

        if (!is_null($this->getMontantEch4()))
            $formFields["montantech4"] = $this->formatAmount($this->getMontantEch4(), $this->getDevise());

        return $formFields;
    }

    public function getNbrEch(): ?int
    {
        return $this->nbrEch;
    }

    public function setNbrEch(?int $nbrEch): SplitPaymentRequest
    {
        $this->nbrEch = $nbrEch;

        return $this;
    }

    public function getDateEch1(): ?DateTime
    {
        return $this->dateEch1;
    }

    public function setDateEch1(?DateTime $dateEch1): SplitPaymentRequest
    {
        $this->dateEch1 = $dateEch1;

        return $this;
    }

    public function getDateEch2(): ?DateTime
    {
        return $this->dateEch2;
    }

    public function setDateEch2(?DateTime $dateEch2): SplitPaymentRequest
    {
        $this->dateEch2 = $dateEch2;

        return $this;
    }

    public function getDateEch3(): ?DateTime
    {
        return $this->dateEch3;
    }

    public function setDateEch3(?DateTime $dateEch3): SplitPaymentRequest
    {
        $this->dateEch3 = $dateEch3;

        return $this;
    }

    public function getDateEch4(): ?DateTime
    {
        return $this->dateEch4;
    }

    public function setDateEch4(?DateTime $dateEch4): SplitPaymentRequest
    {
        $this->dateEch4 = $dateEch4;

        return $this;
    }

    public function getMontantEch1(): ?float
    {
        return $this->montantEch1;
    }

    public function setMontantEch1(?float $montantEch1): SplitPaymentRequest
    {
        $this->montantEch1 = $montantEch1;

        return $this;
    }

    public function getMontantEch2(): ?float
    {
        return $this->montantEch2;
    }

    public function setMontantEch2(?float $montantEch2): SplitPaymentRequest
    {
        $this->montantEch2 = $montantEch2;

        return $this;
    }

    public function getMontantEch3(): ?float
    {
        return $this->montantEch3;
    }

    public function setMontantEch3(?float $montantEch3): SplitPaymentRequest
    {
        $this->montantEch3 = $montantEch3;

        return $this;
    }

    public function getMontantEch4(): ?float
    {
        return $this->montantEch4;
    }

    public function setMontantEch4(?float $montantEch4): SplitPaymentRequest
    {
        $this->montantEch4 = $montantEch4;

        return $this;
    }
}