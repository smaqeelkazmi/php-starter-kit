<?php

namespace App;


class Boot
{

    protected static $globals = [];


    public static function AppDir()
    {
        chdir(__DIR__ . '/../');

        return getcwd();
    }


    public static function getGlobals()
    {
        return (object)self::$globals;
    }


    public static function getGlobal($name)
    {
        if (!isset(self::$globals[$name]))
            return null;

        return self::$globals[$name];
    }


    public static function setGlobals($arr)
    {
        if (!is_array($arr)) {
            return false;
        }

        foreach ($arr as $key => $val) {
            self::$globals[$key] = $val;
        }

        return true;
    }


    public static function setEnvVars($filePath)
    {
        if (file_exists($filePath)) {
            require $filePath;

            foreach ($vars as $key => $var) {
                putenv("$key=$var");
            }
        }

        return true;
    }


}