<?php

namespace OwlyMonetico\Collection;

use Exception;
use ReflectionClass;

abstract class Language
{
    use _Tools;

    /**
     * German
     */
    const DE='DE';

    /**
     * English
     */
    const EN='EN';

    /**
     * Spanish
     */
    const ES='ES';

    /**
     * French
     */
    const FR='FR';

    /**
     * Italian
     */
    const IT='IT';

    /**
     * Japan
     */
    const JA='JA';

    /**
     * Dutch
     */
    const NL='NL';

    /**
     * Portuguese
     */
    const PT='PT';

    /**
     * Swedish
     */
    const SV='SV';
}