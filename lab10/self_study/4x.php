<?php

class DatabaseConnectionException extends Exception {}

function connectToDatabase(string $host, string $username, string $password, string $database): void
{

    $simulateError = true; // Change to false for no error.

    if ($simulateError) {
        throw new DatabaseConnectionException("Не удалось подключиться к базе данных: " . $database . " на " . $host);
    }

    echo "Успешно подключено к базе данных: " . $database . PHP_EOL;

}

try {
    connectToDatabase("localhost", "user", "password", "mydatabase");
} catch (DatabaseConnectionException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage() . PHP_EOL;
}