<?php
function createArray() {
    $length = rand(3, 7);
    $arr = [];
    for ($i = 0; $i < $length; $i++) {
        $arr[] = rand(10, 20);
    }
    return $arr;
}

function mergeArrays($arr1, $arr2) {
    echo "Масив 1: ";
    print_r($arr1);
    echo "<br>Масив 2: ";
    print_r($arr2);

    $mergedArray = array_merge($arr1, $arr2);
    echo "<br>Після об'єднання: ";
    print_r($mergedArray);

    $uniqueArray = array_unique($mergedArray);
    echo "<br>Після видалення повторень: ";
    print_r($uniqueArray);

    sort($uniqueArray);
    echo "<br>Після сортування: ";
    print_r($uniqueArray);

    return $uniqueArray;
}

$array1 = createArray();
$array2 = createArray();
$result = mergeArrays($array1, $array2);
?>
