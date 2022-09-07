<?php

/*
    .   Concatenation
    .=  Concatenation Assignment
*/

$x = "Hello";
$y = "World!";
$z = "New";

$a = 10; // integer 
$b = "5"; // string
$c = 0.05; // double

$i = $x . " " . $y; // Hello World
echo $i;
echo "<br>";

// echo $a . $b . $c; // 105
// echo "<br>";

// echo $a + $b;
// echo "<br>";

$i .= " " . $z;
echo $i;
echo "<br>";