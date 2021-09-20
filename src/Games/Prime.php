<?php

namespace Src\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;
use function Src\Engine\isRightAnswer;
use function Src\Engine\congratulations;
use function Src\Engine\question;

function isPrime(): bool
{
    $name = greeting();
    $j = 0;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < 3 && $j === 0; $i++) {
        $num = rand(1, 100);
        $question = "{$num}";
        $rightAnswer = 'yes';
        for ($k = 2; $k <= sqrt($num); $k++) {
            if ($num % $k == 0) {
                $rightAnswer = 'no';
            }
        }
        $answer = question($question);
        $j = isRightAnswer($answer, $rightAnswer, $name, $j);
    }
    $j = congratulations($j, $name);
    return true;
}
