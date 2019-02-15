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
        exit('No URL provided for redirection');
    }

    header('location:'.
        getenv('SITE_URL') . '/' .
        trim($url, '/')
    );

    exit();
}
