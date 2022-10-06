<?php

class Hello
{
    public static $greeting = 'Good Evening';
    // static method
    public static function hello()
    {
        return "Hi!";
    }

    public static function greetWithName($name)
    {
        echo self::hello() . ' ' . self::$greeting . ' ' . $name . '<br>';
    }

    public function test()
    {
        echo $this->hello() . self::$greeting;
    }

    // $this->

    // self::
}

// Hello::hello();
Hello::greetWithName('John Doe');
echo Hello::$greeting . '<br>';

$hello = new Hello();
$hello->test();
// self