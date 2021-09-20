<?php

namespace Src\Games\Progression;

use function cli\line;
use function cli\prompt;

function progression()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What number is missing in the progression?');
    for ($i = 0, $j = 0; $i < 3 && $j === 0; $i++) {
        $step = rand(1, 10);
        $firstNum = rand(0, 20);
        $missedNumId = rand(0, 9);
        $rightAnswer = 0;
        $progression = [];
        array_push($progression, $firstNum);
        $nextNum = $firstNum;
        for ($k = 0; $k < 9; $k++) {
            $nextNum += $step;
            array_push($progression, $nextNum);
        }
        $rightAnswer = $progression[$missedNumId];
        $progression[$missedNumId] = '..';
        $question = implode(' ', $progression);
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        if ($answer == $rightAnswer) {
            line('Correct!');
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was {$rightAnswer}.");
            line("Let's try again, %s", $name);
            $j++;
        }
        if ($i == 2) {
            line("Congratulations, %s!", $name);
        }
    }
}
