<?php

class greeting
{
    // properties
    public $a = "Hello World";
    // public, protected, private

    public $b = "Mg Mg";

    public $show_greeting = 122;

    // methods
    function show_greeting() 
    {
        return $this->a;
    }
}

$message = new greeting; // message object
// echo $message->a . "</br>";
echo $message->b. "</br>";
echo $message->show_greeting();

$hi = new greeting;
echo $hi->b;