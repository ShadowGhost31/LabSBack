<form method="post">
    <label for="cities">Назви міст через пробіл:</label>
    <input type="text" name="cities" id="cities" required><br><br>
    <input type="submit" value="Переставити">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cities = $_POST['cities'];
    $cityArray = explode(' ', $cities);
    sort($cityArray);
    $result = implode(', ', $cityArray);
    echo "<p>Результат: $result</p>";
}
?>