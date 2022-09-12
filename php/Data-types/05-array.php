<?php
// String array
// Indexed Array
$fruits = array("Apple", "Orange", "Watermelon");

// index point; 0, 1, 2, 3

// $numArrayOne = array(1, 2, 3); // array();
// $numArray = [1, 2, 3]; // array();

// var_dump($numArrayOne) . '</br>';
// echo '</br>';
// var_dump($numArray) . '</br>';


$arrOne = array("Volvo", 22, 18, true);
// var_dump($arrOne); // call array key

// Associative Array
$color_codes = array(
    "Red" => "#FF5733", 
    "Green" => "#55FF33", 
    "Blue" => '#3352FF'
);

// Multidimensional arrays
$cars = array (
    array("Volvo",22,18, array("BMW",15,13)),
    array("BMW",15,13),
    array(
        "Red" => "#FF5733", 
        "Green" => "#55FF33",
        "Blue" => '#3352FF'
    )
);

// var_dump($fruits[0]);
// var_dump($color_codes["Blue"]); // call array key
// var_dump($cars[0]) . '</br>';
// var_dump($cars[1][0]) . '</br>';

// var_dump($cars[2]["Red"]) . '</br>';