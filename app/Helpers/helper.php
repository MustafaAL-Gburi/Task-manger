<?php

namespace App\Helpers;

class helper
{
    public static function can($permission)
    {
        return true; // السماح بكل شيء
    }

    public static function cant($permission)
    {
        return false; // منع كل شيء
    }
}