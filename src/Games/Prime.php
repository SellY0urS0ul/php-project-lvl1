<?php

namespace Brain\Games\Prime;

use function Brain\Engine\playGame;

use const Brain\Engine\ROUNDS_COUNT;

function playPrime(): void
{
    $exercise = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    for ($counter = 0; $counter < ROUNDS_COUNT; $counter++) {
        $num = rand(1, 100);
        $question = "{$num}";
        $rightAnswer = isPrime($num) ? 'yes' : 'no';
        array_push($gameData, [$question, $rightAnswer]);
    }
    playGame($gameData, $exercise);
}
function isPrime(int $num): bool
{
    $counter = 0;
    for ($primeCounter = 2; $primeCounter <= sqrt($num); $primeCounter++) {
        if ($num % $primeCounter == 0) {
            $counter = 1;
        }
    }
    return ($counter === 0);
}
