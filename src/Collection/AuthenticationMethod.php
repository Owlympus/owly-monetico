<?php

namespace OwlyMonetico\Collection;

abstract class AuthenticationMethod
{
    use _Tools;

    const GUEST = 'guest';

    const OWN_CREDENTIALS = 'own_credentials';

    const FEDERATED_ID = 'federated_id';

    const ISSUER_CREDENTIALS = 'issuer_credentials';

    const THIRD_PARTY_AUTHENTICATION = 'third_party_authentication';

    const FIDO = 'fido';
}