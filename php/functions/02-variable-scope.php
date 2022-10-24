<?php

// Scope of variable
function test()
{
    $greet = "Hello!";
    echo $greet;
    echo "<br>";

    $persons = array("John", "Peter", "Smith");
    for ($i = 0; $i < count($persons); $i++) {
        echo $greet . " " . $persons[$i] . "<br>";
    }
}

// test(); // Hello World
// echo $greet;

$sayHi = "Hi!";
function testTwo()
{
    echo $sayHi;
}
// testTwo();

function testThree()
{
    global $sayHi;
    echo $sayHi . " Mg Mg!";
}
testThree();
echo "<br>";
echo $sayHi;