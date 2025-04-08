<?php

function processData(string $data): void
{
    try {
        if (empty($data)) {
            throw new InvalidArgumentException("Данные не могут быть пустыми.");
        }

        if (strlen($data) > 100) {
            throw new LengthException("Длина данных превышает 100 символов.");
        }

        echo "Данные успешно обработаны: " . $data . PHP_EOL;

    } catch (InvalidArgumentException | LengthException $e) {  // PHP 8+
        echo "Ошибка обработки данных: " . $e->getMessage() . PHP_EOL;
    }
}

processData("");
processData(str_repeat("a", 150));
processData("Valid Data");