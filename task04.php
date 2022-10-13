<?php
function deleteElementByKey(array $arr, int $position)
{
    unset($arr[$position]);
    array_splice($arr, $position, count($arr) - $position+1,array_slice($arr, $position));
}



