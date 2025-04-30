<?php

class RegistrationException extends Exception {}
class ShortPasswordException extends RegistrationException {}
class InvalidEmailFormatException extends RegistrationException {}
class EmptyFieldException extends RegistrationException {}


function validateRegistrationForm(string $email, string $password, string $name): void
{
    if (empty($name)) {
        throw new EmptyFieldException("Имя обязательно для заполнения.");
    }

    if (empty($email)) {
        throw new EmptyFieldException("Email обязателен для заполнения.");
    }

    if (empty($password)) {
        throw new EmptyFieldException("Пароль обязателен для заполнения.");
    }

    if (strlen($password) < 8) {
        throw new ShortPasswordException("Пароль должен содержать не менее 8 символов.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidEmailFormatException("Неверный формат email-адреса.");
    }

    echo "Форма регистрации успешно заполнена и прошла валидацию." . PHP_EOL;
}

try {
    validateRegistrationForm("invalid-email", "123", "");
} catch (ShortPasswordException $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
} catch (InvalidEmailFormatException $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
} catch (EmptyFieldException $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
}

try {
    validateRegistrationForm("valid@email.com", "StrongPassword", "John Doe");
} catch (RegistrationException $e) {
    echo "Ошибка регистрации: " . $e->getMessage() . PHP_EOL;
}