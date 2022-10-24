<?php

$name_age = ["John Doe" => 30, "Harry" => 42, "Peter" => 23]; // Array


var_dump($name_age);
echo "<br>";
echo json_encode($name_age); // JSON

$colors = ["Red", "Green", "Blue", "Orange", "Yellow"];
echo json_encode($colors); // JSON
echo json_encode($colors, JSON_FORCE_OBJECT); // JSON

// echo gettype($name_age);