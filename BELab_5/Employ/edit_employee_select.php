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

// Вибірка всіх працівників для заповнення випадаючого списку
$sql = "SELECT id, name FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
</head>
<body>
<h1>Edit Employee</h1>
<form action="edit_employee.php" method="get">
    <label for="employee">Select Employee:</label>
    <select id="employee" name="id">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
        } else {
            echo "<option value=''>No employees found</option>";
        }
        ?>
    </select><br>
    <button type="submit">Edit</button>
</form>
</body>
</html>

<?php
// Закриття з'єднання з базою даних
$conn->close();
?>
