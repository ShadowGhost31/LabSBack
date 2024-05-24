<?php
require 'config.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $birthdate = trim($_POST['birthdate']);
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    // Валідація введених даних
    if (empty($username) || empty($password) || empty($email) || empty($first_name) || empty($last_name) || empty($birthdate) || empty($gender)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (count($errors) === 0) {
        // Перевірка на існування користувача
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Username already taken.";
        } else {
            // Хешування пароля
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (username, password, email, first_name, last_name, birthdate, gender, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $username, $hashed_password, $email, $first_name, $last_name, $birthdate, $gender, $phone, $address);

            if ($stmt->execute()) {
                echo "Registration successful!";
                header('Location: index.php');
                exit;
            } else {
                $errors[] = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form method="post" action="register.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br>
    <label for="birthdate">Birthdate:</label>
    <input type="date" id="birthdate" name="birthdate" required><br>
    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone"><br>
    <label for="address">Address:</label>
    <textarea id="address" name="address"></textarea><br>
    <button type="submit">Register</button>
</form>
</body>
</html>
