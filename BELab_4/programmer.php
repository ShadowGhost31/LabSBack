<?php

require_once 'Human.php';

/**
 * Class Programmer
 */
class Programmer extends Human {
    private $programmingLanguages;
    private $experience;

    /**
     * Programmer constructor.
     * @param $height
     * @param $weight
     * @param $age
     * @param $programmingLanguages
     * @param $experience
     */
    public function __construct($height, $weight, $age, $programmingLanguages, $experience) {
        parent::__construct($height, $weight, $age);
        $this->programmingLanguages = $programmingLanguages;
        $this->experience = $experience;
    }

    /**
     * Повідомлення при народженні дитини
     */
    protected function birthMessage() {
        echo "A programmer is born! Congratulations!";
    }
    /**
     * Повідомлення при прибиранні
     */
    public function ClearKitchen()
    {
        echo 'Програміст прибирає кухню<br>';
    }
    /**
     * Повідомлення при прибиранні
     */
    public function ClearRoom()
    {
        echo 'Програміст прибирає кімнату<br>';
    }


     /**
     * @return mixed
     */
    public function getProgrammingLanguages() {
        return $this->programmingLanguages;
    }

    /**
     * @param mixed $programmingLanguages
     */
    public function setProgrammingLanguages($programmingLanguages) {
        $this->programmingLanguages = $programmingLanguages;
    }

    /**
     * @return mixed
     */
    public function getExperience() {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience) {
        $this->experience = $experience;
    }

    /**
     * Method to add a new programming language
     * @param $language
     */
    public function addProgrammingLanguage($language) {
        $this->programmingLanguages[] = $language;
    }
}
