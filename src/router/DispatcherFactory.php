<?php

namespace Link\Router;

use FastRoute\DataGenerator\GroupCountBased as DataGenerator;
use FastRoute\Dispatcher\GroupCountBased;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;

class DispatcherFactory
{
    public array $routes = [BASE_PATH . '/config/routes.php'];
    protected ?RouteCollector $router = null;
    protected ?Dispatcher $dispatcher = null;

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        Route::init($this);
        foreach ($this->routes as $route) {
            if (file_exists($route)) {
                require $route;
            }
        }
    }

    public function getRouter(): RouteCollector
    {
        if($this->router) {
            return $this->router;
        }

        $parser = new Std();
        $generator = new DataGenerator();
        $this->router = new RouteCollector($parser, $generator);
        return $this->router;
    }

    public function getDispatcher(): Dispatcher
    {
        if (isset($this->dispatcher)) {
            return $this->dispatcher;
        }

        $router = $this->getRouter();
        return $this->dispatcher = new GroupCountBased($router->getData());
    }
}