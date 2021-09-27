<?php

namespace Brain\Games\Nod;

use const Brain\Engine\ROUND_COUNT;

use function Brain\Engine\game;

function playGcd(): void
{
    $exercise = 'Find the greatest common divisor of given numbers.';
    $dataArr = [];
    for ($counter = 0; $counter < ROUND_COUNT; $counter++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $question = "{$firstNumber} {$secondNumber}";
        $rightAnswer = nodAlgoritm($firstNumber, $secondNumber);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
}
function nodAlgoritm(int $firstNumber, int $secondNumber): string
{
    while ($firstNumber != $secondNumber) {
        if ($firstNumber > $secondNumber) {
            $firstNumber =  $firstNumber - $secondNumber;
        } else {
            $secondNumber = $secondNumber - $firstNumber;
        }
    }
    return $rightAnswer = "{$secondNumber}";
}
