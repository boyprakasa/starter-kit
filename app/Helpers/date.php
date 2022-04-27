<?php

use Carbon\Carbon;

function fullDateTime($date)
{
    return Carbon::parse($date)->translatedFormat('d F Y H:i:s');
}

function fullDate($date)
{
    return Carbon::parse($date)->translatedFormat('d F Y');
}

function formatMonth($date)
{
    return Carbon::parse($date)->translatedFormat('F');
}

function formatMonthName($month)
{
    $months = explode(' ', "Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
    return $months[$month - 1];
}
