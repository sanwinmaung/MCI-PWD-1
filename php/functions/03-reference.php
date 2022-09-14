<?php

// Passing Arguments to a function by Reference
function selfMultiply(&$number) // passed by reference ($myNum)
{
    $number = $number * 2;
    return $number; // 8
}

$myNum = 4;
echo $myNum; // 4
echo "<br>";

echo selfMultiply($myNum);  // 8
echo "<br>";
echo $myNum; // 8
echo "<br>";

$myNum += 4;
echo $myNum; // 12