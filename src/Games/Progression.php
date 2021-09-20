<?php

namespace Src\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;
use function Src\Engine\isRightAnswer;
use function Src\Engine\congratulations;
use function Src\Engine\question;

function progression(): bool
{
    $name = greeting();
    line('What number is missing in the progression?');
    for ($i = 0, $j = 0; $i < 3 && $j === 0; $i++) {
        $step = rand(1, 10);
        $firstNum = rand(0, 20);
        $missedNumId = rand(0, 9);
        $progression = [];
        array_push($progression, $firstNum);
        $nextNum = $firstNum;
        for ($k = 0; $k < 9; $k++) {
            $nextNum += $step;
            array_push($progression, $nextNum);
        }
        $rightAnswer = "{$progression[$missedNumId]}";
        $progression[$missedNumId] = '..';
        $question = implode(' ', $progression);
        $answer = question($question);
        $j = isRightAnswer($answer, $rightAnswer, $name, $j);
    }
    $end = congratulations($j, $name);
    return true;
}
