<?php

$char = 'a';


$char = strtolower($char);


switch ($char) {
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
        $result = "голосна";
        break;
    default:
        $result = "приголосна";
}

// Вывод результата
echo "Символ '$char' є $result";
?>