<?php

//namespace App\Helpers;


if (!function_exists('mrc_calc_time')) {

    function mrc_calc_time($dataStart)
    {
        $dataStart = strtotime($dataStart);
        $dateEnd = strtotime(date('Y-m-d'));

        $datadiff = abs(($dateEnd) - ($dataStart));
        $years = floor($datadiff / (365*60*60*24));
        $months = floor(($datadiff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($datadiff - $years*365*60*60*24 - $months*30*60*60*24) / (60*60*24));

        return $years. " anos, ". $months. " meses " . "e ". $days. " dia(s)";
    }
}
