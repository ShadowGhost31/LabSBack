<?php
$servername = "localhost";
$username = "homeuser";
$password = "homeuser";
$dbname = "company_db";

// Перевірка з'єднання
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Отримання даних з форми
$name = $_POST['name'];
$position = $_POST['position'];
$salary = $_POST['salary'];

// Вставка нового запису
$sql = "INSERT INTO employees (name, position, salary) VALUES ('$name', '$position', '$salary')";

if ($conn->query($sql) === TRUE) {
    echo "New employee added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>