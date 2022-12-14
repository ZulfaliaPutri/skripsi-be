<?php

namespace App\Helpers;

class Helpers
{
    public static function getRatings($ratings)
    {
        if ($ratings == null) {
            return null;
        }
        $total = 0;
        foreach ($ratings as $rating) {
            $total += $rating->rating;
        }

        return ceil($total / count($ratings));
    }
}
