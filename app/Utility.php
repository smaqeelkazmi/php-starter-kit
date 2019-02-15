<?php
namespace App;


class Utility
{

    public static function splitByUpperCase($str)
    {
        return preg_split('/(?=[A-Z])/',$str);
    }


    public static function dump(...$vars)
    {
        echo "<pre>";

        foreach ($vars as $var) {
            var_dump($var);
        }

        echo "</pre>";
        die();
    }


    public static function print(...$vars)
    {
        echo "<pre>";

        foreach ($vars as $var) {
            print_r($var);
        }

        echo "</pre>";
        die();
    }



    public static function uniqueMultidimArray($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

}