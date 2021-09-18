<?php

namespace Src\Games\Calc;

use function cli\line;
use function cli\prompt;

function calc()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');
    for ($i = 0, $j = 0; $i < 3 && $j === 0; $i++) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand (1, 10);
        $mathArr = [' + ' , ' * '];
        $randomMath = array_rand($mathArr);
        $question = "{$firstNumber}{$mathArr[$randomMath]}{$secondNumber}";
        if ($mathArr[$randomMath] === ' + ') {
            $rightAnswer = $firstNumber + $secondNumber;
        } else {
            $rightAnswer = $firstNumber * $secondNumber;
        }
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
