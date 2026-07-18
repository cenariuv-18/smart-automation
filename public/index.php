<?php

declare(strict_types=1);

use SmartAutomation\Controllers\HomeController;
use SmartAutomation\Core\Application;
use SmartAutomation\Core\Request;
use SmartAutomation\Core\Router;

require dirname(__DIR__) . '/vendor/autoload.php';

date_default_timezone_set('Europe/Bucharest');

$router = new Router();
$homeController = new HomeController();
$router->get('/', [$homeController, 'index'](...));

(new Application($router))->run(Request::capture());
