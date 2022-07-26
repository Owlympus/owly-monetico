<?php

namespace OwlyMonetico\Interfaces;

use OwlyMonetico\Model\Order;

interface PaymentRequestInterface
{
    const DATETIME_FORMAT = 'd/m/Y:H:i:s';

    public function getOrder(): Order;

    public function getLanguage(): string;

    public function getCurrency(): string;
}