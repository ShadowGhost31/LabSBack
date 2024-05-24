<?php

require_once 'Human.php';

/**
 * Class Student
 */
class Student extends Human {
    private $universityName;
    private $course;

    /**
     * Student constructor.
     * @param $height
     * @param $weight
     * @param $age
     * @param $universityName
     * @param $course
     */
    public function __construct($height, $weight, $age, $universityName, $course) {
        parent::__construct($height, $weight, $age);
        $this->universityName = $universityName;
        $this->course = $course;
    }

    /**
     * Повідомлення при народженні дитини
     */
    protected function birthMessage() {
        echo "A student is born! Congratulations!";
    }
    /**
     * Повідомлення при прибиранні
     */
    public function ClearKitchen()
    {
        echo 'Студент прибирає кухню<br>';
    }
    /**
     * Повідомлення при прибиранні
     */
    public function ClearRoom()
    {
        echo 'Студент прибирає кімнату<br>';
    }
     /**
     * @return mixed
     */
    public function getUniversityName() {
        return $this->universityName;
    }

    /**
     * @param mixed $universityName
     */
    public function setUniversityName($universityName) {
        $this->universityName = $universityName;
    }

    /**
     * @return mixed
     */
    public function getCourse() {
        return $this->course;
    }

    /**
     * @param mixed $course
     */
    public function setCourse($course) {
        $this->course = $course;
    }

    /**
     * Method to move student to the next course
     */
    public function moveToNextCourse() {
        $this->course++;
    }

}
