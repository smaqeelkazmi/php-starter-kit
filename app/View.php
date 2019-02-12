<?php

namespace App;

class View {

    public function __construct()
    {

    }


    public function load($view, $data = [])
    {
        View::show($view. $data);
    }


    public static function show($view, $data = [])
    {
        $viewFilePath = str_replace('.', '/', $view);
        $viewFile = __DIR__ . '/../views/'. $viewFilePath .'.php';

        if (!file_exists($viewFile)) {
            throw new \Exception("Unable to load view file ". $viewFile);
        }

        // Start
        ob_start();

        if (!empty($data))
            extract($data);

        include $viewFile;

        ob_end_flush();
        // End
    }


    public static function path()
    {
        return Boot::AppDir() . '/views';
    }

}