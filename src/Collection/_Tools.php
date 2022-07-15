<?php

namespace OwlyMonetico\Collection;

use Exception;
use ReflectionClass;

trait _Tools
{
    /**
     * @throws Exception
     */
    public static function get($lang)
    {
        $self = new ReflectionClass(self::class);
        $res = $self->getConstant($lang);
        if(empty($res))
            throw new Exception("Language::$lang does not exist.");

        return $res;
    }

    public static function all(): array
    {
        $self = new ReflectionClass(self::class);
        return $self->getConstants();
    }
}