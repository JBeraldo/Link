<?php

namespace Link\Router;

/**
 * @method static get(string $string, \Closure $param)
 */
/**
 * @method static post(string $string, \Closure $param)
 */
/**
 * @method static delete(string $string, \Closure $param)
 */
/**
 * @method static put(string $string, \Closure $param)
 */
class Route
{
    protected static ?DispatcherFactory $factory = null;

    public static function __callStatic($name, $arguments)
    {
        $router = static::$factory->getRouter();
        return $router->{$name}(...$arguments);
    }

    public static function init(DispatcherFactory $factory): void
    {
        static::$factory = $factory;
    }
}