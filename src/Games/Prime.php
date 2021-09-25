<?php

namespace Brain\Games\Prime;

use Brain\Engine;

use function Brain\Engine\game;

function playPrime(): void
{
    $exercise = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $dataArr = [];
    for ($counter = 0; $counter < COUNT; $counter++) {
        $num = rand(1, 100);
        $question = "{$num}";
        $rightAnswer = prime($num);
        array_push($dataArr, [$question, $rightAnswer]);
    }
    game($dataArr, $exercise);
    return;
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
