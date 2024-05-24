<?php
class FileHandler {
    public static $dir = 'text';

    public static function readFile($fileName) {
        $filePath = self::$dir . '/' . $fileName;
        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        } else {
            return "File $fileName does not exist.";
        }
    }

    public static function appendToFile($fileName, $content) {
        $filePath = self::$dir . '/' . $fileName;
        if (file_exists($filePath)) {
            file_put_contents($filePath, $content, FILE_APPEND);
            return "Content appended to $fileName successfully.";
        } else {
            return "File $fileName does not exist.";
        }
    }

    public static function clearFile($fileName) {
        $filePath = self::$dir . '/' . $fileName;
        if (file_exists($filePath)) {
            file_put_contents($filePath, '');
            return "Content of $fileName cleared successfully.";
        } else {
            return "File $fileName does not exist.";
        }
    }
}
// Записуємо у файл file1.txt
echo FileHandler::appendToFile('file1.txt', 'Hello, world!');
echo "<br>";

// Читаємо файл file1.txt
echo FileHandler::readFile('file1.txt');
echo "<br>";

// Очищаємо вміст файлу file1.txt
echo FileHandler::clearFile('file1.txt');
echo "<br>";

// Перевіряємо, чи вміст файлу file1.txt дійсно очищений
echo FileHandler::readFile('file1.txt');
echo "<br>";
