<?php

namespace Brain\Games\Progression;

use function Brain\Engine\progressionGenerate;
use function Brain\Engine\game;

function progression(): bool
{
    $count = 3;
    $exercise = 'What number is missing in the progression?';
    $dataArr = [];
    for ($counter = 0; $counter < $count; $counter++) {
        $step = rand(1, 10);
        $firstNum = rand(0, 20);
        $missedNumId = rand(0, 9);
        $progression = progressionGenerate($firstNum, $step);
        $rightAnswer = "{$progression[$missedNumId]}";
        $progression[$missedNumId] = '..';
        $question = implode(' ', $progression);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
    return true;
}
