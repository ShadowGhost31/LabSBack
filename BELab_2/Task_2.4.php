<?php

function sortAssociativeArray($associativeArray, $sortBy) {

    if ($sortBy === 'age') {
        asort($associativeArray);
    }

    elseif ($sortBy === 'name') {
        ksort($associativeArray);
    }

    else {
        echo "Невірний параметр для сортування";
    }
    return $associativeArray;
}


$users = [
    'John' => 25,
    'Alice' => 30,
    'Bob' => 20,
];


$sortedByAge = sortAssociativeArray($users, 'age');
echo "Сортування за віком:<br>";
print_r($sortedByAge);


$sortedByName = sortAssociativeArray($users, 'name');
echo "<br>Сортування за іменем:<br>";
print_r($sortedByName);
?>
