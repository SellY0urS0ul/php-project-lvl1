<?php

namespace Src\Even;

use function cli\line;
use function cli\prompt;

function isEvenNumber()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0, $j = 0; $i < 3 && $j === 0; $i++) {
        $randomNumber = rand(0, 100);
        line("Question: %s", $randomNumber);
        $answer = prompt('Your answer: ');
        if (($randomNumber % 2) == 0 && $answer === 'yes') {
            line('Correct!');
        } elseif (($randomNumber % 2) == 0 && $answer === 'no') {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            line("Let's try again, %s", $name);
            $j++;
        } elseif (($randomNumber % 2) != 0 && $answer === 'yes') {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, %s", $name);
            $j++;
        } elseif (($randomNumber % 2) != 0 && $answer === 'no') {
            line('Correct!');
        }
        if ($i == 2) {
            line("Congratulations, %s!", $name);
        }
    }
}
