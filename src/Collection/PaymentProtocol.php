<?php

namespace OwlyMonetico\Collection;


abstract class PaymentProtocol
{
    use _Tools;

    const COFIDIS_1_EURO = '1euro';

    const COFIDIS_3X_CB = '3xcb';

    const COFIDIS_4X_CB = '4xcb';

    const PAYPAL = 'paypal';

    const LYFPAY = 'lyfpay';

    const SOFORT = 'sofort';

    const GIROPAY = 'giropay';
}