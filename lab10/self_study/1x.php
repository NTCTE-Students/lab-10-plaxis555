<?php

class CustomException extends Exception {
    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

class ExceptionHandler {
    public static function handle(Throwable $exception) {
        print("Произошла ошибка: {$exception -> getMessage()}<br>");
        print("Файл: {$exception -> getFile()}<br>");
        print("Строка: {$exception -> getLine()}<br>");
    }
}


class ValidationException {
    public function validateMail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            print('Неверный формат email<br>');
        }
        print("Ваша почта: {$email}<br>");
    }
}

$someEmail = new ValidationException();
$someEmail -> validateMail('aboba@gmail.com');

try {
    throw new CustomException('Тестовое исключение');
} catch (Throwable $e) {
    ExceptionHandler::handle($e);
} finally {
    print('Выполнение завершено');
}