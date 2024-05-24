<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Record</title>
</head>
<body>
<h1>Insert New Record</h1>
<form method="post" action="insert_record.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="cost">Cost:</label>
    <input type="number" id="cost" name="cost" required><br>
    <label for="kol">Quantity:</label>
    <input type="number" id="kol" name="kol" required><br>
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br>
    <button type="submit">Add Record</button>
</form>
</body>
</html>
