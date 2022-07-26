<?php

namespace OwlyMonetico\Collection;

class PriorAuthenticationMethod
{
    use _Tools;

    const FRICTIONLESS = 'frictionless';

    const CHALLENGE = 'challenge';

    const AVS_VERIFIED = 'AVS_verified';

    const OTHER = 'other';
}