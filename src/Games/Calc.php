<?php

namespace Brain\Games\Calc;

use function Brain\Engine\game;
use function Brain\Engine\rightAnswerForCalc;

function calc(): bool
{
    $count = 3;
    $exercise = 'What is the result of the expression?';
    $dataArr = [];
    for ($counter = 0; $counter < $count; $counter++) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $mathArr = [' + ' , ' * ', ' - '];
        $randomMath = array_rand($mathArr);
        $question = "{$firstNumber}{$mathArr[$randomMath]}{$secondNumber}";
        $rightAnswer = rightAnswerForCalc($mathArr, $randomMath, $firstNumber, $secondNumber);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
    return true;
}
