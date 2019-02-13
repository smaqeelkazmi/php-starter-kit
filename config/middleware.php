<?php
/**
 * List all your middleware with route name
 * Middleware can be a function or a class with method->boot()
 * @key route
 * @value middleware
 */


$middleware = [

    '*' => \Middleware\InitMiddleware::class,
    'admin/*' => \Middleware\AuthMiddleware::class,

];



