<?php
// Функція для зчитування рядків з файлу
function readLinesFromFile($filename) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    return $lines;
}

// Функція для збереження рядків у файл
function saveLinesToFile($filename, $lines) {
    $file = fopen($filename, "w") or die("Неможливо відкрити файл!");
    foreach ($lines as $line) {
        fwrite($file, $line . PHP_EOL);
    }
    fclose($file);
}

// Функція для видалення файлу
function deleteFile($filename) {
    if (file_exists($filename)) {
        unlink($filename);
        echo "Файл '$filename' успішно видалено.";
    } else {
        echo "Файл '$filename' не знайдено.";
    }
}

// Отримання названня файлу для видалення
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filenameToDelete = $_POST['filename'];
    deleteFile($filenameToDelete);
}

// Файли зі словами
$file1 = "file1.txt";
$file2 = "file2.txt";

// Зчитування рядків з файлів
$lines1 = readLinesFromFile($file1);
$lines2 = readLinesFromFile($file2);

// Знаходимо рядки, які зустрічаються тільки в першому файлі
$uniqueToFirstFile = array_diff($lines1, $lines2);
saveLinesToFile("unique_to_first_file.txt", $uniqueToFirstFile);

// Знаходимо рядки, які зустрічаються в обох файлах
$commonLines = array_intersect($lines1, $lines2);
saveLinesToFile("common_lines.txt", $commonLines);

// Знаходимо рядки, які зустрічаються в кожному файлі більше двох разів
$linesMoreThanTwice = array();
$wordCount1 = array_count_values($lines1);
$wordCount2 = array_count_values($lines2);
foreach ($wordCount1 as $line => $count) {
    if ($count > 2 && isset($wordCount2[$line]) && $wordCount2[$line] > 2) {
        $linesMoreThanTwice[] = $line;
    }
}
saveLinesToFile("lines_more_than_twice.txt", $linesMoreThanTwice);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete File Form</title>
</head>
<body>
<h2>Delete File</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="filename">Введіть ім'я файлу який потрібно видалити:</label><br>
    <input type="text" id="filename" name="filename"><br>
    <input type="submit" value="Delete">
</form>
</body>
</html>
