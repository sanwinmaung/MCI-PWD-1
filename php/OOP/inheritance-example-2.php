<?php

class Greeting
{
    public function greet()
    {
        return 'Hello!';
    }

    final public function sayGoodEvening()
    {
        return 'Good Evening!';
    }
}

class MyanamrGreeting extends Greeting
{
    // Method Override
    public function greet()
    {
        return "မင်္ဂလာပါ!";
    }
}

class SpainGreeting extends Greeting
{
    public function greet()
    {
        return "Hola!";
    }
}

$mmGreet = new MyanamrGreeting();
echo $mmGreet->greet() . "<br>";
echo $mmGreet->sayGoodEvening() . "<br>";

$spainGreet = new SpainGreeting();
echo $spainGreet->greet() . "<br>";

$greet = new Greeting();
echo $greet->greet() . "<br>";