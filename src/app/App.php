<?php

namespace Link\App;

use Swoole\Http\Server;

class App
{
    public function __construct(
    //    private Dispatcher $dispatcher,
        private readonly Server $server,
    )
    {
    }
    public function run(): void{
        $this->server->on('request',[$this, 'onRequest']);

        $this->server->start();
    }

    public function onRequest($request,$response): void
    {
        $response->end('pong');
    }
}