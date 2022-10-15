<?php

require_once 'init.php';

if (empty($_REQUEST['controller']) || empty($_REQUEST['action'])) {
    $_REQUEST['controller'] = 'Home';
    $_REQUEST['action'] = 'index';
    $_SERVER['QUERY_STRING'] = 'controller=home&action=index';
}

$router = new Router($_REQUEST['controller'], $_REQUEST['action']);

$router->routeManager();
