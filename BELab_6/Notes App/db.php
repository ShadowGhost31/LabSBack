<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes_app";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Підключення не встановлено: " . $conn->connect_error);
}
?>