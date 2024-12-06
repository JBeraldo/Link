<?php

namespace Link\App;

use Link\Router\DispatcherFactory;
use Link\Server\ServerFactory;

class AppFactory
{
    public static function create(string $host, int $port,array $options = []): App{
        $dispatcher = (new DispatcherFactory())->getDispatcher();
        $server = ServerFactory::create($host,$port);

        $server->set($options);

        return new App($dispatcher,$server);
    }
}