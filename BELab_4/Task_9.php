<?php

require_once 'student.php';
require_once 'programmer.php';

// Створюємо об'єкт класу Student
$student = new Student(180, 70, 20, "University", 2);

// Викликаємо метод народження
$student->giveBirth();
echo "<br>";

// Створюємо об'єкт класу Programmer
$programmer = new Programmer(175, 65, 25, ['PHP', 'JavaScript'], 3);

// Викликаємо метод народження
$programmer->giveBirth();
