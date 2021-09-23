<?php

namespace Brain\Games\Even;

use function Brain\Engine\rightAnswerForEven;
use function Brain\Engine\game;

function isEvenNumber(): bool
{
    $count = 3;
    $exercise = 'Answer "yes" if the number is even, otherwise answer "no".';
    $dataArr = [];
    for ($counter = 0; $counter < $count; $counter++) {
        $randomNumber = rand(1, 100);
        $question = "{$randomNumber}";
        $rightAnswer = rightAnswerForEven($randomNumber);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
    return true;
}
