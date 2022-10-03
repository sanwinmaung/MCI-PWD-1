<?php

class Engine
{
    private $engineType;

    public function __construct($engineType)
    {
        $this->engineType = $engineType;
    }

    public function getEngineType()
    {
        return $this->engineType;
    }
}

class Car
{
    private $wheels;
    private $engine;

    public function __construct($wheels, Engine $engine)
    {
        $this->wheels = $wheels;
        $this->engine = $engine;
    }

    public function driveCar()
    {
        echo "Car drive with " . $this->engine->getEngineType() . "<br>";
    }
}

$cngEng = new Engine('Gas Engine');
$car1 = new Car(4, $cngEng);
echo $car1->driveCar();


$dieselEng = new Engine('Diesel Engine');
$car2 = new Car(4, $dieselEng);
echo $car2->driveCar();