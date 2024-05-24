<?php
$filepath = "D: \\ WebServers \\ home \\ testsite \\ www \\ myfile.txt";
$filename = basename($filepath);
$filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);
echo "<p>Ім'я файлу без розширення: $filenameWithoutExtension</p>";
?>
