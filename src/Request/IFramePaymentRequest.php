<?php

namespace OwlyMonetico\Request;

use OwlyMonetico\Model\Order;

class IFramePaymentRequest extends SimplePaymentRequest
{
    private string $email;

    public function __construct(Order $order, string $language, string $currency, string $email)
    {
        parent::__construct($order, $language, $currency);
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}