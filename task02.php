<?php
function daysLeftUntilBurthday(string $date)
{
    $parsedDate = explode('/', $date);
    $todaysDate = time();
    $birthdayDate = mktime(0, 0, 0, $parsedDate[1], $parsedDate[0], date('Y'));
    if ($birthdayDate < $todaysDate) {
        $birthdayDate = mktime(0, 0, 0, $birthdayDate[1], $birthdayDate[0], date('Y') + 1);
    }
    return (int)(($birthdayDate - $todaysDate) / 86400);
}
?>