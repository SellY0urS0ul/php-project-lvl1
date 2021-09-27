<?php

namespace Brain\Games\Prime;

use const Brain\Engine\ROUND_COUNT;

use function Brain\Engine\game;

function playPrime(): void
{
    $exercise = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $dataArr = [];
    for ($counter = 0; $counter < ROUND_COUNT; $counter++) {
        $num = rand(1, 100);
        $question = "{$num}";
        $rightAnswer = prime($num);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
}
function prime(int $num): string
{
    $rightAnswer = 'yes';
    for ($primeCounter = 2; $primeCounter <= sqrt($num); $primeCounter++) {
        if ($num % $primeCounter == 0) {
            $rightAnswer = 'no';
        }
    }
    return $rightAnswer;
}
