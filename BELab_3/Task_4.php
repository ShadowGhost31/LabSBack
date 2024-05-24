<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image Form</title>
</head>
<body>
<h2>Upload Image</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="image">Select image to upload:</label><br>
    <input type="file" name="image" id="image"><br>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);


    if (file_exists($targetFile)) {
        echo "Вибачте, файл вже існує.";
    } else {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "Файл " . htmlspecialchars(basename($_FILES["image"]["name"])) . " успішно завантажено.";
        } else {
            echo "Виникла помилка під час завантаження вашого файлу.";
        }
    }
}
?>
</body>
</html>
