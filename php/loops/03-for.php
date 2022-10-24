<?php

// For Loop
// for ($i=0; $i < ; $i++) { 
//     # code...
// }

// for (initialization; condition; increment) { 
//     Execute code
// }

// for ($i = 1; $i <= 20; $i++) {
//     echo $i . "<br>";
// }

$colors = array("Red", "Green", "Blue", "Yellow");

echo count($colors) . "<br>"; // count for array room

for ($i = 2; $i < count($colors); $i++) {
    // echo $colors[index] . "<br>";
    echo $colors[$i] . "<br>";
}

echo "For Loop Stop!!!!";