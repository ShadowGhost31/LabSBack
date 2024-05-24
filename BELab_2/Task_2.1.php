<?php
function findDuplicates($arr) {
    $duplicates = array_count_values($arr);
    foreach ($duplicates as $key => $value) {
        if ($value > 1) {
            echo "Елемент '$key' повторюється $value разів<br>";
        }
    }
}

$arr = [1, 2, 3, 4, 1, 2, 5, 6, 3, 7];
findDuplicates($arr);
?>