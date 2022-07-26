<?php

namespace OwlyMonetico\Collection;

abstract class ProductCode
{
    use _Tools;

    const ADULT_CONTENT = 'adult_content';

    const COUPON = 'coupon';

    const DEFAULT = 'default';

    const ELECTRONIC_GOOD = 'electronic_good';

    const ELECTRONIC_SOFTWARE = 'electronic_software';

    const GIFT_CERTIFICATE = 'gift_certificate';

    const HANDLING_ONLY = 'handling_only';

    const SERVICE = 'service';

    const SHIPPING_AND_HANDLING = 'shipping_and_handling';

    const SHIPPING_ONLY = 'shipping_only';

    const SUBSCRIPTION = 'subscription';
}