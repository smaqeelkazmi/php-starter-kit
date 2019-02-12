<?php
require 'vendor/autoload.php';

$activeDir = getcwd();

// Change directory to current file location
chdir(__DIR__);

use App\Route;
use App\View;
use App\Boot;



/*
 * - Set Environment variables
 * */
Boot::setEnvVars(getcwd() . '/env.php');







/*
 * - Setup Database Connection
 * */
$pdo = new \PDO(
    "mysql:host=localhost;dbname=".getenv('DB_NAME').";charset=utf8mb4",
    getenv('DB_USER'),
    getenv('DB_PASS')
);

if (getenv('DEV_MOD')) {
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
}







/*
 * - Init View Instance
 * */
$view = new View();







/*
 * - Set Globals
 * */
Boot::setGlobals([
    'view' => $view,
    'pdo' => $pdo
]);






/*
 * - Init the Route
 * - After route boot() the process will move to route file
 * */
$route = new Route();
$route->boot();








// Change directory to active public file
chdir($activeDir);