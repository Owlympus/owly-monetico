<?php

namespace OwlyMonetico\Request;

use DateTime;
use OwlyMonetico\Model\Order;

class SplitPaymentRequest extends SimplePaymentRequest
{
    const DUE_DATE_FORMAT = 'd/m/Y';

    private int $paymentDeadline;

    private DateTime $dueDate1;

    private DateTime $dueDate2;

    private ?DateTime $dueDate3;

    private ?DateTime $dueDate4;

    private float $dueAmount1;

    private float $dueAmount2;

    private ?float $dueAmount3;

    private ?float $dueAmount4;

    public function __construct(Order $order, string $language, string $currency, int $paymentDeadline)
    {
        parent::__construct($order, $language, $currency);
        $this->paymentDeadline = $paymentDeadline;
    }

    public function getPaymentDeadline(): int
    {
        return $this->paymentDeadline;
    }

    public function setPaymentDeadline(int $paymentDeadline): SplitPaymentRequest
    {
        $this->paymentDeadline = $paymentDeadline;
        return $this;
    }

    public function getDueDate1(): DateTime
    {
        return $this->dueDate1;
    }

    public function setDueDate1(DateTime $dueDate1): SplitPaymentRequest
    {
        $this->dueDate1 = $dueDate1;
        return $this;
    }

    public function getDueDate2(): DateTime
    {
        return $this->dueDate2;
    }

    public function setDueDate2(DateTime $dueDate2): SplitPaymentRequest
    {
        $this->dueDate2 = $dueDate2;
        return $this;
    }

    public function getDueDate3(): ?DateTime
    {
        return $this->dueDate3;
    }

    public function setDueDate3(?DateTime $dueDate3): SplitPaymentRequest
    {
        $this->dueDate3 = $dueDate3;
        return $this;
    }

    public function getDueDate4(): ?DateTime
    {
        return $this->dueDate4;
    }

    public function setDueDate4(?DateTime $dueDate4): SplitPaymentRequest
    {
        $this->dueDate4 = $dueDate4;
        return $this;
    }

    public function getDueAmount1(): float
    {
        return $this->dueAmount1;
    }

    public function setDueAmount1(float $dueAmount1): SplitPaymentRequest
    {
        $this->dueAmount1 = $dueAmount1;
        return $this;
    }

    public function getDueAmount2(): float
    {
        return $this->dueAmount2;
    }

    public function setDueAmount2(float $dueAmount2): SplitPaymentRequest
    {
        $this->dueAmount2 = $dueAmount2;
        return $this;
    }

    public function getDueAmount3(): ?float
    {
        return $this->dueAmount3;
    }

    public function setDueAmount3(?float $dueAmount3): SplitPaymentRequest
    {
        $this->dueAmount3 = $dueAmount3;
        return $this;
    }

    public function getDueAmount4(): ?float
    {
        return $this->dueAmount4;
    }

    public function setDueAmount4(?float $dueAmount4): SplitPaymentRequest
    {
        $this->dueAmount4 = $dueAmount4;
        return $this;
    }
}