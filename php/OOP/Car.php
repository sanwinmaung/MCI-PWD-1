<?php

class Car
{
    private $engine;
    private $wheels;

    // when we create object of class, php automatically calls the constructor method
    public function __construct($engine, $wheels)
    {
        // implementation
        $this->engine = $engine;
        $this->wheels = $wheels;
    }

    public function showWheels()
    {
        return $this->wheels;
    }
}

$car = new Car(1, 4);
echo $car->showWheels();