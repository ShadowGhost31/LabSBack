<?php
function print_color_table($rows, $columns) {
    echo "<table border='1'>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columns; $j++) {

            $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            echo "<td style='background-color: $color;'>($i, $j)</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}


print_color_table(3, 3);
?>
