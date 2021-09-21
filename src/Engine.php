<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function greeting(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
function isRightAnswer(string $answer, string $rightAnswer, string $name, int $stop): int
{
    if ($answer == $rightAnswer) {
        line('Correct!');
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
        line("Let's try again, %s!", $name);
        $stop++;
    }
    return $stop;
}
function congratulations(int $stop, string $name): bool
{
    if ($stop == 0) {
        line("Congratulations, %s!", $name);
    }
    return true;
}
function question(string $question): string
{
    line("Question: %s", $question);
    $answer = prompt('Your answer');
    return $answer;
}
