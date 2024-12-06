<?php

namespace Link\Support;
use Closure;
class Env
{
    public static function get($key, $default = null)
    {
        $value = getenv($key);
        if ($value === false) {
            return self::value($default);
        }
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return null;
        }
        if (($valueLength = strlen($value)) > 1 && $value[0] === '"' && $value[$valueLength - 1] === '"') {
            return substr($value, 1, -1);
        }
        return $value;
    }
    private static function value(mixed $value, ...$args)
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }

}

