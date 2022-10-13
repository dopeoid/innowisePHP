<?php
function recursionPrint(int $a, int $b)
{
    if ($a == $b) {
        echo $a;
        return;
    }
    if ($a > $b) {
        echo $a, ', ';
        recursionPrint($a - 1, $b);
    } else {
        echo $b, ', ';
        recursionPrint($a, $b - 1);
    }
}



