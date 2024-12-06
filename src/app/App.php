<?php

namespace Link\App;

use FastRoute\Dispatcher;
use Link\contract\AppInterface;
use Link\Server\ServerFactory;
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