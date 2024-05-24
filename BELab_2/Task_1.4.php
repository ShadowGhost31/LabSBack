<form method="post">
    <label for="date1">Дата 1:</label>
    <input type="text" name="date1" id="date1" placeholder="ДД-ММ-РРРР" required><br><br>
    <label for="date2">Дата 2:</label>
    <input type="text" name="date2" id="date2" placeholder="ДД-ММ-РРРР" required><br><br>
    <input type="submit" value="Розрахувати">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];


    if (preg_match("/^\d{2}-\d{2}-\d{4}$/", $date1) && preg_match("/^\d{2}-\d{2}-\d{4}$/", $date2)) {
        $date1_timestamp = strtotime($date1);
        $date2_timestamp = strtotime($date2);
        $day_difference = round(($date2_timestamp - $date1_timestamp) / (60 * 60 * 24));
        echo "<p>Кількість днів між датами: $day_difference</p>";
    } else {
        echo "<p>Некоректний формат дати. Введіть у форматі 'ДД-ММ-РРРР'.</p>";
    }
}
?>
