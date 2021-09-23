<?php

namespace Brain\Games\Nod;

use function Brain\Engine\game;
use function Brain\Engine\nodAlgoritm;

function nod(): bool
{
    $count = 3;
    $exercise = 'Find the greatest common divisor of given numbers.';
    $dataArr = [];
    for ($counter = 0; $counter < $count; $counter++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $question = "{$firstNumber} {$secondNumber}";
        $rightAnswer = nodAlgoritm($firstNumber, $secondNumber);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
    return true;
}
