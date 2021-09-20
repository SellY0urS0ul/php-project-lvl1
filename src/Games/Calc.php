<?php

namespace Src\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;
use function Src\Engine\isRightAnswer;
use function Src\Engine\congratulations;
use function Src\Engine\question;

function calc()
{
    $name = greeting();
    line('What is the result of the expression?');
    for ($i = 0, $j = 0; $i < 3 && $j === 0; $i++) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $mathArr = [' + ' , ' * '];
        $randomMath = array_rand($mathArr);
        $question = "{$firstNumber}{$mathArr[$randomMath]}{$secondNumber}";
        if ($mathArr[$randomMath] === ' + ') {
            $intAnswer = $firstNumber + $secondNumber;
            $rightAnswer = "{$intAnswer}";
        } else {
            $intAnswer = $firstNumber * $secondNumber;
            $rightAnswer = "{$intAnswer}";
        }
        $answer = question($question);
        $j = isRightAnswer($answer, $rightAnswer, $name, $j);
    }
    $j = congratulations($j, $name);
}
