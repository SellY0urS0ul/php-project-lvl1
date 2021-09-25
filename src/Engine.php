<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function game(array $dataArr, string $exercise): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("{$exercise}");
    $stop = 0;
    foreach ($dataArr as $value) {
        $question = $value[0];
        $rightAnswer = $value[1];
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        if ($answer === $rightAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            line("Let's try again, %s!", $name);
            $stop++;
            break;
        }
    }
    if ($stop === 0) {
        line("Congratulations, %s!", $name);
    }
    return;
}
define('COUNT', 3);
