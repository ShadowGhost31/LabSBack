<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Location: profile.php');
    exit;
}
?>

<form method="POST" action="register.php">
    Логін: <input type="text" name="username"><br>
    Пароль: <input type="password" name="password"><br>
    <input type="submit" value="Реєстрація">
</form>