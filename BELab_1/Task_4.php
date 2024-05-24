<?php

$month = 9;


if ($month >= 3 && $month <= 5) {
    $season = "весна";
} elseif ($month >= 6 && $month <= 8) {
    $season = "літо";
} elseif ($month >= 9 && $month <= 11) {
    $season = "осінь";
} else {
    $season = "зима";
}


echo "Для місяця номер $month сезон - $season";
?>
