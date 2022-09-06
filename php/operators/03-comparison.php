<?php

/*
Comparison operators are used to compare two values in Boolean
    == Equal
    === Identical
    != Not Equal
    <> Not Equal
    !== Not Identical / $x is not equal to $a, or they are not of the same type
    < Less than
    > Greater than
    <= Less than or equal to
    >= Greater than or equal to

*/

$x = 20; // integer
$y = 10;
$z = 5;

$a = "20"; // string
$b = "10"; // string

// var_dump($x == $y); // false
// echo "<br>";

// var_dump($x == $a); // true
// // 20 == 20; true
// echo "<br>";

// var_dump($x === $a); // value = true, data types = false ===> false
// echo "<br>";

// var_dump($x != $y); // true
// echo "<br>";
// var_dump($x <> $y); // true
// echo "<br>";

// var_dump($x != $a); // false
// echo "<br>";

// echo "Not Identical <br>";
// var_dump($a !== $b); // value = false, data types = true ===> true
// echo "<br>";

var_dump($x < $y); //false
echo "<br>";

var_dump($x > $y); // true
echo "<br>";

var_dump($x <= $a); // true
echo "<br>";

var_dump($x >= $a); // true
echo "<br>";

var_dump($x <= $y);
echo "<br>";