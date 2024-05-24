<form method="post">
    <label for="text">Текст:</label>
    <input type="text" name="text" id="text" required><br><br>
    <label for="find">Знайти:</label>
    <input type="text" name="find" id="find" required><br><br>
    <label for="replace">Замінити на:</label>
    <input type="text" name="replace" id="replace" required><br><br>
    <input type="submit" value="Замінити">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];
    $find = $_POST['find'];
    $replace = $_POST['replace'];
    $result = str_replace($find, $replace, $text);
    echo "<p>Результат: $result</p>";
}
?>
