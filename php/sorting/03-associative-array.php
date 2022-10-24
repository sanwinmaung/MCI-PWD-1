<?php

// Array Sorting for Associative array
// ksort, krsort for array key
$fruits = ["Orange" => 8, "Pineapple" => 5, "Apple" => 15];

print_r($fruits);
echo "<br>";

// Ascending order
ksort($fruits);
print_r($fruits);
echo "<br>";

// Ascending order
krsort($fruits);
print_r($fruits);
echo "<br>";