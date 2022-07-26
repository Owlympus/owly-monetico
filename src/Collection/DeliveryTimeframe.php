<?php

namespace OwlyMonetico\Collection;

abstract class DeliveryTimeframe
{
    use _Tools;

    const SAME_DAY = 'same_day';

    const OVERNIGHT = 'overnight';

    const TWO_DAY = 'two_day';

    const THREE_DAY = 'three_day';

    const LONG = 'long';

    const OTHER = 'other';

    const NONE = 'none';
}