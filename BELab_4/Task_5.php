<?php
class Circle
{
    private $x;
    private $y;
    private $radius;

    public function __construct($x, $y, $radius)
    {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    public function __toString()
    {
        return "Circle with center at ($this->x, $this->y) and radius $this->radius";
    }
}

// Приклад використання
$circle = new Circle(0, 0, 5);
echo $circle;
echo "\n";


echo "Initial X-coordinate: " . $circle->getX() . "\n";
$circle->setX(10);
echo "Updated X-coordinate: " . $circle->getX() . "\n";
