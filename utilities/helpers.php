<?php

function view($view, $data = [])
{
    \App\View::show($view, $data);
}



function view_share($var, $value = null)
{
    \App\View::setGlobals($var, $value);
}



function view_var($varname, $default = null)
{
    \App\View::getGlobal($varname, $default);
}





function redirect_to($url)
{
    if (!$url) {
        throw new Exception('No URL provided for redirection');
    }

    die(
    header('location:'.
        getenv('SITE_URL') . '/' .
        getenv('PUBLIC_PATH') . '/' .
        trim($url, '/')
    )
    );
}
