<?php

namespace Link\App;

use Link\Server\ServerFactory;

class AppFactory
{
    public static function create(string $host, int $port,array $options = []): App{
        $server = ServerFactory::create($host,$port);

        $server->set($options);

        return new App($server);
    }
}