<?php

function saveComment($name, $comment) {
    $file = fopen("comments.txt", "a") or die("Неможливо відкрити файл!");
    fwrite($file, "$name: $comment\n");
    fclose($file);
}


function displayComments() {
    if (file_exists("comments.txt")) {
        $file = fopen("comments.txt", "r") or die("Неможливо відкрити файл!");
        echo "<table border='1'>";
        echo "<tr><th>Ім'я</th><th>Коментар</th></tr>";
        while (!feof($file)) {
            $line = fgets($file);
            if (!empty($line)) {
                list($name, $comment) = explode(':', $line, 2);
                echo "<tr><td>$name</td><td>$comment</td></tr>";
            }
        }
        echo "</table>";
        fclose($file);
    } else {
        echo "Ще немає коментарів.";
    }
}

// Обробка введених даних
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    saveComment($name, $comment);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Книга відгуків</title>
</head>
<body>
<h2>Додати відгук</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Ім'я:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="comment">Коментар:</label><br>
    <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Ввести">
</form>

<h2>Поточні відгуки</h2>
<?php displayComments(); ?>
</body>
</html>
