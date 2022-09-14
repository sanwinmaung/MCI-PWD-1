<?php

// PHP Math Operations

// https://www.php.net/manual/en/ref.math.php
// https://www.w3schools.com/php/php_ref_math.asp

// echo 7 + 3 . "<br>";  // 10
// echo 7 - 2 . "<br>"; // 5
// echo 7 * 2 . "<br>"; // 14
// echo 7 / 2 . "<br>"; // 3.5
// echo 7 % 2 . "<br>"; // 1

// $total = 11 / 3;
// echo $total;
// echo "<br>";
// echo floor(-$total);

// $arr = [8, 3, 9, 1, 2];
// echo min($arr);
// echo "<br>";
// echo max($arr);

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
// Output: 54esmdr0qf
$ranValue =  str_shuffle($permitted_chars);
echo $ranValue;
echo "<br>";
echo substr($ranValue, 3, 15);

// echo substr(str_shuffle($permitted_chars), 0, 10);