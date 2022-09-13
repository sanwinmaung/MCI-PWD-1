<?php

// PHP Functions
// 1.Built-in Functions => gettype(), print_r(), var_dump(), etc.

// 2.User-Definded Functions
/*
     - Reduces the repetition of code within a program
     - Makes the code much easier to maintain
     - Makes it easier to solve the errors
     - can be reused in other application
    */

// function functionName() {
//     Execute code
// }

// Defining function
function sayHello()
{
    echo "Hi, Everyone!!!";
    echo "<br>";
}

// Call function
// sayHello();

// Functions with Parameters
function mySelf($name, $age)
{
    echo "My name is $name!";
    echo "<br>";

    // $age += 1;
    // echo "I am $age years old!";
    echo "I am " . ($age + 1) . " years old!";
    echo "<br>-------------------------<br>";
}

// this function required two parameters!
// mySelf("John Doe", 21);
// mySelf("John Smith", 22);
// mySelf("Mg Kaung", 19);
// mySelf("Aung Aung", 24);

// Functions with Optional Parameters and Default Values
function customFont($font, $size = 25)
{
    echo "<p style=\" font-family: $font; font-size: {$size}px; \">Hello world!</p>";
}

customFont("Arial", 14);
customFont("Times", 17);
customFont("Courier");