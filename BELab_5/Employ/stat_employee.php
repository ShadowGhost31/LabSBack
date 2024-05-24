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

// Запит для обчислення середньої заробітної плати всіх працівників
$sql = "SELECT AVG(salary) AS average_salary FROM employees";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "Average Salary: " . $row["average_salary"] . "<br>";

// Запит для підрахунку кількості працівників на кожній посаді
$sql = "SELECT position, COUNT(*) AS count FROM employees GROUP BY position";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "Position: " . $row["position"] . " - Count: " . $row["count"] . "<br>";
}


$conn->close();
?>