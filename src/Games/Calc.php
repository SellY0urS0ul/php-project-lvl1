<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Engine\greeting;
use function Brain\Engine\isRightAnswer;
use function Brain\Engine\question;
use function Brain\Engine\congratulations;

function calc(): bool
{
    $name = greeting();
    line('What is the result of the expression?');
    $stop = 0;
    $count = 3;
    for ($counter = 0; $counter < $count && $stop === 0; $counter++) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $mathArr = [' + ' , ' * ', ' - '];
        $randomMath = array_rand($mathArr);
        $question = "{$firstNumber}{$mathArr[$randomMath]}{$secondNumber}";
        if ($mathArr[$randomMath] === ' + ') {
            $intAnswer = $firstNumber + $secondNumber;
            $rightAnswer = "{$intAnswer}";
        } elseif ($mathArr[$randomMath] === ' * ') {
            $intAnswer = $firstNumber * $secondNumber;
            $rightAnswer = "{$intAnswer}";
        } else {
            $intAnswer = $firstNumber - $secondNumber;
            $rightAnswer = "{$intAnswer}";
        }
        $answer = question($question);
        $stop = isRightAnswer($answer, $rightAnswer, $name, $stop);
    }
    $stop = congratulations($stop, $name);
    return true;
}
