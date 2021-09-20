<?php

namespace Src\Games\Nod;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;
use function Src\Engine\isRightAnswer;
use function Src\Engine\congratulations;
use function Src\Engine\question;

function nod()
{
    $name = greeting();
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
        $answer = question($question);
        $j = isRightAnswer($answer, $rightAnswer, $name, $j);
    }
    $j = congratulations($j, $name);
}
