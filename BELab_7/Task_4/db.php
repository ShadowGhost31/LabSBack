<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab7";

// Створення підключення
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не встановлено: " . $conn->connect_error);
}
?>
