<?php

namespace Brain\Games\Calc;

use function Brain\Engine\playGame;

use const Brain\Engine\ROUNDS_COUNT;

function playCalc(): void
{
    $exercise = 'What is the result of the expression?';
    $gameData = [];
    for ($counter = 0; $counter < ROUNDS_COUNT; $counter++) {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $operators = ['+' , '*', '-'];
        $randomOperator = array_rand($operators);
        $randomOperatorStr = $operators[$randomOperator];
        $question = "{$firstNumber} {$operators[$randomOperator]} {$secondNumber}";
        $rightAnswer = rightAnswerForCalc($randomOperatorStr, $firstNumber, $secondNumber);
        array_push($gameData, [$question, "{$rightAnswer}"]);
    }
    playGame($gameData, $exercise);
}
function rightAnswerForCalc(string $randomOperatorStr, int $firstNumber, int $secondNumber): int
{
    switch ($randomOperatorStr) {
        case '+':
            $rightAnswer = $firstNumber + $secondNumber;
            break;
        case '*':
            $rightAnswer = $firstNumber * $secondNumber;
            break;
        case '-':
            $rightAnswer = $firstNumber - $secondNumber;
            break;
        default:
            throw new \Exception('Другой математический знак.');
    }
    return $rightAnswer;
}
