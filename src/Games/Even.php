<?php

namespace Brain\Games\Even;

use const Brain\Engine\ROUND_COUNT;

use function Brain\Engine\game;

function playEven(): void
{
    $exercise = 'Answer "yes" if the number is even, otherwise answer "no".';
    $dataArr = [];
    for ($counter = 0; $counter < ROUND_COUNT; $counter++) {
        $randomNumber = rand(1, 100);
        $question = "{$randomNumber}";
        $rightAnswer = rightAnswerForEven($randomNumber);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
}
function rightAnswerForEven(int $randomNumber): string
{
    if (($randomNumber % 2) == 0) {
        $rightAnswer = 'yes';
    } else {
        $rightAnswer = 'no';
    }
    return $rightAnswer;
}
