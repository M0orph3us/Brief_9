<?php

namespace App\Services;

function verifCodeFine($code)
{
    if (strlen($code) != 14) {
        return false;
    }

    if (!ctype_alpha(substr($code, 0, 1)) || !ctype_alpha(substr($code, 1, 1)) || substr($code, 0, 1) >= substr($code, 1, 1)) {
        return false;
    }

    $currentYear = date("Y");
    if (substr($code, 2, 4) != $currentYear) {
        return false;
    }

    $number = explode("_", substr($code, 7));
    if (count($number) != 2 || ($number[0] + $number[1] != 100)) {
        return false;
    }

    return true;
}
