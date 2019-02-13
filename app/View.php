<?php

namespace App;

class View {

    public static $globals = [];

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

        if (!empty(self::$globals))
            extract(self::$globals);

        include $viewFile;

        ob_end_flush();
        // End
    }


    public static function path()
    {
        return Boot::AppDir() . '/views';
    }



    public static function setGlobals($var, $value = null)
    {
        if (is_array($var) && !empty($var)) {
            foreach ($var as $item => $value) {
                self::$globals[$item] = $value;
            }
        } elseif (!empty($var)) {
            self::$globals[$var] = $value;
        }
    }




    public static function getGlobal($varname, $default = null)
    {
        if (
            isset(self::$globals[$varname]) &&
            self::$globals[$varname] !== false
        ) {
            return self::$globals[$varname];
        } else {
            return $default;
        }
    }

}