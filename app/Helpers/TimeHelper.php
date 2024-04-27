<?php

namespace App\Helpers;

class TimeHelper
{
    public static function getTimeOfDay()
    {
        $hour = date('H');
        if ($hour < 12) {
            return 'Morning';
        } elseif ($hour < 18) {
            return 'Afternoon';
        } else {
            return 'Evening';
        }
    }
}
