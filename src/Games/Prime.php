<?php

namespace Brain\Games\Prime;

use function Brain\Engine\game;
use function Brain\Engine\prime;

function isPrime(): bool
{
    $count = 3;
    $exercise = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $dataArr = [];
    for ($counter = 0; $counter < $count; $counter++) {
        $num = rand(1, 100);
        $question = "{$num}";
        $rightAnswer = prime($num);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
    return true;
}
