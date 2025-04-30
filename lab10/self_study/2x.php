<?php

class FileReadException extends Exception {}

function readFileContent(string $filename): string
{
    if (!file_exists($filename)) {
        throw new FileReadException("Файл не найден: " . $filename);
    }

    if (!is_readable($filename)) {
        throw new FileReadException("Нет прав на чтение файла: " . $filename);
    }

    $content = @file_get_contents($filename); // Suppress warnings

    if ($content === false) {
        throw new FileReadException("Ошибка при чтении файла: " . $filename);
    }

    return $content;
}

try {
    $content = readFileContent("nonexistent_file.txt");
    echo $content . PHP_EOL;
} catch (FileReadException $e) {
    echo "Ошибка чтения файла: " . $e->getMessage() . PHP_EOL;
}

try {
    $content = readFileContent(__FILE__); // Reads this file
    echo "Содержимое файла: " . substr($content, 0, 100) . "..." . PHP_EOL; // Print first 100 chars
} catch (FileReadException $e) {
    echo "Ошибка чтения файла: " . $e->getMessage() . PHP_EOL;
}