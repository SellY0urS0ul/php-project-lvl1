<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Brain\Engine\greeting;
use function Brain\Engine\isRightAnswer;
use function Brain\Engine\question;
use function Brain\Engine\congratulations;

function isPrime(): bool
{
    $name = greeting();
    $stop = 0;
    $count = 3;
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($counter = 0; $counter < $count && $stop === 0; $counter++) {
        $num = rand(1, 100);
        $question = "{$num}";
        $rightAnswer = 'yes';
        for ($primeCounter = 2; $primeCounter <= sqrt($num); $primeCounter++) {
            if ($num % $primeCounter == 0) {
                $rightAnswer = 'no';
            }
        }
        $answer = question($question);
        $stop = isRightAnswer($answer, $rightAnswer, $name, $stop);
    }
    $stop = congratulations($stop, $name);
    return true;
}
