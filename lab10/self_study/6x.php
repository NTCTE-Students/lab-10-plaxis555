<?php

class ShopException extends Exception {}
class InsufficientFundsException extends ShopException {}
class ProductNotFoundException extends ShopException {}

function purchaseProduct(float $price, float $customerBalance, string $productName): void
{
    if ($customerBalance < $price) {
        throw new InsufficientFundsException("Недостаточно средств для покупки " . $productName . ".  Цена: " . $price . ", баланс: " . $customerBalance);
    }

    if ($productName === "NonExistentProduct") {
        throw new ProductNotFoundException("Товар " . $productName . " не найден.");
    }

    echo "Успешно приобретен товар " . $productName . PHP_EOL;
}

try {
    purchaseProduct(100, 50, "Product1");
} catch (InsufficientFundsException $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
}

try {
    purchaseProduct(50, 100, "NonExistentProduct");
} catch (ProductNotFoundException $e) {
    echo "Ошибка: " . $e->getMessage() . PHP_EOL;
}

try {
    purchaseProduct(50, 100, "Product2");
} catch (ShopException $e) {
    echo "Общая ошибка магазина: " . $e->getMessage() . PHP_EOL;
}