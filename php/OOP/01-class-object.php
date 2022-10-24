<?php

class Dog
{
    // Declare properties
    // Visibility - public, protected, private

    public $name = "Jackie";
    protected $age = 1;
    private $owner = "John Doe";

    public function bark()
    {
        return "Woff Woff!";
    }

    // Declare methods
    public function sayName()
    {
        return $this->name;
    }

    public function dogAge()
    {
        return $this->age;
    }

    public function dogOwner()
    {
        return $this->owner;
    }

    public function dogBio()
    {
        return $this->name . " " . $this->age . " " . $this->owner;
    }
}

$jack = new Dog();
echo $jack->name . "<br>";
// echo $jack->sayName() . "<br>";
// echo $jack->age . "<br>";
// echo $jack->owner . "<br>";
echo $jack->dogAge() . "<br>";
echo $jack->dogOwner() . "<br>";

// $aungnat = new Dog();
// echo 