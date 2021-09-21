<?php

namespace Brain\Games\Nod;

use function cli\line;
use function cli\prompt;
use function Brain\Engine\greeting;
use function Brain\Engine\isRightAnswer;
use function Brain\Engine\question;
use function Brain\Engine\congratulations;

function nod(): bool
{
    $name = greeting();
    $stop = 0;
    $count = 3;
    line('Find the greatest common divisor of given numbers.');
    for ($counter = 0; $counter < $count && $stop === 0; $counter++) {
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
        $rightAnswer = "{$secondNumber}";
        $answer = question($question);
        $stop = isRightAnswer($answer, $rightAnswer, $name, $stop);
    }
    $stop = congratulations($stop, $name);
    return true;
}
