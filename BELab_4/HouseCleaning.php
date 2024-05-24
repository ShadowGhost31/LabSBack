<?php
require_once 'programmer.php';
require_once 'student.php';
// Оголошення інтерфейсу
interface HouseCleaning {
    public function cleanRoom();
    public function cleanKitchen();
}


// Створення об'єктів класів Student і Programmer
$student = new Student(180, 70, 20, "University", 1);
$programmer = new Programmer(175, 75, 25, ["PHP", "JavaScript"], 3);

// Виклик методів прибирання для студента
$student->cleanRoom(); // Виведе: Human is cleaning the room.
$student->cleanKitchen(); // Виведе: Human is cleaning the kitchen.

// Виклик методів прибирання для програміста
$programmer->cleanRoom(); // Виведе: Human is cleaning the room.
$programmer->cleanKitchen(); // Виведе: Human is cleaning the kitchen.