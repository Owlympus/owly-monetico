<?php

namespace OwlyMonetico\Request;

use OwlyMonetico\Model\Order;

class PreAuthorizedPaymentRequest extends SimplePaymentRequest
{
    private string $fileNumber;

    public function __construct(Order $order, string $language, string $currency, string $fileNumber)
    {
        parent::__construct($order, $language, $currency);
        $this->fileNumber = $fileNumber;
    }

    public function getFileNumber(): string
    {
        return $this->fileNumber;
    }

    public function setFileNumber(string $fileNumber): PreAuthorizedPaymentRequest
    {
        $this->fileNumber = $fileNumber;
        return $this;
    }
}