<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees List</title>
</head>
<body>
<h1>Employees List</h1>
<?php
// Підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Вибірка всіх записів з таблиці "employees"
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

// Виведення результатів у вигляді таблиці
if ($result->num_rows > 0) {
    echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Salary</th>
                </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['position']."</td>
                    <td>".$row['salary']."</td>
                  </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Закриття з'єднання з базою даних
$conn->close();
?>
</body>
</html>
