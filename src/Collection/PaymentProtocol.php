<?php

namespace OwlyMonetico\Collection;

abstract class PaymentProtocol
{
    use _Tools;

    /**
     * Payment method 1EURO.COM / CofidisPay
     */
    const COFIDIS_1_EURO = '1euro';

    /**
     * Payment method Cofidis 3x
     */
    const COFIDIS_3X_CB = '3xcb';

    /**
     * Payment method Cofidis 4x
     */
    const COFIDIS_4X_CB = '4xcb';

    /**
     * Payment method Paypal
     */
    const PAYPAL = 'paypal';

    /**
     * Payment method Lyf
     */
    const LYFPAY = 'lyfpay';
}