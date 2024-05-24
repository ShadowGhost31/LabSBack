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

    private function distance($x1, $y1, $x2, $y2)
    {
        return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    }

    public function intersects(Circle $otherCircle)
    {
        $distance = $this->distance($this->x, $this->y, $otherCircle->x, $otherCircle->y);
        return $distance < ($this->radius + $otherCircle->radius);
    }

    public function __toString()
    {
        return "Коло з кординатами ($this->x, $this->y) і радіусом $this->radius";
    }
}

// Приклад використання
$circle1 = new Circle(0, 0, 4);
$circle2 = new Circle(8, 0, 5);

if ($circle1->intersects($circle2)) {
    echo "Кола перетинаються.\n";
} else {
    echo "Кола не перетинаються.\n";
}
