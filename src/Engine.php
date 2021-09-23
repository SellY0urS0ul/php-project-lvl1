<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function game(array $dataArr, string $exercise): bool
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("{$exercise}");
    $stop = 0;
    foreach ($dataArr as $value) {
        $question = $value[0];
        $rightAnswer = $value[1];
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        if ($answer === $rightAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            line("Let's try again, %s!", $name);
            $stop++;
            break;
        }
    }
    if ($stop === 0) {
        line("Congratulations, %s!", $name);
    }
    return true;
}
function rightAnswerForCalc(array $mathArr, int $randomMath, int $firstNumber, int $secondNumber): string
{
    if ($mathArr[$randomMath] === ' + ') {
        $intAnswer = $firstNumber + $secondNumber;
        $rightAnswer = "{$intAnswer}";
    } elseif ($mathArr[$randomMath] === ' * ') {
        $intAnswer = $firstNumber * $secondNumber;
        $rightAnswer = "{$intAnswer}";
    } else {
        $intAnswer = $firstNumber - $secondNumber;
        $rightAnswer = "{$intAnswer}";
    }
    return $rightAnswer;
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
function nodAlgoritm(int $firstNumber, int $secondNumber): string
{
    while ($firstNumber != $secondNumber) {
        if ($firstNumber > $secondNumber) {
            $firstNumber =  $firstNumber - $secondNumber;
        } else {
            $secondNumber = $secondNumber - $firstNumber;
        }
    }
    return $rightAnswer = "{$secondNumber}";
}
function progressionGenerate(int $firstNum, int $step): array
{
    $progLength = 10;
    $progression = [];
    array_push($progression, $firstNum);
    $nextNum = $firstNum;
    for ($progCounter = 0; $progCounter < $progLength - 1; $progCounter++) {
        $nextNum += $step;
        array_push($progression, $nextNum);
    }
    return $progression;
}
function rightAnswerForEven(int $randomNumber): string
{
    if (($randomNumber % 2) == 0) {
        $rightAnswer = 'yes';
    } else {
        $rightAnswer = 'no';
    }
    return $rightAnswer;
}
