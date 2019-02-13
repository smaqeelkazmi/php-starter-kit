<?php
/**
 * Created by PhpStorm.
 * User: aqeel
 * Date: 2/13/19
 * Time: 12:45 PM
 */

namespace Middleware;


use App\Utility;

class AuthMiddleware
{

    public function boot()
    {
        $err = <<<EOB
        You're trying to access the route 
        which is protected by AuthMiddleware middleware <br>
        To remove this restriction of middleware 
        go to config/middleware.php file and update
        the \$middleware list or <br>
        come to middleware/AuthMiddleware.php file and update me(boot function)
EOB;
        Utility::print($err);
    }

}