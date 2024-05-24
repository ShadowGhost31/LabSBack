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

// Отримання ідентифікатора працівника для редагування
$id = $_GET['id'];

// Вибірка даних про обраного працівника
$sql = "SELECT * FROM employees WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
</head>
<body>
<h1>Edit Employee</h1>
<form action="process_edit_employee.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
    Position: <input type="text" name="position" value="<?php echo $row['position']; ?>"><br>
    Salary: <input type="text" name="salary" value="<?php echo $row['salary']; ?>"><br>
    <input type="submit" value="Save Changes">
</form>
</body>
</html>

<?php
// Закриття з'єднання з базою даних
$conn->close();
?>
