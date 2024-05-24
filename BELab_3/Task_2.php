<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['login'] === 'Admin' && $_POST['password'] === 'password') {

        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $_POST['login'];
    } else {

        $error = "Невірний логін або пароль!";
    }
}


if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {

    echo "<p>Добрий день, {$_SESSION['username']}!</p>";
    echo "<p><a href='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?logout=true'>Вийти</a></p>";
} else {

    echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
    echo "<label>Логін:</label><br>";
    echo "<input type='text' name='login'><br>";
    echo "<label>Пароль:</label><br>";
    echo "<input type='password' name='password'><br>";
    echo "<input type='submit' value='Увійти'>";
    echo "</form>";

    if (isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
}


if (isset($_GET['logout']) && $_GET['logout'] === 'true') {

    session_unset();

    session_destroy();

    header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
    exit;
}
?>
