<?php

namespace Link\Server;

use Swoole\Http\Server as Server;

class ServerFactory
{
    public static function create(string $host,int $port): Server{
        return new Server($host, $port);
    }
}