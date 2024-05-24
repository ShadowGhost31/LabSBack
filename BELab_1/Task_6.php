<?php
$number = mt_rand(100, 999);
$sum = array_sum(str_split($number));
$reversed_number = intval(strrev($number));
$digits = str_split($number);
rsort($digits);
$max_number = intval(implode('', $digits));
echo "  1. Сумма цифр числа $number: $sum \n";
echo "  2. Число, полученное в обратном порядке: $reversed_number \n";
echo "  3. Наибольшее число из цифр числа $number: $max_number \n";
?>