<?php

namespace OwlyMonetico\Collection;


abstract class ThreeDSecureChallenge
{
    use _Tools;

    const NO_PREFERENCE = 'no_preference';

    const CHALLENGE_PREFERRED = 'challenge_preferred';

    const CHALLENGE_MANDATED = 'challenge_mandated';

    const NO_CHALLENGE_REQUESTED = 'no_challenge_requested';

    const NO_CHALLENGE_REQUESTED_STRONG_AUTHENTICATION = 'no_challenge_requested_strong_authentication';

    const NO_CHALLENGE_REQUESTED_TRUSTED_THIRD_PARTY = 'no_challenge_requested_trusted_third_party';

    const NO_CHALLENGE_REQUESTED_RISK_ANALYSIS = 'no_challenge_requested_risk_analysis';
}