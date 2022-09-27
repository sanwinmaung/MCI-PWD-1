<?php

$pattern_one = "/cake/";
$text = "He was eating 4 cake in the cafe.%"; // 33

echo preg_match($pattern_one, $text) . " match was found."; // 1

echo "<br>";

echo preg_replace($pattern_one, 'bread', $text);
// echo "<br>";
// echo preg_match_all($pattern_one, $text) . " matches was found."; // 2
// echo "<br>";


// if (preg_match($pattern_one, $text)) {
//     echo "Match found!";
// } else {
//     echo "Match not found!";
// }

// $pattern_two = "/[a-Z0-9]/";
// $text_two = 'Lorem ipsum dolor sit amet';

// echo preg_match($pattern_two, $text_two);