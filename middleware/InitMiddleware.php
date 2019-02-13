<?php
/**
 * Created by PhpStorm.
 * User: aqeel
 * Date: 2/13/19
 * Time: 11:41 AM
 */

namespace Middleware;


class InitMiddleware
{
    public function boot()
    {
        print_r('hello world'); exit;
    }
}