<?php

namespace App\Services;

trait VerifCodeFine
{
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

        return count($number) != 2 || ($number[0] + $number[1] != 100) ? false : true;
    }

    function createCodeFine()
    {
        $firstLetter = chr(rand(65, 90));
        $secondLetter = chr(rand(65, 90));

        while ($firstLetter >= $secondLetter) {
            $firstLetter = chr(rand(65, 90));
            $secondLetter = chr(rand(65, 90));
        }

        $currentYear = date("Y");

        $chiffre1 = rand(1, 99);
        $chiffre2 = 100 - $chiffre1;

        $code = $firstLetter . $secondLetter . $currentYear . "_" . $chiffre1 . "_" . $chiffre2;

        return $code;
    }
}
