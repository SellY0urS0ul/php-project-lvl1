<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

function greeting(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
function isRightAnswer($answer, $rightAnswer, $name, $j): int
{
    if ($answer == $rightAnswer) {
        line('Correct!');
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
        line("Let's try again, %s!", $name);
        $j++;
    }
    return $j;
}
function congratulations($j, $name)
{
    if ($j == 0) {
        line("Congratulations, %s!", $name);
    }
}
function question($question): string
{
    line("Question: %s", $question);
    $answer = prompt('Your answer');
    return $answer;
}
