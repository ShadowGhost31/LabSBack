<?php
interface ClearHouse{
    public function ClearRoom();
    public function ClearKitchen();
}
/**
 * Abstract class Human
 */
abstract class Human implements ClearHouse {
    private $height;
    private $weight;
    private $age;

    /**
     * Human constructor.
     * @param $height
     * @param $weight
     * @param $age
     */
    public function __construct($height, $weight, $age) {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }

    /**
     * Abstract method to be implemented by subclasses
     */
    abstract protected function birthMessage();

    /**
     * @return mixed
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height) {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWeight() {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight) {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age) {
        $this->age = $age;
    }

    /**
     * Method to give birth to a child
     */
    public function giveBirth() {
        $this->birthMessage();
    }
}