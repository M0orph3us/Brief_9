<?php

namespace App\Services;

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
