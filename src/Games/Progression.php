<?php

namespace Brain\Games\Progression;

use function Brain\Engine\playGame;

use const Brain\Engine\ROUNDS_COUNT;

function playProgression(): void
{
    $exercise = 'What number is missing in the progression?';
    $gameData = [];
    $progLength = 10;
    for ($counter = 0; $counter < ROUNDS_COUNT; $counter++) {
        $step = rand(1, 10);
        $firstNum = rand(0, 20);
        $missedNumId = rand(0, $progLength - 1);
        $progression = progressionGenerate($firstNum, $step, $progLength);
        $rightAnswer = "{$progression[$missedNumId]}";
        $progression[$missedNumId] = '..';
        $question = implode(' ', $progression);
        array_push($gameData, [$question, $rightAnswer]);
    }
    playGame($gameData, $exercise);
}
function progressionGenerate(int $firstNum, int $step, int $progLength): array
{
    $progression = [];
    $nextNum = $firstNum;
    for ($progCounter = 0; $progCounter < $progLength; $progCounter++) {
        array_push($progression, $nextNum);
        $nextNum += $step;
    }
    return $progression;
}
