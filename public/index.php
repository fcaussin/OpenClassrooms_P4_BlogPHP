<?php
require ("../App/Autoloader.php");
App\Autoloader::register();

use App\Controllers\Router;
session_start();

$router = new Router;
$router->routerRequest();
?>
