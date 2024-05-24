<?php
session_start();
ob_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;
        echo "Вхід виконано успішно!";
        header('Location: profile.php');
        exit;
    } else {
        echo "Неправильний логін або пароль!";
    }
    $output = ob_get_contents();
    ob_end_clean();
    $_SESSION['messages'] = $output;
}

?>

<form method="POST" action="login.php">
    Логін: <input type="text" name="username"><br>
    Пароль: <input type="password" name="password"><br>
    <input type="submit" value="Увійти">
</form>
