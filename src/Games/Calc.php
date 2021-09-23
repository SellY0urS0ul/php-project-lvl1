<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Brain\Engine\greeting;
use function Brain\Engine\isRightAnswer;
use function Brain\Engine\question;
use function Brain\Engine\congratulations;
use function Brain\Engine\game;

function calc(): bool
{
    $name = greeting();
    line('What is the result of the expression?');
    $stop = 0;
    $count = 3;
    $dataArr = [];
    for ($counter = 0; $counter < $count; $counter++) {
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
        array_push($dataArr, [$question, $rightAnswer]);
    }
    $stop = game($dataArr, $stop, $name);
    return true;
}
