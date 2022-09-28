<?php

// getter, setter

class Customer
{
    // public $name; // visibility (or) access notifier
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $name = trim($name);

        if ($name == '') {
            echo "Name is empty!";
            return false;
        }

        $this->name = $name;

        return true;
    }
}

$customerOne = new Customer();
// echo $customerOne->name;
$customerOne->setName('John Doe');

echo $customerOne->getName();
echo "<br>";
// echo $customerOne->getName();