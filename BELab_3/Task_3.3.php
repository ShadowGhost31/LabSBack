<?php

$words = file("words.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


sort($words);


$file = fopen("sorted_words.txt", "w") or die("Неможливо відкрити файл!");


foreach ($words as $word) {
    fwrite($file, $word . PHP_EOL);
}


fclose($file);

echo "Слова успішно впорядковано за алфавітом і записано у файл 'sorted_words.txt'.";
?>
