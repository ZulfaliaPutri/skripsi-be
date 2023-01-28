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

    private static $regencyCodeStringInternalMapping = [
        0 => "Denpasar",
        1 => "Badung",
        2 => "Gianyar",
        3 => "Tabanan",
        4 => "Klungkung",
        5 => "Karangasem",
        6 => "Bangli",
        7 => "Buleleng",
        8 => "Jembrana"
    ];

    private static $regencyDistanceMatrix = [
        [0, 1, 1, 2, 2, 3, 3, 4, 4],
        [1, 0, 1, 1, 2, 3, 4, 2, 2],
        [1, 1, 0, 2, 1, 3, 1, 3, 4],
        [2, 1, 2, 0, 3, 4, 4, 2, 1],
        [2, 2, 2, 1, 0, 1, 1, 2, 4],
        [2, 3, 2, 3, 1, 0, 1, 2, 4],
        [2, 3, 1, 1, 1, 2, 0, 1, 2],
        [3, 3, 2, 2, 3, 2, 1, 0, 2],
        [4, 2, 4, 1, 4, 4, 2, 2, 0]
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

    public static function getRegencyDistanceByCode($fromRegencyCode, $toRegencyCode)
    {
        try {
            return self::$regencyDistanceMatrix[$fromRegencyCode][$toRegencyCode];
        } catch (Exception $e) {
            return 5;
        }
    }
}
