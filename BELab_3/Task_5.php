<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Directory</title>
</head>
<body>
<h2>Create User Directory</h2>
<form action="Task_5.php" method="post">
    <label for="login">Login:</label><br>
    <input type="text" name="login" id="login"><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="Create Directory" name="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    if (!is_dir($login)) {
        mkdir($login);
        // Збереження пароля разом з логіном у файл
        $credentials = fopen($login . '/credentials.txt', 'w');
        fwrite($credentials, $password);
        fclose($credentials);
        echo "Folder '$login' successfully created.<br>";

        $subdirectories = array("video", "music", "photo");
        foreach ($subdirectories as $subdir) {
            mkdir($login . "/" . $subdir);
            echo "Subfolder '$subdir' created in '$login'.<br>";
        }

        foreach ($subdirectories as $subdir) {
            for ($i = 1; $i <= 3; $i++) {
                $file = fopen($login . "/" . $subdir . "/file$i.txt", "w");
                fwrite($file, "Content of file $i in $subdir");
                fclose($file);
                echo "File '$subdir/file$i.txt' created in '$login'.<br>";
            }
        }
    } else {
        echo "Folder with login '$login' already exists. Please choose another login.<br>";
    }
}
?>
</body>
</html>
