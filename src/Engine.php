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
function isRightAnswer(string $answer, string $rightAnswer, string $name, int $j): int
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
function congratulations(int $j, string $name)
{
    if ($j == 0) {
        line("Congratulations, %s!", $name);
    }
    return null;
}
function question(string $question): string
{
    line("Question: %s", $question);
    $answer = prompt('Your answer');
    return $answer;
}
