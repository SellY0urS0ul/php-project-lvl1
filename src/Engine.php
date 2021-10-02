<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function playGame(array $gameData, string $exercise): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("{$exercise}");
    foreach ($gameData as $value) {
        $question = $value[0];
        $rightAnswer = $value[1];
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        if ($answer === $rightAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
