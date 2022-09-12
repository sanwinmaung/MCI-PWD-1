<?php

// Array Sorting for Associative array
// asort, arsort for array value
// $fruits = ["Orange" => 8, "Pineapple" => 5, "Apple" => 15];
$fruits = ["green-color" => "green", "red-color" => 3, "blue-color" => "blue", "yellow-color" => 10];

print_r($fruits);
echo "<br>";

// Ascending order
asort($fruits);
print_r($fruits);
echo "<br>";

// Ascending order
arsort($fruits);
// print_r($fruits);
echo "<br>";