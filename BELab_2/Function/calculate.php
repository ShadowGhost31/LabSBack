<?php

include 'func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $number = $_POST['number'];
    $number2 = $_POST['number2'];


    $sin_result = my_sin($number);
    $cos_result = my_cos($number);
    $tg_result = my_tg($number);
    $factorial_result = my_factorial($number);
    $pow_result = my_pow($number, $number2 );


    echo "<h2>Results:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Function</th><th>Result</th></tr>";
    echo "<tr><td>Sin($number)</td><td>$sin_result</td></tr>";
    echo "<tr><td>Cos($number)</td><td>$cos_result</td></tr>";
    echo "<tr><td>Tg($number)</td><td>$tg_result</td></tr>";
    echo "<tr><td>$number!</td><td>$factorial_result</td></tr>";
    echo "<tr><td>$number^$number2</td><td>$pow_result</td></tr>";
    echo "</table>";
}

?>
