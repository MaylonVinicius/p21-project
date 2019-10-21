<?php

namespace sys;

class Entry{

    public function __construct()
    {
        $router = new Router();

        $router->get('/', function () {
            return \controller\HomeController::index();
        });

        $router->run();
    }

}