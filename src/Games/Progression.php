<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Engine\greeting;
use function Brain\Engine\isRightAnswer;
use function Brain\Engine\question;
use function Brain\Engine\congratulations;

function progression(): bool
{
    $name = greeting();
    $stop = 0;
    $count = 3;
    $progLength = 10;
    line('What number is missing in the progression?');
    for ($counter = 0; $counter < $count && $stop === 0; $counter++) {
        $step = rand(1, 10);
        $firstNum = rand(0, 20);
        $missedNumId = rand(0, 9);
        $progression = [];
        array_push($progression, $firstNum);
        $nextNum = $firstNum;
        for ($progCounter = 0; $progCounter < $progLength - 1; $progCounter++) {
            $nextNum += $step;
            array_push($progression, $nextNum);
        }
        $rightAnswer = "{$progression[$missedNumId]}";
        $progression[$missedNumId] = '..';
        $question = implode(' ', $progression);
        $answer = question($question);
        $stop = isRightAnswer($answer, $rightAnswer, $name, $stop);
    }
    $stop = congratulations($stop, $name);
    return true;
}
