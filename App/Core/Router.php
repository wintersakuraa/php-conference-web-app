<?php

/*
 * Class for operating routes
 */

class Router
{
    private string $controller;
    private string $action;

    public function __construct($controller, $action)
    {
        $this->controller = $controller . 'Controller';
        $this->action = $action;
    }

    public function routeManager(): void
    {
        $controllerPath = 'App/Controllers/' . $this->controller . '.php';

        if (file_exists($controllerPath)) {
            require_once $controllerPath;

            $controller = new $this->controller();
            $action = $this->action;

            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                die('<h1>Error: No such Action: ' . $this->action . ' in ' . ucwords($this->controller) . '</h1>');
            }
        } else {
            die('<h1>Error: No such Controller: ' . ucwords($this->controller) . '</h1>');
        }
    }
}