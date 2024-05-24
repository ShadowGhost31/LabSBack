<?php
require_once 'programmer.php';
require_once 'student.php';
// Створюємо об'єкти класів
$student = new Student(180, 70, 20, "Harvard", 1);
$programmer = new Programmer(175, 65, 25, ["PHP", "JavaScript"], 3);
// Викликаємо методи прибирання
echo 'Програміст:<br>';

$programmer->ClearKitchen();
$programmer->ClearRoom();
echo '<br>Студент:<br>';

$student->ClearKitchen();
$student->ClearRoom();