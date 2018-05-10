<?php
require ("../App/Autoloader.php");
App\Autoloader::register();

use App\Controllers\Router;
$router = new Router;
$router->routerRequest();
?>
