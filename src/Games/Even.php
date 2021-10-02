<?php

namespace Brain\Games\Even;

use function Brain\Engine\playGame;

use const Brain\Engine\ROUNDS_COUNT;

function playEven(): void
{
    $exercise = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = [];
    for ($counter = 0; $counter < ROUNDS_COUNT; $counter++) {
        $randomNumber = rand(1, 100);
        $question = "{$randomNumber}";
        $rightAnswer = isEven($randomNumber) ? 'yes' : 'no';
        array_push($gameData, [$question, $rightAnswer]);
    }
    playGame($gameData, $exercise);
}
function isEven(int $randomNumber): bool
{
    return ($randomNumber % 2) === 0;
}
