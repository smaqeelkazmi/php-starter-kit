<?php
require 'vendor/autoload.php';

$activeDir = getcwd();

// Change directory to current file location
chdir(__DIR__);

use App\Route;
use App\View;
use App\Boot;





/*
 * Init Session
 * */
Boot::initSession();






/*
 * - Set Environment variables
 * */
Boot::setEnvVars(getcwd() . '/config/env.php');







/*
 * - Setup Database Connection
 * */
try {
    $pdo = new \PDO(
        "mysql:host=localhost;dbname=".getenv('DB_NAME').";charset=utf8mb4",
        getenv('DB_USER'),
        getenv('DB_PASS')
    );

    if (getenv('DEV_MOD')) {
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    }
} catch (Exception $exception) {
    if (getenv('DEV_MOD')) {
        die($exception->getMessage());
    }
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
    'pdo' => isset($pdo) ? $pdo : null
]);






/*
 * - Init the Route
 * - After route boot() the process will move to route file
 * */
$route = new Route();
$route->boot();








// Change directory to active public file
chdir($activeDir);