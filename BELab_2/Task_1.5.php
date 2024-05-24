<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Генератор паролів</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }
        form {
            display: inline-block;
            text-align: left;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form method="post">
    <label for="password">Згенерований пароль:</label>
    <input type="text" name="password" id="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" readonly><br><br>
    <label for="strength">Пароль норм?:</label>
    <input type="text" name="strength" id="strength" value="<?php echo isset($_POST['strength']) ? htmlspecialchars($_POST['strength']) : ''; ?>" readonly><br><br>
    <input type="submit" value="Генерувати новий пароль">
</form>

<?php
function generatePassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+{}|[]';
    $password = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $max)];
    }
    return $password;
}

function isStrongPassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $generatedPassword = generatePassword();
    $isStrong = isStrongPassword($generatedPassword) ? "так" : "ні";
    ?>
    <script>
        document.getElementById("password").value = "<?php echo htmlspecialchars($generatedPassword); ?>";
        document.getElementById("strength").value = "<?php echo htmlspecialchars($isStrong); ?>";
    </script>
    <?php
}
?>

</body>
</html>
