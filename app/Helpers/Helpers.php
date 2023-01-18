<?php

namespace App\Helpers;

use Exception;

class Helpers
{
    private static $regencyCodeStringMapping = [
        1 => "Denpasar",
        2 => "Badung",
        3 => "Gianyar",
        4 => "Tabanan",
        5 => "Klungkung",
        6 => "Karangasem",
        7 => "Bangli",
        8 => "Buleleng",
        9 => "Jembrana"
    ];

    public static function getRatings($ratings)
    {
        if ($ratings == null || count($ratings) == 0) {
            return null;
        }
        $total = 0;
        foreach ($ratings as $rating) {
            $total += $rating->rating;
        }

        return ceil($total / count($ratings));
    }

    public static function getRegencyString($regencyCode)
    {
        try {
            return self::$regencyCodeStringMapping[$regencyCode];
        } catch (Exception $e) {
            return "";
        }
    }
}
