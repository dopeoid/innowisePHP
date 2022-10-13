<?php
function testNumberValueIf(int $inputNumber)
{
    if ($inputNumber > 30) {
        return 'More than 30';
    } elseif ($inputNumber > 20) {
        return 'More than 20';
    } elseif ($inputNumber > 10) {
        return 'More than 10';
    }
    return 'Equal or less than 10';
}

function testNumberValueSwitch(int $inputNumber)
{
    switch ((int)(($inputNumber - 1) / 10)) {
        case 1:
            return 'More than 10';

        case 2:
            return 'More than 20';

        default:
            switch (($inputNumber - 11) / abs($inputNumber - 11)) {
                case -1:
                    return 'Equal or less than 10';

                case 1:
                    return 'More than 30';

            }
    }
}

function testNumberValueTrenary(int $inputNumber)
{
    return (($inputNumber > 30) ? ('More than 30') : (($inputNumber > 20) ? ('More than 20') : (($inputNumber > 10) ?
        'More than 10' : 'Equal or less than 10')));
}

?>
