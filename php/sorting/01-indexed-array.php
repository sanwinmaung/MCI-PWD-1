<?php

// Array Sorting for Indexed array
// sort
$colors = array("Red", "Green", "Blue", "Yellow");

print_r($colors);
echo "<br>";

// Ascending order
sort($colors);
print_r($colors);
echo "<br>";

// Desending order
rsort($colors);
print_r($colors);
echo "<br>";