<?php
namespace App;


class Route
{

    protected
        $path,
        $routesPath;

    public
        $page404,
        $errorMessage;

    public function __construct()
    {

        $this->path = isset($_GET['path']) ? $_GET['path'] : null;
        $this->routesPath = 'routes';
        $this->page404 = "404.php";
        $this->errorMessage = "Nothing found";
    }



    public function boot()
    {
        if (!$this->path) {
            return $this->loadIndexRoute();
        } else {
            return $this->loadRoute();
        }
    }


    protected function loadIndexRoute()
    {
        $this->loadRouteFile($this->routesPath . '/index.php');

        return $this;
    }


    protected function loadRoute()
    {
        chdir(Boot::AppDir());

        $inCase1 = $this->routesPath . '/' . $this->path . '.php';
        $inCase2 = $this->routesPath . '/' .
            str_replace('/', '_', $this->path) .
            '.php';
        $inCase3 = $this->routesPath . '/' . $this->path . '/index.php';
        $ofError404 = View::path() . '/404.php';

        if (file_exists($inCase1)) {
            $this->loadRouteFile($inCase1);

        } elseif (file_exists($inCase2)) {
            $this->loadRouteFile($inCase2);

        } elseif (file_exists($inCase3)) {
            $this->loadRouteFile($inCase3);

        } elseif (file_exists($ofError404)) {
            $this->loadRouteFile($ofError404);

        } else {
            die($this->errorMessage);
        }

        return $this;
    }


    protected function loadRouteFile($filename)
    {
        require $filename;
    }



}