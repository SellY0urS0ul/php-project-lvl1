<?php

namespace Brain\Games\Calc;

use const Brain\Engine\ROUND_COUNT;

use function Brain\Engine\game;

function playCalc(): void
{
    $exercise = 'What is the result of the expression?';
    $dataArr = [];
    for ($counter = 0; $counter < ROUND_COUNT; $counter++) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $mathArr = ['+' , '*', '-'];
        $randomMath = array_rand($mathArr);
        $question = "{$firstNumber} {$mathArr[$randomMath]} {$secondNumber}";
        $rightAnswer = rightAnswerForCalc($mathArr, $randomMath, $firstNumber, $secondNumber);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
}
function rightAnswerForCalc(array $mathArr, int $randomMath, int $firstNumber, int $secondNumber): string
{
    if ($mathArr[$randomMath] === '+') {
        $intAnswer = $firstNumber + $secondNumber;
        $rightAnswer = "{$intAnswer}";
    } elseif ($mathArr[$randomMath] === '*') {
        $intAnswer = $firstNumber * $secondNumber;
        $rightAnswer = "{$intAnswer}";
    } else {
        $intAnswer = $firstNumber - $secondNumber;
        $rightAnswer = "{$intAnswer}";
    }
    return $rightAnswer;
}
