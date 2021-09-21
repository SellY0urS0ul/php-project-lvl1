<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Engine\greeting;
use function Brain\Engine\isRightAnswer;
use function Brain\Engine\question;
use function Brain\Engine\congratulations;

function isEvenNumber(): bool
{
    $name = greeting();
    $stop = 0;
    $count = 3;
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($counter = 0; $counter < $count && $stop === 0; $counter++) {
        $randomNumber = rand(1, 100);
        $question = "{$randomNumber}";
        $answer = question($question);
        if (($randomNumber % 2) == 0) {
            $rightAnswer = 'yes';
        } else {
            $rightAnswer = 'no';
        }
        $stop = isRightAnswer($answer, $rightAnswer, $name, $stop);
    }
    $stop = congratulations($stop, $name);
    return true;
}
