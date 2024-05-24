<?php
session_start();


if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + (6 * 30 * 24 * 60 * 60));
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'ukr';
}


function displayLanguageMessage($lang) {
    switch ($lang) {
        case 'ukr':
            echo "Вибрана мова: Українська";
            break;
        case 'eng':
            echo "Selected language: English";
            break;
        // Додайте інші мови за необхідністю
        default:
            echo "Вибрана мова: Українська";
            break;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['favorite_games'] = isset($_POST['favorite_games']) ? $_POST['favorite_games'] : [];
    $_SESSION['about'] = $_POST['about'];
}


$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
$city = isset($_SESSION['city']) ? $_SESSION['city'] : '';
$favorite_games = isset($_SESSION['favorite_games']) ? $_SESSION['favorite_games'] : [];
$about = isset($_SESSION['about']) ? $_SESSION['about'] : '';


$cities = ['Житомир', 'Київ'];
$games = ['FIFA', 'Call of Duty', 'Minecraft', 'Assassin\'s Creed'];


if ($_FILES && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile);
    $_SESSION['photo'] = $uploadFile;
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
<h1><?php displayLanguageMessage($lang); ?></h1>
<form action="process_form.php" method="post" enctype="multipart/form-data">
    <label>Логін (Пошта):</label><br>
    <input type="text" name="login" value="<?php echo htmlspecialchars($login); ?>"><br><br>

    <label>Пароль:</label><br>
    <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>"><br><br>

    <label>Повторіть пароль:</label><br>
    <input type="password" name="password_repeat"><br><br>

    <label>Стать:</label><br>
    <input type="radio" name="gender" value="male" <?php if ($gender === 'male') echo 'checked'; ?>>Чоловік
    <input type="radio" name="gender" value="female" <?php if ($gender === 'female') echo 'checked'; ?>>Жінка<br><br>

    <label>Місто:</label><br>
    <select name="city">
        <?php foreach ($cities as $c): ?>
            <option value="<?php echo $c; ?>" <?php if ($city === $c) echo 'selected'; ?>><?php echo $c; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Улюблена гра:</label><br>
    <?php foreach ($games as $g): ?>
        <input type="checkbox" name="favorite_games[]" value="<?php echo $g; ?>" <?php if (in_array($g, $favorite_games)) echo 'checked'; ?>><?php echo $g; ?><br>
    <?php endforeach; ?><br>

    <label>Про себе:</label><br>
    <textarea name="about" rows="5" cols="30"><?php echo htmlspecialchars($about); ?></textarea><br><br>

    <label>Фотографія:</label><br>
    <input type="file" name="photo"><br><br>

    <input type="submit" value="Відправити">
</form>


<a href="index.php?lang=ukr"><img src="ukraine.png" alt="Ukrainian" width="30" height="30"></a>
<a href="index.php?lang=eng"><img src="united.png" alt="English" width="30" height="30"></a>
</body>
</html>
