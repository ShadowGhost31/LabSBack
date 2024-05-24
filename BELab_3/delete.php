<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Directory</title>
</head>
<body>
<h2>Delete User Directory</h2>
<form action="delete.php" method="post">
    <label for="login">Login:</label><br>
    <input type="text" name="login" id="login"><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="Delete Directory" name="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    if (is_dir($login)) {
        // Перевірка, чи введений пароль співпадає зі збереженим
        $credentials = file_get_contents($login . '/credentials.txt');
        if ($password === trim($credentials)) {
            deleteDirectory($login);
            echo "Folder '$login' successfully deleted.<br>";
        } else {
            echo "Incorrect password. Folder deletion failed.<br>";
        }
    } else {
        echo "Folder with login '$login' not found.<br>";
    }
}

function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir)) {
        return unlink($dir);
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }
    return rmdir($dir);
}
?>
</body>
</html>
