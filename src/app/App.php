<?php

namespace Link\App;

use FastRoute\Dispatcher;
use Link\Http\Request;
use Swoole\Http\Server;

class App
{
    public function __construct(
        private Dispatcher $dispatcher,
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
        $method = $server['request_method'] ?? 'GET';;

        $return = $this->dispatcher->dispatch($method, '/banana');

        $response->end(print_r($return, true));
    }
}