<?php
function addDigitsByAbsolute(int $number)
{
    $number=abs($number);
    $sum = 0;
    while ($number > 9) {
        while ($number != 0) {
            $sum += $number % 10;
            $number = (int)($number / 10);
        }
        $number = $sum;
        $sum = 0;
    }
    return $number;
}

echo addDigitsByAbsolute(-1412);
