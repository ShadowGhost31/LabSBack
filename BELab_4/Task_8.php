<?php

require_once 'human.php';
require_once 'student.php';
require_once 'programmer.php';

// Перевірка класу Human
$human = new Human(180, 75, 30);
echo "Human:\n";
echo "Height: " . $human->getHeight() . " cm\n";
echo "Weight: " . $human->getWeight() . " kg\n";
echo "Age: " . $human->getAge() . " years\n";

// Перевірка класу Student
$student = new Student(170, 60, 20, "University", 1);
echo "\nStudent:\n";
echo "Height: " . $student->getHeight() . " cm\n";
echo "Weight: " . $student->getWeight() . " kg\n";
echo "Age: " . $student->getAge() . " years\n";
echo "University: " . $student->getUniversityName() . "\n";
echo "Course: " . $student->getCourse() . "\n";

// Перевірка класу Programmer
$programmer = new Programmer(160, 55, 25, ['PHP', 'JavaScript'], 3);
echo "\nProgrammer:\n";
echo "Height: " . $programmer->getHeight() . " cm\n";
echo "Weight: " . $programmer->getWeight() . " kg\n";
echo "Age: " . $programmer->getAge() . " years\n";
echo "Programming Languages: " . implode(", ", $programmer->getProgrammingLanguages()) . "\n";
echo "Experience: " . $programmer->getExperience() . " years\n";
