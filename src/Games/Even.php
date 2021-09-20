<?php

namespace Src\Games\Even;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;
use function Src\Engine\isRightAnswer;
use function Src\Engine\question;
use function Src\Engine\congratulations;

function isEvenNumber(): bool
{
    $name = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0, $j = 0; $i < 3 && $j === 0; $i++) {
        $randomNumber = rand(1, 100);
        $question = "{$randomNumber}";
        $answer = question($question);
        if (($randomNumber % 2) == 0) {
            $rightAnswer = 'yes';
        } else {
            $rightAnswer = 'no';
        }
        $j = isRightAnswer($answer, $rightAnswer, $name, $j);
    }
    $j = congratulations($j, $name);
    return true;
}
