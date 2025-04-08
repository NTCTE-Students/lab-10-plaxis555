<?php

function divide($a, $b) {
if ($b == 0) {
throw new Exception("Division by zero");
}
return $a / $b;
}

function logException(Exception $e): void
{
$logMessage = "[" . date("Y-m-d H:i:s") . "] " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine() . PHP_EOL;
error_log($logMessage, 3, "error.log"); // Append to error.log file in the root.
}

try {
$result = divide(10, 0);
} catch (Exception $e) {
logException($e);
echo "Произошла ошибка. Детали записаны в error.log" . PHP_EOL;
}