<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vt221_brv";

// Створення з'єднання
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
