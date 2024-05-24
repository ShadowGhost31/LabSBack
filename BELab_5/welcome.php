<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

require 'config.php';

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $birthdate = trim($_POST['birthdate']);
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    $stmt = $conn->prepare("UPDATE users SET email=?, first_name=?, last_name=?, birthdate=?, gender=?, phone=?, address=?, updated_at=NOW() WHERE id=?");
    $stmt->bind_param("sssssssi", $email, $first_name, $last_name, $birthdate, $gender, $phone, $address, $user_id);
    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();

    // Оновлення даних користувача після оновлення профілю
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
<form method="post" action="welcome.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required><br>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required><br>
    <label for="birthdate">Birthdate:</label>
    <input type="date" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars($user['birthdate']); ?>" required><br>
    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="male" <?php if ($user['gender'] == 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if ($user['gender'] == 'female') echo 'selected'; ?>>Female</option>
    </select><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>"><br>
    <label for="address">Address:</label>
    <textarea id="address" name="address"><?php echo htmlspecialchars($user['address']); ?></textarea><br>
    <button type="submit">Update</button>
</form>
<a href="logout.php">Logout</a>
<a href="delete.php">Delete Account</a>
</body>
</html>
