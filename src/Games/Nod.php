<?php

namespace Src\Games\Nod;

use function cli\line;
use function cli\prompt;

function nod()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0, $j = 0; $i < 3 && $j === 0; $i++) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $question = "{$firstNumber} {$secondNumber}";
        while ($firstNumber != $secondNumber) {
            if ($firstNumber > $secondNumber) {
                $firstNumber =  $firstNumber - $secondNumber;
            } else {
                $secondNumber = $secondNumber - $firstNumber;
            }
        }
        $rightAnswer = $secondNumber;
        line("Question: %s", $question);
        $answer = prompt('Your answer: ');
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
