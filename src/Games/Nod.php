<?php

namespace Brain\Games\Nod;

use function Brain\Engine\playGame;

use const Brain\Engine\ROUNDS_COUNT;

function playGcd(): void
{
    $exercise = 'Find the greatest common divisor of given numbers.';
    $gameData = [];
    for ($counter = 0; $counter < ROUNDS_COUNT; $counter++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $question = "{$firstNumber} {$secondNumber}";
        $rightAnswer = gcdLogic($firstNumber, $secondNumber);
        array_push($gameData, [$question, "{$rightAnswer}"]);
    }
    playGame($gameData, $exercise);
}
function gcdLogic(int $firstNumber, int $secondNumber): int
{
    while ($firstNumber != $secondNumber) {
        if ($firstNumber > $secondNumber) {
            $firstNumber =  $firstNumber - $secondNumber;
        } else {
            $secondNumber = $secondNumber - $firstNumber;
        }
    }
    return $rightAnswer = $secondNumber;
}
