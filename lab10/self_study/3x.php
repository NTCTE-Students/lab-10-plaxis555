<?php

function divide(float $numerator, float $denominator): float
{
    if ($denominator == 0) {
        throw new DivisionByZeroError("Деление на ноль недопустимо.");
    }

    return $numerator / $denominator;
}

try {
    $result = divide(10, 0);
    echo "Результат: " . $result . PHP_EOL;
} catch (DivisionByZeroError $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
}

try {
    $result = divide(10, 2);
    echo "Результат: " . $result . PHP_EOL;
} catch (DivisionByZeroError $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
}