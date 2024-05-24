<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
</head>
<body>
<h1>Add Employee</h1>
<form action="process_add_employee.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="position">Position:</label>
    <input type="text" id="position" name="position" required><br>
    <label for="salary">Salary:</label>
    <input type="number" id="salary" name="salary" required><br>
    <button type="submit">Add Employee</button>
</form>
</body>
</html>