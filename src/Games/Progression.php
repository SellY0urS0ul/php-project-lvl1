<?php

namespace Brain\Games\Progression;

use const Brain\Engine\ROUND_COUNT;

use function Brain\Engine\game;

function playProgression(): void
{
    $exercise = 'What number is missing in the progression?';
    $dataArr = [];
    for ($counter = 0; $counter < ROUND_COUNT; $counter++) {
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
}
function progressionGenerate(int $firstNum, int $step): array
{
    $progLength = 10;
    $progression = [];
    array_push($progression, $firstNum);
    $nextNum = $firstNum;
    for ($progCounter = 0; $progCounter < $progLength - 1; $progCounter++) {
        $nextNum += $step;
        array_push($progression, $nextNum);
    }
    return $progression;
}
