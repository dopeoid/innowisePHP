<?php
function camelCaseRefactor(string $input)
{
    $input = trim($input);
    $input = str_ireplace(array('-', '_'), " ", $input);
    $words = explode(" ", $input);
    var_dump($words);
    $input = "";
    foreach ($words as $word) {
        $input .= ucfirst($word);
    }
}
