<?php
namespace App;


class Utility
{

    public static function splitByUpperCase($str)
    {
        return preg_split('/(?=[A-Z])/',$str);
    }

}