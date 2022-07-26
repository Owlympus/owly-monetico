<?php

namespace OwlyMonetico\Collection;

abstract class ShipIndicator
{
    use _Tools;

    const DIGITAL_GOODS = 'digital_goods';

    const TRAVEL_AND_EVENT = 'travel_and_event';

    const BILLING_ADDRESS = 'billing_address';

    const VERIFIED_ADDRESS = 'verified_address';

    const ANOTHER_ADDRESS = 'another_address';

    const PICK_UP = 'pick-up';

    const OTHER = 'other';
}