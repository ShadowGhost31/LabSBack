<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_db";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Отримання даних з форми
$id = $_POST['id'];
$name = $_POST['name'];
$position = $_POST['position'];
$salary = $_POST['salary'];

// Оновлення даних про працівника
$sql = "UPDATE employees SET name='$name', position='$position', salary='$salary' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated успішно";
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();
?>
